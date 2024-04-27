@php
  use App\Models\Config;
  $company = Config::first();  
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $company->name }}</title>
<style>
    /* Reset styles */
    body, html {
        margin: 0;
        padding: 0;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        line-height: 1.6;
        background-color: #f5f5f5;
    }
    /* Container styles */
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
    }
    /* Header styles */
    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    .header img {
        max-width: 150px;
    }
    .header h1 {
        color: #333;
        font-size: 24px;
        margin: 10px 0;
    }
    /* Content styles */
    .content {
        margin:20px;
        margin-bottom: 20px;
    }
    .content p {
        margin: 10px 0;
    }
    .content ul {
        margin: 10px 0;
        padding-left: 20px;
    }
    .content li {
        margin-bottom: 5px;
    }
    /* Call to action button */
    .cta-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        font-weight: bold;
    }
    .cta-btn:hover {
        background-color: #3b79ba;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ $company->logo }}" alt="Company Logo">
            <h1>{{ $company->logo }}</h1>
        </div>
        <div class="content">
            <h1>Login Alert - Account Access Notification</h1>
            <p>Dear {{ $user }},</p>
            <p>We are writing to inform you of a recent login to your account on {{ $company->url }}. Here are the details of the login:</p>
            <ul>
                <li><strong>Date and Time:</strong> {{ $date }}</li>
                <li><strong>IP Address:</strong> {{ $location }}</li>
     
                
            </ul>
            <p>If this login was unauthorized or you suspect any suspicious activity, please take immediate action by changing your password and reviewing your account security settings.</p>
            <p>If you have any questions or need further assistance, please contact our support team at <a href="mailto:{{ $company->email }}">{{ $company->email }}</a> or call us at {{ $company->phone }}. We are here to help ensure the security of your account.</p>
            <p>Thank you for choosing {{ $company->name }}.</p>
            <p>Best regards,</p>
            <p><strong>{{ $company->name }} Team</strong></p>
            <p style="text-align: center"><a href="{{ $company->url }}" class="cta-btn">Visit Website</a></p>
        </div>
    </div>
</body>
</html>
