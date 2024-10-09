<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verification Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f7;
            margin: 0;
            padding: 0;
            color: #333333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px;
            background-color: #4CAF50;
            color: #ffffff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
            line-height: 1.6;
        }
        .content p {
            margin: 10px 0;
        }
        .content h2 {
            color: #4CAF50;
            font-size: 20px;
        }
        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1>Account Verified Successfully</h1>
        </div>

        <!-- Email Content Section -->
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>

            <p>We are pleased to inform you that your account has been successfully verified. You can now log in and access all the features of our platform.</p>

            <p>If you have any questions or need assistance, feel free to reach out to our support team. We are always here to help.</p>

            <p>Thank you for being a valued member of our community. We look forward to serving you.</p>

            {{-- <p><a href="{{ config('app.url') }}" class="btn">Go to Dashboard</a></p> --}}
        </div>


        <div class="footer">
            <p>If you did not request this, please disregard this message.</p>
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
