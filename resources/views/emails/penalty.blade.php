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
            padding: 20px;
            border-bottom: 1px solid #ccc;
            background-color: #333;
            color: #fff;
        }
        .header img {
            max-width: 150px;
        }
        .header h1 {
            color: #fff;
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
        /* Footer styles */
        .footer {
            text-align: center;
            padding: 20px;
            border-top: 1px solid #ccc;
            background-color: #f5f5f5;
            color: #333;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ env('APP_URL') }}/{{ $company->logo }}" alt="Company Logo">
            
        </div>
        <div class="content">
            <p>Dear {{$user_x}},</p>

            <p>We regret to inform you that a penalty has been deducted from your account. Please review the details below:</p>
            
           
            <ul>
              <li>Penalty Amount: $ {{$total_amount}}</li>
              <li>Date: {{$date}}</li>
            </ul>
            
            <p>Thank you for your attention to this matter.</p>
            
            <p>Best regards,</p>
            <p><strong>{{$company->name}} Team</strong></p> 
            <p><strong>Visit Now: </strong><a href="{{ $company->url }}">{{ $company->url }}</a></p>
                   
        
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ $company->name }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
