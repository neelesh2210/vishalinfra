<!doctype html>
<html lang="en-US">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Reframe Enterprises</title>
<meta name="description" content="Reframe Enterprises">
</head>
<style>
a:hover {
    text-decoration: underline !important;
}
</style>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px;" leftmargin="0">
<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
    style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
    <tr>
        <td>
            <table style="background-color: #fff;" width="100%" border="0"
                align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="height:40px;">&nbsp;</td>
                </tr>
                <!-- Logo -->

                <!-- Email Content -->
                <tr>
                    <td>
                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                            style="max-width:600px; background:#ff5f201f; border: 1px solid rgba(0, 0, 0, .1); border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                            <tr>
                                <td style="text-align:center; border-bottom:1px solid #ddd;padding:10px;">
                                    <a href="{{ asset('frontend/assets/img/logo.png')}}" title="logo" target="_blank">
                                        <img src="{{ asset('frontend/assets/img/logo.png')}}"
                                            title="logo" alt="logo" style="height:70px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:20px;">&nbsp;</td>
                            </tr>
                            <!-- Title -->
                            <tr >
                                <td style="text-align:center; padding: 0 40px">
                                    <h1
                                        style="color:#1e1e2d; font-weight:400; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">
                                        Hey @isset($user_name)
                                        {{ $user_name }},
                                        @endisset </h1>
                                        <p style="margin:5px"> <b> Congrats!</b> One of your Team member is doing amazing and got a new sale hence you as leader get the below affiliate bonus.</p>
                                    <span
                                        style="display:inline-block; vertical-align:middle; margin:10px 0 20px; border-bottom:1px solid #cecece;
                                    width:100px;"></span>
                                    <p style="margin:5px; text-align:left;padding:0">You got a <b> Passive Commission</b> from @isset($comes_from)
                                        ({{optional($comes_from)->name}})
                                    @endisset .</p>
                                </td>

                            </tr>
                            <!-- Details Table -->
                            <tr>
                                <td style="padding: 0 40px 10px;">
                                    <table cellpadding="0" cellspacing="0"
                                        style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="padding: 10px;  width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                    <b>Affiliate Income:</b></td>
                                                <td
                                                    style="padding: 10px; color: #455056;">
                                                    ₹ @isset($amount)
                                                    {{ $amount }}
                                                    @endisset </td>

                                            </tr>
                                            <tr>
                                                <td
                                                    style="padding: 10px;  width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                   <b> Details: </b> </td>
                                                <td
                                                    style="padding: 10px; color: #455056;">
                                                    Reframe Enterprises
                                            </tr>
                                            <tr>
                                                <td
                                                    style="padding: 10px;  width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                    <b> Status: </b> </td>
                                                <td
                                                    style="padding: 10px; color: #455056;">
                                                    Verified  </td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                    <p style="text-align:center; margin:5px;">Kindly Note, this commission will be added</p>
                                    <p style="text-align:center; margin:5px;">to</p>
                                        <p style="text-align:center; margin:5px;">  your Affiliate account and will be paid out to your bank in the upcoming payout cycle</p>
                                        <h5 style="text-align:center; margin:5px;">Thank you.</h5>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>

</table><br>
</body>

</html>
