<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function Index(){
        $user = Auth::user();

        $transactions = Transaction::where('useridfrom', $user->id)
                                    ->orWhere('useridto', $user->id)
                                    ->get();

        $users = User::whereNotIn('id', [$user->id])->get();
        
        return view('dashboard')
            ->with('user', $user)
            ->with('transactions', $transactions)
            ->with('users', $users);
    }

    public function TransactionsHistory(){
        $user = Auth::user();

        $transactions = Transaction::where('useridfrom', $user->id)
                                    ->orWhere('useridto', $user->id)
                                    ->join('users AS t', 'transactions.useridto', '=', 't.id')
                                    ->join('users AS f', 'transactions.useridfrom', '=', 'f.id')
                                    ->select('f.name AS userFrom', 't.name AS userTo', 'transactions.*')
                                    ->get();
        
        
        $data = array(
            'transactions' => $transactions,
            'userid' => $user->id
        );

        $response = array(
            'response' => $data
        );
                                    
        return response($response, 200);;
    }
}
