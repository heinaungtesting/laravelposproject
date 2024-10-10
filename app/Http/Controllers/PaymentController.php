<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    function paymentpage(){
        $payment=Payment::orderBy('created_at','desc')->paginate(5);
        return view('admin.payment.pay',compact('payment'));
    }
    function payment(Request $req){
        $this->paycheck($req);
        Payment::create([
            'account_number'=>$req->account_number,
            'account_name'=>$req->account_name,
            'type'=>$req->type
          /*   'amount'=>$req->amount,
            'user_id'=>Auth::user()->id, */

        ]);
        Alert::success('Payment created','Payment created successfully');
        return back();


    }
    function deletepayment($id){
        Payment::where('id',$id)->delete();
        Alert::success('Payment deleted','Payment deleted successfully');
        return back();
    }
    function updatepayment($id){
        $payment=Payment::where('id',$id)->first();

        return view('admin.payment.update',compact('payment'));

    }
    function edit($id,Request $req){
        $this->paycheck($req);
        Payment::where('id',$id)->update([
            'account_number'=>$req->account_number,
            'account_name'=>$req->account_name,
            'type'=>$req->type,
        ]);
        Alert::success('Payment updated','Payment updated successfully');
        return to_route('paymentpage');
    }
    private function paycheck($req){
   $req->validate(['account_number'=>'required',
    'account_name'=>'required',
]);



    }
}
