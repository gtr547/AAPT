<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class SignUpController extends Controller
{
    // Show the sign-up form
    public function show()
    {
        $captchaText = $this->generateCaptcha();
        return view('signup', ['captchaText' => $captchaText]);
    }

    // Handle the sign-up form submission
    public function submit(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'captcha' => 'required|string',
        ]);

        // Check if CAPTCHA is valid
        if ($request->captcha !== session('captcha_text')) {
            return redirect()->back()->withErrors(['captcha' => 'Invalid CAPTCHA.'])->withInput();
        }

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect to login page with success message
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    // Generate CAPTCHA text
    private function generateCaptcha()
    {
        $captchaText = substr(md5(rand()), 0, 6); // Generate a random 6-character string
        session(['captcha_text' => $captchaText]); // Store CAPTCHA text in session
        return $captchaText;
    }
}