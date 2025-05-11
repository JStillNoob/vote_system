@include('navbar')

@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/homepage.css'])

<style>
    .login-page {
        display: flex;
        height: 100vh;
    }

    .left-side {
        flex: 1;
        background-color: #1A253D; /* Same as your dark blue */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    /* Insert the below style here */
    .left-side img {
        max-width: 500px; /* Increased the max-width to make the logo bigger */
        margin-bottom: 1rem;
    }

    .left-side h2 {
        color: #ffffff;
        margin: 0;
    }

    .left-side p {
        color: #cccccc;
        font-size: 0.9rem;
    }

    .right-side {
        flex: 1;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }

    .login-card {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 400px;
    }

    .login-title {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 0.5rem;
        color: #1A253D;
    }

    .login-subtitle {
        text-align: center;
        color: #666;
        margin-bottom: 2rem;
    }

    .input-group {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
        z-index: 2;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 0.75rem 0.75rem 40px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }

    .form-input:focus {
        border-color: #1A253D;
        outline: none;
    }

    .login-btn {
        width: 100%;
        background-color: #1A253D;
        color: white;
        border: none;
        padding: 0.75rem;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 10px;
    }

    .login-btn:hover {
        background-color: #16203a;
    }

    .register-link {
        color: #1A253D;
        text-decoration: underline;
    }

</style>


    

    
</style>
<div class="login-page">
    <div class="left-side">
        <img src="{{ asset('storage/schoolIcon.png') }}" alt="Logo">
    </div>

    <div class="right-side">
        <div class="login-card">
            <h1 class="login-title">Log in</h1>
            <p class="login-subtitle">Sign in to your account</p>

            <form action="{{ route('login.submit') }}" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="input-group">
                    <span class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                        </svg>
                    </span>
                    <input type="email" name="email" class="form-input" placeholder="Email" required>
                    <div class="invalid-feedback">Please enter your email.</div>
                </div>

                <div class="input-group">
                    <span class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>
                    </span>
                    <input type="password" name="password" class="form-input" placeholder="Password" required>
                    <div class="invalid-feedback">Please enter your password.</div>
                </div>

                <button type="submit" class="login-btn">Log In</button>

                <p class="text-center mt-4">
                    Don't have an account?
                    <a href="{{ route('show.signup') }}" class="register-link">Register</a>
                </p>

                @if ($errors->any())
                    <ul class="px-4 py-2 bg-red-100">
                        @foreach ($errors->all() as $error)
                            <li class="my-2 text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </div>
    </div>
</div>