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
        background-color: #0056b3;
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
            <h2>Welcome to {{$company->name}} - Your Registration Details</h2>
            <p>Dear {{$username}},</p>
            <p>Welcome aboard! We are delighted to have you as a member of our investment platform, where opportunities await to help you achieve your financial goals.</p>
            <p>Here are your login details to access your account:</p>
            <ul>
              <li><strong>Username:</strong> {{$email}}</li>
              <li><strong>Password:</strong> {{$password}}</li>
            </ul>
            <p><strong>Important Security Reminder:</strong> We highly recommend that you change your password immediately after logging in for the first time to enhance the security of your account. Choose a strong, unique password that includes a combination of letters, numbers, and special characters.</p>
            <p>To get started:</p>
            <ol>
    
              <li>Enter your username and password in the login section.</li>
              <li>Explore our platform's features, investment opportunities, and educational resources.</li>
            </ol>
            <p>Should you encounter any issues or have questions, our dedicated support team is available to assist you. Feel free to reach out to us via [Contact Information].</p>
            <p>Once again, welcome to {{$company->name}}! We look forward to being a part of your investment journey and helping you succeed.</p>
            <p>Best regards,</p>
            <p>
              <strong>{{$company->name}} Team</strong></p>       
            <p><a href="{{ $company->url }}" class="cta-btn">Visit Website</a></p>
        </div>
    </div>
</body>
</html>
