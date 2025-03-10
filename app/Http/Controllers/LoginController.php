<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'mobile' => 'required|numeric|digits:10',
            'password' => 'required|min:5',
            'captcha' => 'required|string',
        ]);

        // CAPTCHA verification
        if ($request->captcha !== session('captcha_text')) {
            return back()->withErrors(['captcha' => 'CAPTCHA verification failed.'])->withInput();
        }

        return redirect()->route('login');
    }

    // Generate CAPTCHA text
    public function generateCaptcha($length = 6)
    {
        // Characters to use in the CAPTCHA
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $captchaText = '';

        // Generate random string
        for ($i = 0; $i < $length; $i++) {
            $captchaText .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Store CAPTCHA in session
        session(['captcha_text' => $captchaText]);

        return $captchaText;
    }

    public function show()
    {
        //  CAPTCHA text
        $captchaText = $this->generateCaptcha();

        // Check if the CAPTCHA text is generated
        \Log::info('Generated CAPTCHA:', ['captchaText' => $captchaText]);

        // Pass CAPTCHA text to the view
        return view('login', ['captchaText' => $captchaText]);
    }
}