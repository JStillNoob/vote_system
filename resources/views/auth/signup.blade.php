@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/homepage.css', 'resources/css/signUp.css'])



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
                            <input type="tel" 
                                   id="contactNumber" 
                                   name="contactNumber" 
                                   class="form-control" 
                                   required 
                                   pattern="[0-9]{11}"
                                   maxlength="11"
                                   placeholder="Enter 11-digit number"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                   onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <div class="invalid-feedback">Please enter a valid 11-digit phone number.</div>
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
                    
                    // Additional phone number validation
                    var phoneInput = document.getElementById('contactNumber');
                    if (phoneInput.value.length !== 11) {
                        phoneInput.setCustomValidity('Phone number must be exactly 11 digits');
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        phoneInput.setCustomValidity('');
                    }
                    
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>





@extends('layout.app')

@push('scripts')
    @if(session('message') && session('student'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "Registration Successful!",
                text: "Your account has been created successfully. Please wait for admin approval. Student ID: {{ session('student')->student_id ?? '' }}",
                icon: "success",
                draggable: true,
                timer: 5000,
                timerProgressBar: true
            });
        });
    </script>
    @endif
@endpush