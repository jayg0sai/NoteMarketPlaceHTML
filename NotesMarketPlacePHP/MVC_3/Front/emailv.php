<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Title -->
    <title>Email Verification</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Open Sans", sans-serif;
        }

        .mail {
            padding: 30px;
            margin: auto;
        }

        .mail h3 {
            font-size: 26px;
            line-height: 30px;
            font-weight: 600;
            color: #6255a5;
            margin: 50px 0 20px;
        }

        #message p {
            font-size: 16px;
            line-height: 20px;
            font-weight: 400;
            color: #333333;
            margin: 10px 0;
        }

        #message p span {
            font-size: 18px;
            line-height: 22px;
            font-weight: 600;
            color: #333333;
        }

        .btn-mail {
            margin: 20px 0;
        }

        a.btn {
            color: #fff;
            background-color: #6255a5;
            border-radius: 3px;
            padding: 10px 20px;
            font-weight: 500;
            font-size: 18px;
            line-height: 30px;
            text-transform: uppercase;

        }

    </style>

</head>

<body data-spy="scroll">
    <div class="container mail">
        <div id="logo">
            <a href="#"><img src="images/logo.png" alt="logo"></a>
        </div>
        <div id="heading">
            <h3>Email Verification</h3>
        </div>

        <div id="message">
            <p><span>Dear,</span></p>
            <p>Thank you for signing up with us. Please click on below button to verify your email address and to do login.</p>
        </div>
        <div class="btn-mail">
            <a class="btn" title="Verify Email Address" role="button">Verify Email Address</a>
        </div>
        <div class="footer">
            <p>Regards,</p>
            <p>Notes Marketplace</p>
            
        </div>

    </div>
</body>

</html>
