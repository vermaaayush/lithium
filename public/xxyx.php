<!DOCTYPE html>
<html>
<head>
    <title>reCAPTCHA Test</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h1>reCAPTCHA Test</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
        <br><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $recaptcha_secret = 'YOUR_RECAPTCHA_SECRET_KEY';
        $recaptcha_response = $_POST['g-recaptcha-response'];

        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_data = [
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response,
        ];

        $options = [
            'http' => [
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'method' => 'POST',
                'content' => http_build_query($recaptcha_data),
            ],
        ];

        $context = stream_context_create($options);
        $verify = file_get_contents($recaptcha_url, false, $context);
        $captcha_success = json_decode($verify);

        if ($captcha_success->success) {
            echo "<p style='color:green;'>reCAPTCHA verification passed.</p>";
        } else {
            echo "<p style='color:red;'>reCAPTCHA verification failed.</p>";
        }
    }
    ?>
</body>
</html>
