<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Validator;


class InstamojoController extends Controller
{
    public function pay($plan){
        $user=Auth::guard('web')->user();

        $endPoint = env('INSTAMOJO_END_POINT');
        $api = new \Instamojo\Instamojo(
            env('INSTAMOJO_KEY'),
            env('INSTAMOJO_AUTHORIZATION'),
            $endPoint
        );

        if(preg_match_all('/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[6789]\d{9}|(\d[ -]?){10}\d$/im', $user->phone)){
            try {
                $response = $api->paymentRequestCreate(array(
                    "purpose" =>'Form Payment',
                    "amount" => $plan->discounted_price,
                    "buyer_name" => $user->name,
                    "send_email" => true,
                    "send_sms"=>true,
                    "email" => $user->email,
                    "phone" => $user->phone,
                    "redirect_url" => url(route('user.instamojo.success'))
                ));
                session()->put('data',$plan);
                return redirect($response['longurl']);

            }catch (Exception $e) {
                print('Error: ' . $e->getMessage());
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function success(Request $request){
        try {
            $endPoint = env('INSTAMOJO_END_POINT');
            $api = new \Instamojo\Instamojo(
                env('INSTAMOJO_KEY'),
                env('INSTAMOJO_AUTHORIZATION'),
                $endPoint
            );

            $response = $api->paymentRequestStatus(request('payment_request_id'));

            if(!isset($response['payments'][0]['status']) ) {
                return redirect()->route('index');
            } else if($response['payments'][0]['status'] != 'Credit') {
                return redirect()->route('index');
            }
        }catch(\Exception $e){
            return redirect()->route('index');
        }
        $payment = json_encode($response);

        $payment_detalis = json_encode(array('id' => $request->payment_id,'method' => 'instamojo','amount' => session()->get('data')->discounted_price,'currency' => 'INR'));
        $request->request->add(['payment_detalis' => $payment_detalis]);
        $register = new PlanController;
        return $register->planPurchase($request);
    }
}
