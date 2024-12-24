<body>
    <div class="container py-3">
        <div class="row gy-1">
             <!-- Supervisor Section -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa fa-user-tie fa-2x me-2"></i>
                        <h4 class="card-title mb-0">Supervisor</h4>
                    </div>
                    <div class="circle mx-auto mb-3">10</div>
                    <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#addSupervisortModal">
                        <i class="fa fa-plus-circle me-2"></i> Add
                    </button>
                </div>
            </div>
        </div>
            
             <!-- Agent Section -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa fa-user fa-2x me-2"></i>
                        <h4 class="card-title mb-0">Agent</h4>
                    </div>
                    <div class="circle mx-auto mb-3">95</div>
                    <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#addAgentModal">
                        <i class="fa fa-plus-circle me-2"></i> Add
                    </button>
                </div>
            </div>
        </div>


            <!-- Reporter Section -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa fa-newspaper fa-2x me-2"></i>
                        <h4 class="card-title mb-0">Reporter</h4>
                    </div>
                    <div class="circle mx-auto mb-3">20</div>
                    <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#addReporterModal">
                        <i class="fa fa-plus-circle me-2"></i> Add
                    </button>
                </div>
            </div>
        </div>

        <!-- Group Section -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa fa-users fa-2x me-2"></i>
                        <h4 class="card-title mb-0">Group</h4>
                    </div>
                    <div class="circle mx-auto mb-3">13</div>
                    <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#addGroupModal">
                        <i class="fa fa-plus-circle me-2"></i> Add
                    </button>
                </div>
            </div>
        </div>
    </div>

        
            <!-- Add Agent Modal -->
            <div class="modal" id="addAgentModal" tabindex="-1" aria-labelledby="addAgentModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: white; color: rgb(4, 167, 4);">
                            <h5 class="modal-title" id="addAgentModalLabel">Add Agent</h5>
                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="#">
                                <div class="mb-3">
                                    <label for="employeeId" class="form-label">Employee ID</label>
                                    <input type="text" id="employeeId" class="form-control" wire:model="employeeId">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" class="form-control" wire:model="name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control" wire:model="email">
                                </div>
                                <div class="mb-3">
                                    <label for="callCenter" class="form-label">Group</label>
                                    <select id="callCenter" class="form-select" wire:model="callCenter">
                                        <option value="">Select</option>
                                        <option value="1">Group 1</option>
                                        <option value="2">Group 2</option>
                                        <option value="3">Group 3</option>
                                        <option value="4">Group 4</option>
                                        <option value="5">Group 5</option>
                                        <option value="6">Group 6</option>
                                        <option value="7">Group 7</option>
                                        <option value="8">Group 8</option>
                                        <option value="9">Group 9</option>
                                        <option value="10">Group 10</option>
                                        <option value="11">Group 11</option>
                                        <option value="12">Group 12</option>
                                        <option value="13">Group 13</option>
                                    </select>
                                </div>
    
                                <!-- Language Skills -->
                                <div class="mb-3">
                                    <label class="form-label">Language</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="english" class="form-check-input" wire:model="skills.language.english">
                                        <label for="english" class="form-check-label">English</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="sinhala" class="form-check-input" wire:model="skills.language.sinhala">
                                        <label for="sinhala" class="form-check-label">Sinhala</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="tamil" class="form-check-input" wire:model="skills.language.tamil">
                                        <label for="tamil" class="form-check-label">Tamil</label>
                                    </div>
                                </div>
    
                                <!-- Service Skills -->
                                <div class="mb-3">
                                    <label class="form-label">Service and Product</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="broadband" class="form-check-input" wire:model="skills.service.broadband">
                                        <label for="broadband" class="form-check-label">Broadband</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="voice" class="form-check-input" wire:model="skills.service.voice">
                                        <label for="voice" class="form-check-label">Peo Tv</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="voice" class="form-check-input" wire:model="skills.service.voice">
                                        <label for="voice" class="form-check-label">Voice</label>
                                    </div>
                                </div>
    
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="password" class="form-control" wire:model="password" placeholder="Enter your password" aria-describedby="togglePassword">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword" onclick="togglePasswordVisibility()">
                                            <i class="fa fa-eye" id="passwordIcon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" id="confirmPassword" class="form-control" wire:model="confirmPassword" placeholder="Confirm your password" aria-describedby="toggleConfirmPassword">
                                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword" onclick="toggleConfirmPasswordVisibility()">
                                            <i class="fa fa-eye" id="confirmPasswordIcon"></i>
                                        </button>
                                    </div>
                                </div>
    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        
    
        <!-- Add Supervisor Modal -->
        <div class="modal" id="addSupervisortModal" tabindex="-1" aria-labelledby="addSupervisortModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: white; color: rgb(4, 167, 4);">
                        <h5 class="modal-title" id="addSupervisorModalLabel">Add Supervisor</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="#">
                            <div class="mb-3">
                                <label for="employeeId" class="form-label">Employee ID</label>
                                <input type="text" id="employeeId" class="form-control" wire:model="employeeId">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control" wire:model="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" wire:model="email">
                            </div>
                            <div class="mb-3">
                                <label for="callCenter" class="form-label">Group</label>
                                <select id="callCenter" class="form-select" wire:model="callCenter">
                                    <option value="">Select</option>
                                    <option value="1">Group 1</option>
                                    <option value="2">Group 2</option>
                                    <option value="3">Group 3</option>
                                    <option value="4">Group 4</option>
                                    <option value="5">Group 5</option>
                                    <option value="6">Group 6</option>
                                    <option value="7">Group 7</option>
                                    <option value="8">Group 8</option>
                                    <option value="9">Group 9</option>
                                    <option value="10">Group 10</option>
                                    <option value="11">Group 11</option>
                                    <option value="12">Group 12</option>
                                    <option value="19">Group 13</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" id="passwords" class="form-control" wire:model="password" placeholder="Enter your password" aria-describedby="togglePassword">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePasswords" onclick="togglePasswordVisibilitys()">
                                        <i class="fa fa-eye" id="passwordIcons"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" id="confirmPasswords" class="form-control" wire:model="confirmPassword" placeholder="Confirm your password" aria-describedby="toggleConfirmPassword">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPasswords" onclick="toggleConfirmPasswordVisibilitys()">
                                        <i class="fa fa-eye" id="confirmPasswordIcons"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    

    
        <!-- Add Reporter Modal -->
        <div class="modal" id="addReporterModal" tabindex="-1" aria-labelledby="addReporterModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: white; color: rgb(4, 167, 4);">
                        <h5 class="modal-title" id="addReporterModalLabel">Add Reporter</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="#">
                            <div class="mb-3">
                                <label for="employeeId" class="form-label">Employee ID</label>
                                <input type="text" id="employeeId" class="form-control" wire:model="employeeId">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control" wire:model="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" wire:model="email">
                            </div>
                    
                            <!-- Language Group -->
                            <div class="mb-3">
                                <label class="form-label">Group</label>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 1" class="form-check-input" wire:model="group1">
                                    <label for="Group 1" class="form-check-label">Group 1</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 2" class="form-check-input" wire:model="group2">
                                    <label for="Group 2" class="form-check-label">Group 2</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 3" class="form-check-input" wire:model="group3">
                                    <label for="Group 3" 1 class="form-check-label">Group 3</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 4" class="form-check-input" wire:model="group4">
                                    <label for="Group 4" class="form-check-label">Group 4</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 5" class="form-check-input" wire:model="group5">
                                    <label for="Group 5" class="form-check-label">Group 5</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 6" class="form-check-input" wire:model="group6">
                                    <label for="Group 6" class="form-check-label">Group 6</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 7" class="form-check-input" wire:model="group7">
                                    <label for="Group 7" class="form-check-label">Group 7</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 8" class="form-check-input" wire:model="group8">
                                    <label for="Group 8" class="form-check-label">Group 8</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 9" class="form-check-input" wire:model="group9">
                                    <label for="Group 9" class="form-check-label">Group 9</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 10" class="form-check-input" wire:model="group10">
                                    <label for="Group 10" class="form-check-label">Group 10</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 11" class="form-check-input" wire:model="group11">
                                    <label for="Group 11" class="form-check-label">Group 11</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 12" class="form-check-input" wire:model="group12">
                                    <label for="Group 12" class="form-check-label">Group 12</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="Group 13" class="form-check-input" wire:model="group13">
                                    <label for="Group 13" class="form-check-label">Group 13</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" id="passwordr" class="form-control" wire:model="password" placeholder="Enter your password" aria-describedby="togglePassword">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordr" onclick="togglePasswordVisibilityr()">
                                        <i class="fa fa-eye" id="passwordIconr"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" id="confirmPasswordr" class="form-control" wire:model="confirmPassword" placeholder="Confirm your password" aria-describedby="toggleConfirmPassword">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPasswordr" onclick="toggleConfirmPasswordVisibilityr()">
                                        <i class="fa fa-eye" id="confirmPasswordIconr"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

       <!-- Add Group Modal -->
