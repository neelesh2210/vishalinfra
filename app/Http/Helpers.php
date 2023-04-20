<?php

use App\Models\Admin\AssociateWallet;

if (! function_exists('generateRandomString')) {
    function generateRandomString($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}

if (! function_exists('imageUpload')) {
    function imageUpload($file,$path) {
        if($file)
        {
            $image = $file;
            $name = rand().time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($path);
            $image->move($destinationPath, $name);
        }
        else
        {
            $name='';
        }
        return $name;
    }
}

if (! function_exists('states')) {
    function states() {
        return [
            'Andhra Pradesh',
            'Arunachal Pradesh',
            'Assam',
            'Bihar',
            'Chhattisgarh',
            'Goa',
            'Gujarat',
            'Haryana',
            'Himachal Pradesh',
            'Jharkhand',
            'Karnataka',
            'Kerala',
            'Madhya Pradesh',
            'Maharashtra',
            'Manipur',
            'Meghalaya',
            'Mizoram',
            'Nagaland',
            'Odisha',
            'Punjab',
            'Rajasthan',
            'Sikkim',
            'Tamil Nadu',
            'Telangana',
            'Tripura',
            'Uttarakhand',
            'Uttar Pradesh',
            'West Bengal',
            'Andaman and Nicobar Islands',
            'Chandigarh',
            'Dadra and Nagar Haveli and Daman & Diu',
            'Delhi',
            'Jammu & Kashmir',
            'Ladakh',
            'Lakshadweep',
            'Puducherry'
        ];
    }
}

if (! function_exists('razorpay_payout_bank'))
{
    function razorpay_payout_bank($user,$amount)
    {
        $amount=$amount*100;
        $curl = curl_init();

        $data = [
            "account_number" =>env('RAZORPAYX_ACCOUNT_NUMBER'),
            "amount"=>$amount,
            "currency"=>"INR",
            "mode"=>"NEFT",
            "purpose"=>"payout",
            "fund_account" => [
                "account_type" =>"bank_account",
                "bank_account" =>[
                    "name"=>$user->bankDetail->holder_name,
                    "ifsc"=>$user->bankDetail->ifsc_code,
                    "account_number"=>$user->bankDetail->account_number,
                ],
                "contact"=>[
                    "name"=>$user->name,
                    "email"=>$user->email,
                    "contact"=>$user->phone,
                    "type"=>"customer",
                    "reference_id"=>"",
                    "notes"=>[
                        "notes_key_1"=>"Tea, Earl Grey, Hot",
                        "notes_key_2"=>"Tea, Earl Grey… decaf."
                    ]
                ]
            ],
            "queue_if_low_balance"=>true,
            "reference_id"=>"Acme Transaction ID 12345",
            "narration"=>"Acme Corp Fund Transfer",
            "notes"=>[
                "notes_key_1"=>"Beam me up Scotty",
                "notes_key_2"=>"Engage"
            ]
        ];

        $encodedData = json_encode($data);


        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.razorpay.com/v1/payouts',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$encodedData,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic '.env("RAZORPAYX_AUTHORIZATION"),
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}

if (! function_exists('razorpay_payout_upi'))
{
    function razorpay_payout_upi($user,$amount)
    {
        $curl = curl_init();

        $data = [
            "account_number" =>env('RAZORPAYX_ACCOUNT_NUMBER'),
            "amount"=>$amount*100,
            "currency"=>"INR",
            "mode"=>"UPI",
            "purpose"=>"payout",
            "fund_account" => [
                "account_type" =>"vpa",
                "vpa" =>[
                    "address"=>$user->bankDetail->upi_id,
                ],
                "contact"=>[
                    "name"=>$user->name,
                    "email"=>$user->email,
                    "contact"=>$user->phone,
                    "type"=>"customer",
                    "reference_id"=>"Acme Contact ID 12345",
                    "notes"=>[
                        "notes_key_1"=>"Tea, Earl Grey, Hot",
                        "notes_key_2"=>"Tea, Earl Grey… decaf."
                    ]
                ]
            ],
            "queue_if_low_balance"=>true,
            "reference_id"=>"Acme Transaction ID 12345",
            "narration"=>"Acme Corp Fund Transfer",
            "notes"=>[
                "notes_key_1"=>"Beam me up Scotty",
                "notes_key_2"=>"Engage"
            ]
        ];

        $encodedData = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.razorpay.com/v1/payouts',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$encodedData,
            CURLOPT_HTTPHEADER => array(
                'X-Payout-Idempotency: ',
                'Authorization: Basic '.env("RAZORPAYX_AUTHORIZATION"),
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}

if(!function_exists('associateWallet')){

    function associateWallet($associate_id){
        $associate_credit = AssociateWallet::where('user_id',$associate_id)->where('transaction_type','credit')->get()->sum('amount');
        $associate_debit = AssociateWallet::where('user_id',$associate_id)->where('transaction_type','debit')->get()->sum('amount');
        $remaining_wallet_balance = $associate_credit - $associate_debit;

        return ['associate_credit'=>$associate_credit,'associate_debit'=>$associate_debit,'remaining_wallet_balance'=>$remaining_wallet_balance];
    }

}
