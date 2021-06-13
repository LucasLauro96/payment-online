<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
    public function AddMoney(Request $request)
    {
        $user = Auth::user();

        DB::beginTransaction();
        try {

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
        } catch (\Exception $e) {
            DB::rollback();
            return response($e, 500);;
        }
    }

    public function TransferMoney(Request $request)
    {
        $user = Auth::user();

        if ($request->value > $user->balance)
            return response('Not authorized, does not have enough balance', 406);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6'
        ]);
        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!isset($response->message) && $response->message != 'Autorizado')
            return response('Not authorized', 406);

        DB::beginTransaction();
        try {

            //Usuario que esta enviando
            $userFrom = User::find($user->id);
            $userFrom->balance = $userFrom->balance - $request->value;
            $userFrom->save();

            //Usuario que esta recebendo
            $userTo = User::find($request->payer);
            $userTo->balance = $userTo->balance + $request->value;
            $userTo->save();

            $transaction = new Transaction;
            $transaction->value = $request->value;
            $transaction->balance = $userTo->balance;
            $transaction->useridfrom = $userFrom->id;
            $transaction->useridto = $request->payer;
            $transaction->save();

            DB::commit();
            return response($transaction, 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response($e, 500);;
        }
    }
}
