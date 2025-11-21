<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Member Profile Details</title>
    <style>
        body {
            background: #f5f7fa;
            font-family: Arial, sans-serif;
            padding: 0;
            margin: 0;
        }

        .email-container {
            width: 100%;
            max-width: 600px;
            background: #ffffff;
            margin: 30px auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .header {
            background: #4a6cf7;
            color: white;
            padding: 25px;
            text-align: center;
        }

        .header h2 {
            margin: 0;
            font-size: 22px;
        }

        .content {
            padding: 25px;
            line-height: 1.6;
            color: #333;
        }

        .content p {
            margin: 0 0 15px;
            font-size: 15px;
        }

        .details-box {
            background: #f1f4ff;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .details-box p {
            margin: 7px 0;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            background: #4a6cf7;
            color: #ffffffff;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 15px;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            padding: 15px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>

<body>

<div class="email-container">

    <div class="header">
        <h2>Your Member Profile is Ready</h2>
    </div>

    <div class="content">
        <p>Hello,</p>
        <p>Your member profile has been created successfully. Below are your login details:</p>

        <div class="details-box">
            <p>📧 <strong>Email:</strong> {{ $member->email }}</p>
            <p>🔐 <strong>Password:</strong> {{ $plain_password }}</p>
            <p>🛡 <strong>Role:</strong> {{ ucfirst($member->role) }}</p>
        </div>

        <p>You can log in using the button below:</p>

        <a href="{{ url('/admin') }}" class="btn">Login to Your Account</a>

        <p style="margin-top: 25px;">
            If you did not request this account, please contact support immediately.
        </p>
    </div>

    <div class="footer">
        © {{ date('Y') }} Your Company. All rights reserved.
    </div>

</div>

</body>
</html>
