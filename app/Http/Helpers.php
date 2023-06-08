<?php

use App\Models\Admin\AssociateWallet;

if (! function_exists('generateRandomString')) {
    function generateRandomString($n) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
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

if (!function_exists('api_asset')) {
    function api_asset($id){
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return $asset->file_name;
        }
        return "";
    }
}

if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id){
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return my_asset($asset->file_name);
        }
        return null;
    }
}

if (! function_exists('my_asset')) {
    function my_asset($path, $secure = null){
        if(env('FILESYSTEM_DRIVER') == 's3'){
            return Storage::disk('s3')->url($path);
        }else{
            return app('url')->asset($path, $secure);
        }
    }
}

if (! function_exists('static_asset')) {
    function static_asset($path, $secure = null){
        return app('url')->asset($path, $secure);
    }
}

if (!function_exists('getBaseURL')) {
    function getBaseURL(){
        $root =(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $root;
    }
}

if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL(){
        if(env('FILESYSTEM_DRIVER') == 's3'){
            return env('AWS_URL').'/';
        }
        else{
            return getBaseURL();
        }
    }
}

function hex2rgba($color, $opacity = false) {

    $default = 'rgb(230,46,4)';
    if(empty($color))
          return $default;
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }
    $rgb = array_map('hexdec', $hex);
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }
    return $output;
}

function compress($src, $dist, $dis_width =500) {
    $img = '';
    $extension = strtolower(strrchr($src, '.'));
    switch($extension)
    {
        case '.jpg':
        case '.jpeg':
            $img = imagecreatefromjpeg($src);
            break;
        case '.gif':
            $img = imagecreatefromgif($src);
            break;
        case '.png':
            $img = imagecreatefrompng($src);
            break;
    }
    $width = imagesx($img);
    $height = imagesy($img);
    $dis_height = $dis_width * ($height / $width);
    $new_image = imagecreatetruecolor($dis_width, $dis_height);
    imagecopyresampled($new_image, $img, 0, 0, 0, 0, $dis_width, $dis_height, $width, $height);
    $imageQuality = 90;
    switch($extension)
    {
        case '.jpg':
        case '.jpeg':
            if (imagetypes() & IMG_JPG) {
                imagejpeg($new_image, $dist, $imageQuality);
            }
            break;
        case '.gif':
            if (imagetypes() & IMG_GIF) {
                imagegif($new_image, $dist);
            }
            break;
        case '.png':
            $scaleQuality = round(($imageQuality/100) * 9);
            $invertScaleQuality = 9 - $scaleQuality;
            if (imagetypes() & IMG_PNG) {
                imagepng($new_image, $dist, $invertScaleQuality);
            }
            break;
    }
    imagedestroy($new_image);
    return filesize($src);
}
