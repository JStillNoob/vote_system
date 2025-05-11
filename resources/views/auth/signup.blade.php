@include('navbar')

@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/homepage.css'])

<style>
    .active-SignUp {
        background-color: #1A253D;
        color: #ffffff !important;
        border-radius: 10px;
    }

    /* Main container styling */
    .registration-container {
        max-width: 800px;
        margin: 3rem auto;
        padding: 0 1rem;
    }

    .registration-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        border: none;
    }

    .card-header {
        background: linear-gradient(135deg, #1A253D 0%, #2C3E50 100%);
        color: white;
        padding: 2rem;
        text-align: center;
        border-bottom: none;
    }

    .card-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .card-subtitle {
        font-size: 1rem;
        opacity: 0.9;
        font-weight: 400;
    }

    .card-body {
        padding: 2.5rem;
    }

    /* Section styling */
    .form-section {
        margin-bottom: 2.5rem;
    }

    .section-title {
        color: #1A253D;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1.25rem;
        position: relative;
        padding-bottom: 0.75rem;
    }

    .section-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, #1A253D 0%, rgba(26, 37, 61, 0.2) 100%);
        border-radius: 3px;
    }

    /* Form styling */
    .form-label {
        font-weight: 500;
        color: #4a5568;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-control, .form-select {
        height: 48px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        transition: all 0.2s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #1A253D;
        box-shadow: 0 0 0 3px rgba(26, 37, 61, 0.1);
        outline: none;
    }

    .form-control::placeholder {
        color: #a0aec0;
        opacity: 1;
    }

    /* Button styling */
    .submit-btn {
        background: linear-gradient(135deg, #1A253D 0%, #2C3E50 100%);
        border: none;
        color: white;
        padding: 0.875rem;
        font-size: 1.05rem;
        font-weight: 500;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        width: 100%;
        max-width: 300px;
        margin: 1.5rem auto 0;
        display: block;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 14px rgba(0, 0, 0, 0.1);
    }

    /* Link styling */
    .login-link {
        text-align: center;
        margin-top: 1.5rem;
        color: #718096;
    }

    .login-link a {
        color: #1A253D;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .login-link a:hover {
        color: #2C3E50;
        text-decoration: underline;
    }

    /* Error styling */
    .error-container {
        background-color: #fff5f5;
        border-left: 4px solid #f56565;
        border-radius: 4px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .error-message {
        color: #e53e3e;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .registration-container {
            padding: 0 1rem;
            margin: 1.5rem auto;
        }
        
        .card-header {
            padding: 1.5rem;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .card-title {
            font-size: 1.75rem;
        }
        
        .submit-btn {
            max-width: 100%;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .registration-card {
        animation: fadeIn 0.4s ease-out forwards;
    }
</style>

<div class="registration-container">
    <div class="card registration-card">
        <div class="card-header">
            <h1 class="card-title">Create Your Account</h1>
            <p class="card-subtitle">Join our community in just a few steps</p>
        </div>
        
        <div class="card-body">
            @if ($errors->any())
                <div class="error-container">
                    @foreach ($errors->all() as $error)
                        <div class="error-message">{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('signup-submit') }}" method="POST" class="needs-validation" novalidate>
                @csrf

                <!-- School Information Section -->
                <div class="form-section">
                    <h3 class="section-title">School Information</h3>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="student_id" class="form-label">Student ID</label>
                            <input type="number" id="student_id" name="student_id" class="form-control" required placeholder="Enter your student ID">
                            <div class="invalid-feedback">Please enter your student ID.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select id="department_id" name="department_id" class="form-select" required>
                                <option value="" disabled selected>Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select your department.</div>
                        </div>
                    </div>
                </div>

                <!-- Personal Information Section -->
                <div class="form-section">
                    <h3 class="section-title">Personal Information</h3>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="FirstName" class="form-label">First Name</label>
                            <input type="text" id="FirstName" name="FirstName" class="form-control" required placeholder="">
                            <div class="invalid-feedback">Please enter your first name.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="MiddleName" class="form-label">Middle Name</label>
                            <input type="text" id="MiddleName" name="MiddleName" class="form-control" required placeholder="">
                            <div class="invalid-feedback">Please enter your MiddleName.</div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="LastName" class="form-label">Last Name</label>
                            <input type="text" id="LastName" name="LastName" class="form-control" required placeholder="">
                            <div class="invalid-feedback">Please enter your last name.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3"  style="min-width: 220px;">
                            <label for="Sex" class="form-label">Gender</label>
                            <select id="Sex" name="Sex" class="form-select" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="invalid-feedback">Please select your gender.</div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="form-section">
                    <h3 class="section-title">Contact Information</h3>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required placeholder="example@school.edu">
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="contactNumber" class="form-label">Contact Number</label>
                            <input type="tel" id="contactNumber" name="contactNumber" class="form-control" required placeholder=" ">
                            <div class="invalid-feedback">Please enter a Phone Number.</div>

                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Create Account</button>

                <div class="login-link">
                    Already have an account? <a href="{{ route('login') }}">Sign in here</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional: Add form validation script -->
<script>
    // Example form validation
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
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