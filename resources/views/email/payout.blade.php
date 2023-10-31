<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Skill Kulam</title>
    <meta name="description" content="Skill Kulam">
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
                <table style="background-color: #fff;" width="100%" border="0" align="center" cellpadding="0"
                    cellspacing="0">
                    <tr>
                        <td style="height:40px;">&nbsp;</td>
                    </tr>
                    <!-- Email Content -->
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:600px; background:#ff5f201f; border: 1px solid rgba(0, 0, 0, .1); border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td
                                        style="text-align:center; border-bottom:1px solid #dddddd6b; padding-bottom:10px;">
                                        <a href="{{ asset('frontend/assets/img/logo.png')}}" title="logo"
                                            target="_blank">
                                            <img src="{{ asset('frontend/assets/img/logo.png')}}" title="logo"
                                                alt="logo">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Title -->
                                <tr>
                                    <td style="text-align:center;">
                                        <h1
                                            style="color:#1e1e2d; font-weight:bold; margin-top: 15px; margin-bottom:15px; font-size:32px;font-family:'Rubik',sans-serif;">
                                            Congratulations!</h1>
                                        <h1
                                            style="color:#1e1e2d; font-weight:bold; margin:0;font-size:40px;font-family:'Rubik',sans-serif;">
                                            @isset($user_name)
                                                {{ $user_name }}
                                            @endisset
                                        </h1>
                                        <h1
                                            style="color:#1e1e2d; font-weight:bold; margin:0;font-size:35px;color:red;font-family:'Rubik',sans-serif;">
                                            You Have Earned</h1><br>
                                        <h1
                                            style="color:#1e1e2d; font-weight:bold; margin:0;font-size:45px;font-family:'Rubik',sans-serif;">
                                            @isset($amount)
                                                {{ $amount }}
                                            @endisset INR</h1>
                                    </td>

                                </tr>
                                <!-- Details Table -->
                                <tr>
                                    <td>
                                        <p style="text-align:center;font-size:24px;font-weight:500;">We Are Happy To
                                            Inform You That We Have Transferred Your Payment Into Your Bank Account.</p>
                                        <h1
                                            style="text-align:center;color:#1e1e2d; font-weight:bold; margin:0;font-size:30px;font-family:'Rubik',sans-serif;">
                                            ({{ date('d M Y') }})</h1><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;"><img src="{{ asset('frontend/assets/img/ribbon.png') }}"
                                            style="height: 60px;width:100%;"></td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
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
