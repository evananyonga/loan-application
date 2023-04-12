<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
 *  
 * API to view loan status
 *
 * To access the API, a registered user must pass a valid token to the headers of the Loan API
 * 
 * Accept: application/json
 * Authorization: Bearer {token}
 * 
 * Without the valid headers, the user will get a response:
 * @response 401 scenario="Unauthenticated" {"Unauthenticated"}
 * 
 * Without the right parameters, the response will be:
 * @response 422 scenario="Unprocessable Content"
 * 
 * {
    "message": "The account number field is required.",
    "errors": {
        "account_number": [
            "The account number field is required."
            ]
        }
 *  }
 * 
 * @bodyParam account_number required The Account Number in the system. Example: 5637294326
 * 
 * If you pass a ten-digit account number and everything is okay, you'll get a 200 OK response with the response:.
 * @respponse 200 scenario="Ok" 
 * {
    "token": "1|A9YZIwHj0ZP8GnhMN4a5HfDbCEoS6uFVRPUTwWhQ",
    "user": {
        "id": 1,
        "loan_amount": 500000,
        "outstanding_balance": 20000,
        "customer_id": 1,
        "created_at": "2023-10-19T12:57:16.000000Z",
        "updated_at": "2021-10-19T12:57:16.000000Z"
        }
 *  }
 * 
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
