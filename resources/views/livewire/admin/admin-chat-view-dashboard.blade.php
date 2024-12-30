<body>
    <div class="container py-3">
        <div class="row gy-1 justify-content-center">
              <!-- Active Chats -->
            <div class="col-md-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa fa-comments fa-2x me-2"></i>
                            <h4 class="card-title mb-0">Active Chats</h4>
                        </div>
                        <div class="circle mx-auto mb-3" style="background-color: #28a745; color: white;">25</div>
                        <button class="btn btn-success w-100">View</button>
                    </div>
                </div>
            </div>

            <!-- Resolved Chats -->
            <div class="col-md-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa fa-check-circle fa-2x me-2"></i>
                            <h4 class="card-title mb-0">Resolved Chats</h4>
                        </div>
                        <div class="circle mx-auto mb-3" style="background-color: #007bff; color: white;">50</div>
                        <button class="btn btn-secandary w-100">View</button>
                    </div>
                </div>
            </div>

            <!-- Pending Chats -->
            <div class="col-md-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa fa-clock fa-2x me-2"></i>
                            <h4 class="card-title mb-0">Pending Chats</h4>
                        </div>
                        <div class="circle mx-auto mb-3" style="background-color: #ffc107; color: white;">15</div>
                        <button class="btn btn-warning w-100">View</button>
                    </div>
                </div>
            </div>
        </div>
          
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');
        
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
        
        function toggleConfirmPasswordVisibility() {
            const confirmPasswordField = document.getElementById('confirmPassword');
            const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');
        
            if (confirmPasswordField.type === 'password') {
                confirmPasswordField.type = 'text';
                confirmPasswordIcon.classList.remove('fa-eye');
                confirmPasswordIcon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordField.type = 'password';
                confirmPasswordIcon.classList.remove('fa-eye-slash');
                confirmPasswordIcon.classList.add('fa-eye');
            }
        }
        
        </script>
          
</body>
</html>


