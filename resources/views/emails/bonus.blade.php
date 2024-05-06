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
            <p>Dear {{$user_x}},</p>

            <p>We are pleased to inform you that you have received a bonus on your investment! Your commitment to our investment platform has been duly rewarded, and we are grateful for your trust and partnership.</p>
            
            <p><strong>Details of the Investment Bonus:</strong></p>
            <ul>
              <li>Bonus Amount: $ {{$total_amount}}</li>
              <li>Date Received: {{$date}}</li>
            </ul>
            
            <p>This bonus is a token of appreciation for your continued support and investment with us. It reflects our commitment to providing value and rewarding our investors for their loyalty.</p>
            
            <p>Should you have any questions or need further assistance, please feel free to reach out to our customer support team. We are here to assist you every step of the way.</p>
            
            <p>Thank you once again for choosing us as your investment partner.</p>
            
            <p>Best regards,</p>
            <p><strong>{{$company->name}} Team</strong></p> 
            <p style="text-align: center"><a href="{{ $company->url }}" class="cta-btn">Visit Website</a></p>
        </div>
    </div>
</body>
</html>
