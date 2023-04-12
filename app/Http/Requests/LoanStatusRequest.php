<?php

namespace App\Http\Requests;

use App\Models\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Validator;

class LoanStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "account_number" => ['required', 'exists:customers,account_number', 'max:10']
        ];
    }


    public function withValidator(Validator $validator):void
    {
        $validator->after(function (Validator $validator){
            if($validator->failed()){

                Request::create(
                    [
                        'request_status' => 'invalid',
                        'payload' => request()
                    ]
                );
            }
        });
    }
}
