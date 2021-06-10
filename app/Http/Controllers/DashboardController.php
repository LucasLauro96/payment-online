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
                                    ->where('useridto', $user->id)
                                    ->get();

        $users = User::whereNotIn('id', [$user->id])->get();
        
        return view('dashboard')
            ->with('user', $user)
            ->with('transactions', $transactions)
            ->with('users', $users);
    }
}
