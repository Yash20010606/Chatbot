<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('assets/wallpaper3.jpg') no-repeat center center fixed; /* Replace with your image path */
            background-size: cover; /* Ensures the image covers the entire screen */
        }
        .login-container {
            max-width: 900px;
            margin: 100px auto;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 500px;
            margin-bottom: 60px;
            margin-top: 50px;
        }
        .left-section {
            flex: 1;
            background-color: #f9f9f9;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .left-section img {
            max-width: 100%;
            height: auto;
        }
        .right-section {
            flex: 1;
            background-color: #2279d6;
            color: #fff;
            padding: 40px;
        }
        .right-section h2 {
            margin-bottom: 20px;
            
        }
        .form-control {
            border-radius: 25px;
            padding: 15px;
        }
        .btn-primary {
            background-color: #10e15c;
            border: none;
            border-radius: 25px;
            padding: 10px 30px;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background-color: #6af596;
        }
        .forgot-password {
            text-decoration: none;
            color: #fff;
            font-size: 14px;
            
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .signup-link {
            color: #ffccbc;
        }
        .signup-link:hover {
            text-decoration: underline;
        }
        .navbar {
            background-color: #AAAAAA;
            padding: 0.5rem 1rem;
        }
        .navbar-brand {
            padding: 0;
        }
        .footer {
            background-color: #AAAAAA;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 10px 0;
        }
        .btn-green {
        background-color: #10e15c; /* Custom green color */
        color: white;
        border: none;
        border-radius: 25px;
        padding: 10px 30px;
        transition: 0.3s;
    }
    .btn-green:hover {
        background-color: #6af596; /* Lighter shade on hover */
    }
    </style>
</head>
<body>
    <div class="content">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/Logo.png" alt="SLT Logo" width="80" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
<div class="login-container">
    <!-- Left Section -->
    <div class="left-section">
        <img src="assets/slt_logo.png" alt="Illustration">
    </div>

    <!-- Right Section -->
    <div class="right-section">
        <h2>Login</h2>
        <p>       &nbsp;</p>

        <form>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <a href="#" class="forgot-password" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot your Password?</a>
            </div>
           
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        
    </div>
</div>

<div class="footer">
    Powered By Sri Lanka Telecom
</div>

<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5 class="modal-title fw-bold text-center" id="forgotPasswordModalLabel">Forgot Password</h5>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <input type="email" id="forgotEmail" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="d-grid">
                                <button type="button" class="btn btn-green">Send Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
