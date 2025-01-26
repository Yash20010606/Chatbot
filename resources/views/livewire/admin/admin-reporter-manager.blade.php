@extends('layouts.app')

@section('sidebar')
    @livewire('admin.admin-sidebar')
@endsection

@section('dashboard')
    @livewire('admin.admin-dashboard')
@endsection

@section('chat-dashboard')
    <!-- Exclude dashboard for this page -->
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card shadow bg-white border-white">
            <div class="card-header bg-white">
                <h5 class="text-success mb-0">Reporters</h5>
            </div>
            <div class="card-body bg-white">
            <div class="row mb-3">
                    <div class="col-md-4 search-section">
                        <input type="text" id="employee-id" class="form-control" placeholder="Employee ID">
                    </div>
                    <div class="col-md-4 search-section">
                        <select class="form-select">
                            <option selected>Group</option>
                            <option value="1">G001</option>
                            <option value="2">G002</option>
                            <option value="3">G003</option>
                            <option value="3">G004</option>
                            <option value="3">G005</option>
                            <option value="3">G006</option>
                            <option value="3">G007</option>
                            <option value="3">G008</option>
                            <option value="3">G009</option>
                            <option value="3">G0010</option>
                            <option value="3">G0011</option>
                            <option value="3">G0012</option>
                            <option value="3">G0013</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success w-100">Search</button>
                    </div>
                </div>
        
                <!-- Table -->
                <table
                    id="table"
                    class="table table-bordered"
                    data-toggle="table"
                    data-search="false"
                    data-pagination="true"
                    data-page-size="2"
                    data-sortable="false"
                >
                    <thead class="table-success">
                        <tr>
                            <th data-field="name" data-sortable="true">Name</th>
                            <th data-field="emp_id" data-sortable="true">Employee ID</th>
                            <th data-field="group" data-sortable="true">Group</th>
                            <th data-field="email" data-sortable="true">Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-group="Colombo" class="group">
                            <td>Rasika Sampath</td>
                            <td>23234</td>
                            <td>G001</td>
                            <td>rasika@gmail.com</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateReporterModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Kurunegala" class="group">
                            <td>Roshel Perise</td>
                            <td>23453</td>
                            <td>G002</td>
                            <td>rosheperis@gmail.com</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateReporterModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Colombo" class="group">
                            <td>Anne Silva</td>
                            <td>34567</td>
                            <td>G003</td>
                            <td>annes12@gmail.com</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateReporterModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Gampha" class="group">
                            <td>Jerry Wilson</td>
                            <td>34568</td>
                            <td>G004</td>
                            <td>jerrywilson@gmail.com</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateReporterModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Colombo" class="group">
                            <td>Madawa Silva</td>
                            <td>23589</td>
                            <td>G005</td>
                            <td>madawa@gmail.com</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateReporterModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Update Reporter Modal -->
    <div class="modal" id="updateReporterModal" tabindex="-1" aria-labelledby="updateReporterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: white; color: rgb(4, 167, 4);">
                    <h5 class="modal-title" id="updateReporterModalLabel">Update Reporter</h5>
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
                            <label for="passwordReporterUpdate" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" id="passwordReporterUpdate" class="form-control" wire:model="passwordReporterUpdate" placeholder="Enter your password" aria-describedby="togglePasswordReporterUpdate">
                                <button class="btn btn-outline-secondary" type="button" id="togglePasswordReporterUpdate" onclick="togglePasswordVisibility()">
                                    <i class="fa fa-eye" id="passwordIconReporterUpdate"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" id="confirmPasswordReporterUpdate" class="form-control" wire:model="confirmPasswordReporterUpdate" placeholder="Confirm your password" aria-describedby="toggleConfirmPasswordReporterUpdate">
                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPasswordReporterUpdate" onclick="toggleConfirmPasswordVisibility()">
                                    <i class="fa fa-eye" id="confirmPasswordIconReporterUpdate"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('passwordReporterUpdate');
            const passwordIcon = document.getElementById('passwordIconReporterUpdate');
    
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
            const confirmPasswordField = document.getElementById('confirmPasswordReporterUpdate');
            const confirmPasswordIcon = document.getElementById('confirmPasswordIconReporterUpdate');
    
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

@endsection