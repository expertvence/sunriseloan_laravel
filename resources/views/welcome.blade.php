@extends('layouts.app')
@include('layouts.head')

@section('content')
    <style>
        /* GLOBAL RESET */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
        }

        /* BACKGROUND ANIMATION */
        .login-bg {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(-45deg, #0a2540, #163a63, #235077, #0f2027);
            background-size: 400% 400%;
            animation: slideBG 10s ease infinite;
        }

        @keyframes slideBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* CARD */
        .login-card {
            width: 100%;
            max-width: 1050px;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
        }

        /* LEFT IMAGE PANEL */
        .login-image {
            flex: 1;
            background: url('https://images.pexels.com/photos/4386373/pexels-photo-4386373.jpeg') center/cover no-repeat;
            position: relative;
        }

        .login-image::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to right,
                    rgba(5, 20, 40, 0.95),
                    rgba(10, 37, 64, 0.85),
                    rgba(10, 37, 64, 0.60));
        }

        /* LEFT SIDE CONTENT */
        .image-overlay-content {
            position: absolute;
            inset: 0;
            padding: 60px 50px;
            color: #ffffff;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .image-overlay-content h2 {
            font-size: 2.3rem;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .tagline {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0 0 30px 0;
        }

        .feature-list li {
            margin-bottom: 12px;
            font-size: 0.95rem;
            opacity: 0.95;
        }

        .footer-note {
            font-size: 0.85rem;
            opacity: 0.8;
        }

        /* RIGHT FORM PANEL */
        .login-form-wrap {
            flex: 1;
            padding: 60px 50px;
            background: linear-gradient(to bottom right, #ffffff, #f4f9ff);
        }

        /* HEADING STYLES */
        .login-form-wrap h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #0a2540;
        }

        .login-form-wrap p.subtitle {
            color: #6b7c93;
            margin-top: 6px;
            font-size: 0.95rem;
        }

        /* INPUT STYLES */
        .form-control {
            border-radius: 12px;
            border: 1.5px solid #d7dde7;
            height: 50px;
            padding-left: 16px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: #0a2540;
            box-shadow: 0 0 0 2px rgba(10, 37, 64, 0.15);
        }

        /* BUTTON */
        .btn-login {
            width: 100%;
            height: 50px;
            border-radius: 30px;
            background: linear-gradient(135deg, #0a2540, #163a63);
            color: white;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(10, 37, 64, 0.25);
        }

        /* PASSWORD TOGGLE */
        .toggle-pass {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c7a89;
        }

        /* RESPONSIVE */
        @media(max-width: 768px) {
            .login-card {
                flex-direction: column;
            }

            .login-image {
                height: 220px;
            }
        }

        .image-overlay-content {
            position: absolute;
            inset: 0;
            padding: 70px 60px;
            color: #ffffff;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .facility-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .facility-subtitle {
            font-size: 1rem;
            margin-bottom: 35px;
            line-height: 1.6;
            opacity: 0.9;
        }

        .facility-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .facility-item h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .facility-item p {
            font-size: 0.9rem;
            opacity: 0.85;
            margin: 0;
        }

        .tick {
            display: inline-block;
            color: #00e676;
            font-weight: bold;
            margin-right: 8px;
            font-size: 1rem;
        }

        .welcome-box h1 {
            font-size: 1.9rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #0a2540;
        }

        .welcome-box h1 span {
            background: linear-gradient(135deg, #0a2540, #00c853);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            color: #5f6c7b;
            font-size: 0.95rem;
        }
    </style>

    <div class="login-bg">

        <div class="login-card">

            <!-- LEFT SIDE IMAGE -->
            <div class="login-image">

                <div class="image-overlay-content">

                    <h2 class="facility-title">
                        Sunrise Loan Facilities
                    </h2>

                    <p class="facility-subtitle">
                        SUNRISE LOAN provides modern, secure and transparent
                        microfinance solutions for individuals and communities.
                    </p>

                    <div class="facility-list">

                        <div class="facility-item">
                            <h4><span class="tick">✔</span> Easy Loan Processing</h4>
                            <p>Quick approval with minimal documentation.</p>
                        </div>

                        <div class="facility-item">
                            <h4><span class="tick">✔</span> Flexible Installments</h4>
                            <p>Weekly & monthly repayment options available.</p>
                        </div>

                        <div class="facility-item">
                            <h4><span class="tick">✔</span> Low Service Charge</h4>
                            <p>Affordable interest & transparent calculation system.</p>
                        </div>

                        <div class="facility-item">
                            <h4><span class="tick">✔</span> Secure Member Records</h4>
                            <p>Digitally managed borrower & transaction data.</p>
                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT LOGIN FORM -->
            <div class="login-form-wrap">

                <div class="welcome-box">
                    <h1>Welcome to <span>SUNRISE LOAN</span></h1>
                    <p class="subtitle">
                        Smart Micro Loan & Financial Management System
                    </p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label">E-Mail or Mobile No</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autofocus>

                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required>

                        <span class="toggle-pass" onclick="togglePassword()">👁</span>

                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>

                    <button type="submit" class="btn btn-login">
                        Login to SURISE LOAN
                    </button>

                    @if (Route::has('password.request'))
                        <div class="mt-3 text-center">
                            <a href="{{ route('password.request') }}" style="color:#0a2540;">
                                Forgot Your Password?
                            </a>
                        </div>
                    @endif

                </form>

            </div>

        </div>

    </div>

    <script>
        function togglePassword() {
            const pass = document.getElementById("password");
            pass.type = pass.type === "password" ? "text" : "password";
        }
    </script>
@endsection