<div class="modal" id="addGroupModal" tabindex="-1" aria-labelledby="addGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: white; color: rgb(4, 167, 4);">
                <h5 class="modal-title" id="addGroupModalLabel">Add Group</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="#">
                    <div class="mb-3">
                        <label for="groupCode" class="form-label">Group Code</label>
                        <input type="text" id="groupCode" class="form-control" wire:model="groupCode">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Group Name</label>
                        <input type="text" id="name" class="form-control" wire:model="name">
                    </div>
                    
                    <!-- Address Section with Textarea -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" class="form-control" rows="3" placeholder="Enter Address" wire:model="address"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="cnumber" class="form-label">Contact Number</label>
                        <input type="text" id="cnumber" class="form-control" wire:model="cnumber">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
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

        function togglePasswordVisibilitys() {
            const passwordField = document.getElementById('passwords');
            const passwordIcon = document.getElementById('passwordIcons');
        
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
        
        function toggleConfirmPasswordVisibilitys() {
            const confirmPasswordField = document.getElementById('confirmPasswords');
            const confirmPasswordIcon = document.getElementById('confirmPasswordIcons');
        
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

        function togglePasswordVisibilityr() {
            const passwordField = document.getElementById('passwordr');
            const passwordIcon = document.getElementById('passwordIconr');
        
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
        
        function toggleConfirmPasswordVisibilityr() {
            const confirmPasswordField = document.getElementById('confirmPasswordr');
            const confirmPasswordIcon = document.getElementById('confirmPasswordIconr');
        
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


