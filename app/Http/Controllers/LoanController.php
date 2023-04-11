<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getStatus(Request $request){

        $request->validate([
            //todo to validate  if account_-id exists 
            "account_number" => ['required', 'exists:customers,account_number', 'max:10']
        ]);


        $customer = Customer::where('account_number', $request->account_number)->firstOrFail();
        //get customer with account id
        //get loans for account id
        //return in response


        return response()->json($customer->loans);
    }
}
