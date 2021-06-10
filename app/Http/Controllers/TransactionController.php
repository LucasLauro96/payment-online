<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
    public function AddMoney(Request $request){
        $user = Auth::user();

        DB::beginTransaction();
        try{

            $user = User::find($user->id);
            $user->balance = $request->value + $user->balance;
            $user->save();

            $transaction = new Transaction;
            $transaction->value = $request->value;
            $transaction->balance = $user->balance;
            $transaction->useridfrom = $user->id;
            $transaction->useridto = $user->id;
            $transaction->save();

            DB::commit();
            return response($transaction, 200);

        } catch(\Exception $e) {
            DB::rollback();
            return response($e, 500);;
        }
    }
}
