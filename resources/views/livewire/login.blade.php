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
            background: url('assets/wallpaper3.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .content-wrapper {
            flex: 1;
        }
        .login-container {
            max-width: 900px;
            margin: 50px auto;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: auto;
            background-color: #fff;
        }
        .left-section {
            flex: 1;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
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
            text-align: center;
        }
        .form-control {
            border-radius: 25px;
            padding: 15px;
        }
        .btn-primary {
            background-color: #1256bc;
            border: none;
            border-radius: 25px;
            padding: 10px 30px;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background-color: #0b3c8b;
        }
        .forgot-password {
            text-decoration: none;
            color: #fff;
            font-size: 14px;
            display: block;
            text-align: center;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .navbar {
            background-color: #AAAAAA;
            padding: 0.5rem 1rem;
        }
        .footer {
            background-color: #AAAAAA;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
        }
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                height: auto;
            }
            .left-section, .right-section {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/Logo.png" alt="SLT Logo" width="80">
                </a>
            </div>
        </nav>
        <div class="login-container">
            <div class="left-section">
                <img src="assets/slt_logo.png" alt="SLT Logo">
            </div>
            <div class="right-section">
                <h2>Login</h2>
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <a href="#" class="forgot-password" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot your Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        Powered By Sri Lanka Telecom
    </div>
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title fw-bold" id="forgotPasswordModalLabel">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="forgotEmail" class="form-label">Enter your email</label>
                            <input type="email" id="forgotEmail" class="form-control" placeholder="Email address" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>