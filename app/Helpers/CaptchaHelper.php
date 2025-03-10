// app/Helpers/CaptchaHelper.php
<?php

if (!function_exists('generateCaptcha')) {
    function generateCaptcha($length = 6)
    {
        // Characters to use in the CAPTCHA
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $captchaText = '';

        // Generate random string
        for ($i = 0; $i < $length; $i++) {
            $captchaText .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Store CAPTCHA text in the session
        session(['captcha_text' => $captchaText]);

        return $captchaText;
    }
}