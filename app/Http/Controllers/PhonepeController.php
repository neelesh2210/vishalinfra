<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Validator;

class PhonepeController extends Controller
{

    public function payWithPhonePe($plan){
        $user=Auth::guard('web')->user();
        session()->put('data', $plan);
        Session::forget('mm_tid');
        $order_id = date('Ymd-His') . rand(10, 99);
        $merchantTransaction = "MT" . $order_id;
        $grand_total = $plan->discounted_price;
        Session::put('mm_tid', $merchantTransaction);
        $data =  $this->payload_creation($grand_total, $user->phone, $merchantTransaction);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode(['request' => $data['payload']]),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-VERIFY:" . $data['base_hash'],
                "accept: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $payment_response = json_decode($response)->data;
            return $payment_response->instrumentResponse->redirectInfo->url;
        }
    }

    public function payload_creation($amount, $phone, $merchantTransaction){
        $payload = array(
            "merchantId" => 'REFRAMEONLINE',
            "merchantTransactionId" => $merchantTransaction,
            "merchantUserId" => "MUID" . rand(1111, 9999),
            "amount" => $amount * 100,
            "redirectUrl" => route('phonepe.redirectUrl'),
            "redirectMode" => "GET",
            "callbackUrl" => route('phonepe.callback'),
            "mobileNumber" => $phone,
            "paymentInstrument" => ["type" => "PAY_PAGE"],
        );

        $payload_json = json_encode($payload);
        $base64_payload = base64_encode($payload_json);



        $salt = '161b42bf-437b-43f2-8811-f2d9ce76e8c6'; // replace with your actual salt key

        $hash_input = $base64_payload . "/pg/v1/pay" . $salt;

        $sha256_hash = hash('sha256', $hash_input) . '###1';
        return ['payload' => $base64_payload, 'base_hash' => $sha256_hash];
    }

    public function callback(Request $request){
        $response = base64_decode($request);
        $data = json_decode($response);
        return $data;
    }

    public function redirectUrl(Request $request){
        $data = $this->status_check_api();
        $response_data = json_decode($data);
        if (!empty($response_data->success)) {
            if (($response_data->success == true) && ($response_data->code=='PAYMENT_SUCCESS') ) {
                $m_tid = session()->get('mm_tid');
                $payment_detalis = json_encode(array('id' => $response_data->data->transactionId,'method' => 'phonepe','amount' => $response_data->data->amount/100,'currency' => 'INR'));
                $request->request->add(['payment_detalis' => $payment_detalis]);
                session()->forget('mm_tid');
                $register = new PlanController;
                return $register->planPurchase($request);
                return 1;
            }
        } else {
                session()->forget('data');
                session()->forget('mm_tid');
            return redirect()->route('index');
        }
    }

    public function payload_creation_status_check(){
        $salt = '161b42bf-437b-43f2-8811-f2d9ce76e8c6'; // replace with your actual salt key

        $hash_input = "/pg/v1/status/REFRAMEONLINE/".session()->get('mm_tid').$salt;

        $sha256_hash = hash('sha256', $hash_input).'###1';
        return $sha256_hash;
    }

    public function status_check_api(){

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/status/REFRAMEONLINE/".session()->get('mm_tid'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-MERCHANT-ID: REFRAMEONLINE",
                "X-VERIFY: ".$this->payload_creation_status_check(),
                "accept: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}
