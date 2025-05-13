@include('navbar')

@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/homepage.css'])

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<style>
    html, body {
        overflow: hidden;
        height: 100%;
        margin: 0;
        padding: 0;
        background: #f8fafc;
    }

    .login-page {
        display: flex;
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
        display: flex;
        min-height: 100vh;
    }

    .login-left {
        flex: 1;
        background: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding: 2rem;
        padding-top: 7rem;
    }

    .login-logo {
        max-width: 300px;
        margin-bottom: 1.5rem;
        margin-top: 6rem;
    }

    .university-title {
        font-size: 2rem;
        font-weight: bold;
        color: #1A253D;
        margin-bottom: 0.5rem;
        margin-top: 2rem;
    }

    .university-tagline {
        color: #506183;
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    .login-right {
        flex: 1;
        background: #1A253D;
        background-image: repeating-linear-gradient(135deg, rgba(255,255,255,0.01) 0 2px, transparent 2px 40px);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding: 2rem;
        padding-top: 5rem;
    }

    .login-card {
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 8px 32px rgba(0,0,0,0.15);
        padding: 2.5rem 2rem;
        width: 100%;
        max-width: 400px;
        z-index: 1;
    }

    .login-title {
        font-size: 2.2rem;
        margin-bottom: 0.5rem;
        color: #1A253D;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .login-subtitle {
        color: #64748b;
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }
    
    .input-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: #475569;
        font-weight: 600;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
    }

    .input-wrapper {
        position: relative;
        width: 100%; /* Ensure the wrapper takes the full width of the input */
    }

    .input-icon {
        position: absolute;
        top: 50%; /* Center the icon vertically */
        left: 15px; /* Position the icon inside the input box */
        transform: translateY(-50%); /* Adjust for vertical centering */
        color: #94a3b8;
        font-size: 1rem;
        pointer-events: none; /* Prevent the icon from blocking input clicks */
        z-index: 1; /* Ensure the icon appears above the input field */
    }

    .form-input {
        padding-left: 45px; /* Add enough padding to make space for the icon */
        width: 100%; /* Ensure the input field takes full width */
        box-sizing: border-box; /* Include padding in width calculation */
        height: 48px; /* Ensure consistent height */
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.2s ease;
        background-color: #f8fafc;
        color: #1A253D;
    }

    .form-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        outline: none;
        background-color: #ffffff;
    }

    .form-input::placeholder {
        color: #94a3b8;
    }

    .login-btn {
        width: 100%;
        background: linear-gradient(135deg, #1A253D 0%, #2d3b5a 100%);
        color: white;
        border: none;
        padding: 1rem;
        font-size: 1.1rem;
        border-radius: 12px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
        letter-spacing: 0.5px;
        box-shadow: 
            0 4px 6px rgba(26, 37, 61, 0.2),
            0 0 0 1px rgba(255, 255, 255, 0.1);
        position: relative;
        overflow: hidden;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 
            0 6px 8px rgba(26, 37, 61, 0.3),
            0 0 0 1px rgba(255, 255, 255, 0.1);
    }

    .login-btn:active {
        transform: translateY(0);
    }

    .register-link {
        color: #3b82f6;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .register-link:hover {
        color: #2563eb;
        text-decoration: underline;
    }

    .error-list {
        background: rgba(254, 226, 226, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 1rem 1.25rem;
        margin-top: 1.5rem;
        border-left: 4px solid #ef4444;
        box-shadow: 0 4px 6px rgba(239, 68, 68, 0.1);
    }

    .error-item {
        color: #b91c1c;
        font-size: 0.875rem;
        margin: 0.375rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .error-item::before {
        content: '⚠️';
    }

    @keyframes gradientMove {
        0% { transform: translate(0, 0); }
        50% { transform: translate(-50%, -50%); }
        100% { transform: translate(0, 0); }
    }

    @keyframes backgroundMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(-50%, -50%); }
    }
</style>


<div class="login-page">
    <div class="login-left">
        <img src="{{ asset('images/SALFORD.png') }}" alt="Logo" class="login-logo">
        <h2 class="university-title">INOVATECH UNIVERSITY</h2>
        <p class="university-tagline">Shaping the future one moment at a time.</p>
    </div>

    <div class="login-right">
        <div class="login-card">
            <h1 class="login-title">Welcome Back!</h1>
            <p class="login-subtitle">Sign in to access your account</p>

            <form action="{{ route('login.submit') }}" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="input-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i> <!-- Email icon -->
                        <input type="email" name="email" id="email" class="form-input" placeholder="your.email@example.com" required>
                    </div>
                    <div id="email-error" class="text-danger" style="font-size: 0.875rem; margin-top: 0.5rem;"></div>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>

                <div class="input-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i> <!-- Password icon -->
                        <input type="password" name="password" id="password" class="form-input" placeholder="••••••••" required>
                    </div>
                    <div id="password-error" class="text-danger" style="font-size: 0.875rem; margin-top: 0.5rem;"></div>
                    <div class="invalid-feedback">Please enter your password.</div>
                </div>

                <button type="submit" class="login-btn">Sign In</button>

                <p class="text-center mt-4">
                    Don't have an account?
                    <a href="{{ route('show.signup') }}" class="register-link">Create Account</a>
                </p>

                @if ($errors->any())
                    <div class="error-list">
                        @foreach ($errors->all() as $error)
                            <p class="error-item">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

<script>
// Form validation script
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                let emailField = document.getElementById('email');
                let passwordField = document.getElementById('password');
                let emailError = document.getElementById('email-error');
                let passwordError = document.getElementById('password-error');

                // Reset error messages
                emailError.textContent = '';
                passwordError.textContent = '';

                // Check if fields are empty
                if (!emailField.value.trim()) {
                    emailError.textContent = 'Email is required.';
                    event.preventDefault();
                    event.stopPropagation();
                }
                if (!passwordField.value.trim()) {
                    passwordError.textContent = 'Password is required.';
                    event.preventDefault();
                    event.stopPropagation();
                }

                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>