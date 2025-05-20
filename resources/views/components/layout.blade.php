<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>iTask - Login</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <style>
    /* Base Styles */
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      background-color: #f8fafc;
      position: relative;
      overflow-x: hidden;
    }

    .dark {
      background-color: #0f172a;
      color: #e2e8f0;
    }

    /* Auth Container */
    .auth-container {
      max-width: 400px;
      width: 100%;
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .dark .auth-container {
      background-color: #1e293b;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.1);
    }

    /* Input Fields */
    .input-field {
      width: 100%;
      height: 45px;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      padding: 0 15px 0 45px;
      font-size: 16px;
      transition: all 0.3s;
    }

    .input-field:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
    }

    .dark .input-field {
      background-color: #1e293b;
      border-color: #475569;
      color: #f1f5f9;
    }

    .input-icon {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      width: 18px;
      height: 18px;
      color: #94a3b8;
    }

    /* Buttons */
    .auth-btn {
      width: 100%;
      height: 45px;
      border: none;
      border-radius: 8px;
      background-color: #0369a1;
      color: white;
      font-weight: 500;
      font-size: 16px;
      transition: all 0.3s;
    }

    .auth-btn:hover {
      background-color: #0284c7;
    }

    /* Toggle Switch */
    .toggle-container {
      position: relative;
      display: inline-block;
      width: 52px;
      height: 26px;
    }

    .toggle-container input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .toggle-switch {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #cbd5e1;
      transition: .4s;
      border-radius: 34px;
    }

    .toggle-switch:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }

    input:checked + .toggle-switch {
      background-color: #3b82f6;
    }

    input:checked + .toggle-switch:before {
      transform: translateX(26px);
    }

    /* Auth Tabs */
    .auth-tab {
      font-weight: 500;
      padding: 12px 0;
      text-align: center;
      width: 50%;
      cursor: pointer;
      transition: all 0.3s;
    }

    .auth-tab.active {
      color: #3b82f6;
      border-bottom: 2px solid #3b82f6;
    }

    .auth-tab:not(.active) {
      color: #64748b;
      border-bottom: 2px solid transparent;
    }

    .auth-tab:not(.active):hover {
      color: #475569;
      border-bottom: 2px solid #e2e8f0;
    }

    /* Form Sections */
    .form-section {
      display: none;
    }

    .form-section.active {
      display: block;
    }

    /* Background Illustrations */
    .bg-light,
    .bg-dark {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      z-index: -1;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .bg-light {
      background: linear-gradient(to top, #a5d8ff, #e0f7ff);
    }

    .bg-dark {
      background: linear-gradient(to top, #0f172a, #1e293b);
    }

    .stars,
    .moon,
    .clouds,
    .sun {
      position: absolute;
    }

    .moon {
      top: 60px;
      right: 60px;
      width: 80px;
      height: 80px;
      background: #facc15;
      border-radius: 50%;
      box-shadow: -10px 0 0 0 #0f172a;
    }

    .stars {
      width: 2px;
      height: 2px;
      background: #fff;
      border-radius: 50%;
    }

    .stars:nth-child(odd) {
      width: 3px;
      height: 3px;
    }

    .sun {
      top: 60px;
      left: 60px;
      width: 80px;
      height: 80px;
      background: #fcd34d;
      border-radius: 50%;
      box-shadow: 0 0 40px rgba(252, 211, 77, 0.7);
    }

    .clouds {
      top: 150px;
      left: 100px;
      width: 200px;
      height: 100px;
      background: #fff;
      border-radius: 50%;
      filter: blur(10px);
    }

    .hidden {
      display: none !important;
    }
  </style>
</head>
<body class="antialiased">
  <!-- Background -->
  <div id="bgLight" class="bg-light">
    <div class="sun"></div>
    <div class="clouds"></div>
  </div>
  <div id="bgDark" class="bg-dark hidden">
    <div class="moon"></div>
    <div class="stars" style="top: 80px; left: 150px;"></div>
    <div class="stars" style="top: 120px; left: 200px;"></div>
    <div class="stars" style="top: 180px; left: 100px;"></div>
    <div class="stars" style="top: 60px; left: 250px;"></div>
    <div class="stars" style="top: 100px; left: 300px;"></div>
  </div>

  <!-- Main Content -->
  <div class="min-h-screen flex items-center justify-center px-4 py-8">
    <div class="auth-container p-8">
      <!-- Logo -->
      <div class="flex justify-center mb-4">
        <img id="logoImage" src="images/logo.png" alt="iTask Logo" class="w-[96px] h-[96px] object-contain rounded-full">
      </div>
      <div class="text-center text-gray-500 dark:text-gray-400 mb-6">
        Simple to-do app
      </div>

      <!-- Dark Mode Toggle -->
      <div class="flex justify-center items-center mb-8">
        <span class="text-sm text-gray-600 dark:text-gray-400 mr-3">Light</span>
        <label class="toggle-container">
          <input type="checkbox" id="darkModeToggle">
          <span class="toggle-switch"></span>
        </label>
        <span class="text-sm text-gray-400 dark:text-gray-300 ml-3">Dark</span>
      </div>

      <!-- Auth Tabs -->
      <div class="flex border-b border-gray-200 dark:border-gray-700 mb-6">
        <div id="loginTab" class="auth-tab active">Login</div>
        <div id="registerTab" class="auth-tab">Register</div>
      </div>

      <!-- Login Form -->
      <div id="loginForm" class="form-section active">
        <form class="space-y-5">
          <div class="relative">
            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <input type="text" class="input-field" placeholder="Username">
          </div>
          <div class="relative">
            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              <circle cx="12" cy="16" r="1"></circle>
            </svg>
            <input type="password" class="input-field" placeholder="Password">
          </div>
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input id="rememberMe" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
              <label for="rememberMe" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Remember me</label>
            </div>
            <a href="#" class="text-sm text-blue-600 hover:text-blue-500 dark:text-blue-400">Forgot password?</a>
          </div>
          <button type="submit" class="auth-btn mt-6">Login</button>
        </form>
      </div>

      <!-- Register Form -->
      <div id="registerForm" class="form-section">
        <form class="space-y-4">
          <div class="relative">
            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <input type="text" class="input-field" placeholder="Full Name">
          </div>
          <div class="relative">
            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <input type="email" class="input-field" placeholder="Email">
          </div>
          <div class="relative">
            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <input type="text" class="input-field" placeholder="Username">
          </div>
          <div class="relative">
            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              <circle cx="12" cy="16" r="1"></circle>
            </svg>
            <input type="password" class="input-field" placeholder="Password">
          </div>
          <div class="relative">
            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              <circle cx="12" cy="16" r="1"></circle>
            </svg>
            <input type="password" class="input-field" placeholder="Confirm Password">
          </div>
          <div class="flex items-center">
            <input id="agreeTerms" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
            <label for="agreeTerms" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
              I agree to the <a href="#" class="text-blue-600 hover:text-blue-500 dark:text-blue-400">Terms of Service</a>
            </label>
          </div>
          <button type="submit" class="auth-btn mt-6">Register</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    // DOM Elements
    const darkModeToggle = document.getElementById('darkModeToggle');
    const bgLight = document.getElementById('bgLight');
    const bgDark = document.getElementById('bgDark');
    const logoImage = document.getElementById('logoImage');
    const loginTab = document.getElementById('loginTab');
    const registerTab = document.getElementById('registerTab');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    // Logo URLs
    const lightLogo = 'images/logo.png';
    const darkLogo = 'images/1logo Dark.png'; // Replace with your desired dark mode logo URL

    // Dark Mode Functions
    const enableDarkMode = () => {
      document.body.classList.add('dark');
      localStorage.setItem('darkMode', 'enabled');
      darkModeToggle.checked = true;
      bgDark.classList.remove('hidden');
      bgLight.classList.add('hidden');
      logoImage.src = darkLogo;
      logoImage.alt = 'iTask Dark Logo';
    };

    const disableDarkMode = () => {
      document.body.classList.remove('dark');
      localStorage.setItem('darkMode', null);
      darkModeToggle.checked = false;
      bgLight.classList.remove('hidden');
      bgDark.classList.add('hidden');
      logoImage.src = lightLogo;
      logoImage.alt = 'iTask Logo';
    };

    // Initialize Dark Mode
    const darkMode = localStorage.getItem('darkMode');
    if (darkMode === 'enabled') {
      enableDarkMode();
    } else {
      disableDarkMode();
    }

    // Dark Mode Toggle Event
    darkModeToggle.addEventListener('change', () => {
      const currentMode = localStorage.getItem('darkMode');
      if (currentMode !== 'enabled') {
        enableDarkMode();
      } else {
        disableDarkMode();
      }
    });

    // Tab Switching Events
    loginTab.addEventListener('click', () => {
      loginTab.classList.add('active');
      registerTab.classList.remove('active');
      loginForm.classList.add('active');
      registerForm.classList.remove('active');
    });

    registerTab.addEventListener('click', () => {
      registerTab.classList.add('active');
      loginTab.classList.remove('active');
      registerForm.classList.add('active');
      loginForm.classList.remove('active');
    });
  </script>
</body>
</html>