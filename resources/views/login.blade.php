<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAPT Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Header Section -->
    <header class="bg-blue-900 text-white py-4 text-center">
        <h4 class="text-xl font-bold">GOVERNMENT OF ASSAM</h4>
        <h5 class="text-lg mt-2">ASSAM ADMINISTRATIVE AND PENSION TRIBUNAL</h5>
        <p class="text-sm mt-1">GUWAHATI, ASSAM</p>
    </header>

    <!-- Navigation Bar -->
    <!-- <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-blue-600">Home</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">About Us</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">Act & Regulations</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">Member</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">Notices</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">Case Management Services</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">FAQ</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">Contact Us</a>
                </div>
            </div>
        </div>
    </nav> -->

    <x-navigation-bar />

    <!-- Login Container -->
    <main class="max-w-md mx-auto mt-8 bg-white rounded-lg shadow-md p-8">
        <h3 class="text-2xl font-bold text-center mb-6">Internal User Login</h3>
        
<form method="POST" action="{{ route('login.submit') }}">
    @csrf
    <!-- Mobile Input -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Mobile Number</label>
        <input type="text" 
               name="mobile" 
               value="{{ old('mobile') }}" 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('mobile')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password Input -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" 
               name="password" 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- CAPTCHA -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">CAPTCHA</label>
        <div class="flex items-center space-x-4">
            <div class="bg-gray-200 p-2 rounded-md">
                <span class="font-mono text-lg">{{ $captchaText }}</span>
            </div>
            <button type="button" 
                    onclick="refreshCaptcha()" 
                    class="p-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Refresh
            </button>
        </div>
        <input type="text" 
               name="captcha" 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
        @error('captcha')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" 
            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
        Login Now
    </button>

    <p class="text-center mt-4 text-sm text-gray-600">
    Don't have an account? <a href="{{ route('signup') }}" class="text-blue-600 hover:underline">Sign Up</a>
    </p>
    
</form>

<script>
    function refreshCaptcha() {
        fetch('/refresh-captcha')
            .then(response => response.json())
            .then(data => {
                document.querySelector('.font-mono').textContent = data.captcha;
            });
    }
</script>
    <!-- Footer -->
    <footer class="text-center mt-8 py-4 bg-gray-50">
        <p class="text-sm text-gray-600">
            © 2023 Assam Administrative and Pension Tribunal. All rights reserved.
        </p>
    </footer>
</body>
</html>