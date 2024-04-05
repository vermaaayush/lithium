<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Captcha implements Rule
{
    public function passes($attribute, $value)
    {
        // Verify the reCAPTCHA response here
        $recaptcha_secret = env('NOCAPTCHA_SECRET');
        $recaptcha_response = $value;

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

        return $captcha_success->success;
    }

    public function message()
    {
        return 'The :attribute field validation failed.';
    }
}
