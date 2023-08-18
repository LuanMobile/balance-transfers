<?php

namespace App\Http\Controllers;

use App\Models\Saldos;
use App\Models\User;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    
    public function getAmount($id) {

        $user = User::find($id);
        $amount = Saldos::where('user_id', $id)->first();
        $a = $amount->amount;

        //dd($amount);
        return response()->json($amount);
    }

    public function getValue($id1, $id2) {

        $saldo1 = Saldos::select('amount')->where('user_id', $id1)->first();
        $saldo2 = Saldos::select('amount')->where('user_id', $id2)->first();

        //logica de transferencia de saldo de um cliente pro outro
        //valida se o usuario tem saldo suficiente antes da transferencia 

    }
}
