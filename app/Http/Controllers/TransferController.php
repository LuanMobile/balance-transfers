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
        if (empty($amount)) {
            return response()->json("Usuário não possui Saldo!");
        }
        $saldoAtual = $amount->amount;

        return response()->json("Saldo atual do usuário " . $user->name . " é de R$ ". $saldoAtual . " reais!");
    }

    public function getValue(Request $req, $id1, $id2) {

        $saldoId1 = Saldos::where('user_id', $id1)->first();
        $saldoId2 = Saldos::where('user_id', $id2)->first();
        $reqAmount = $req->all();
        $amountId = $saldoId1->amount;
        $amountReq = $reqAmount['amount'];

        //valida se o usuario tem saldo suficiente antes da transferencia
        if($amountId >= $amountReq) {
            
            //logica da transferencia por id na url: {id1}/{id2} e no corpo da req, o valor monetario
            $saldoId1->amount = $saldoId1->amount - $reqAmount['amount'];
            $saldoId1->save();
            $saldoId2->amount = $saldoId2->amount + $reqAmount['amount'];
            $saldoId2->save();

            return response()->json("Transferência realizada com sucesso, no valor de R$" . $reqAmount['amount'] . " reais!");
        } else {

            return response()->json("Erro: Saldo insuficiente para realizar transferencia!", 400);
        }
    }
}
