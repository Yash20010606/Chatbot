@extends('layouts.supervisor-app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow bg-white border-white">
            <div class="card-header bg-white">
                <h5 class="text-success mb-0">Agents</h5>
            </div>
            <div class="card-body bg-white">
                <div class="row mb-3">
                    <div class="col-md-4 search-section">
                        <input type="text" id="employee-id" class="form-control" placeholder="Employee ID">
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
                            <th data-field="contact_no" data-sortable="true">Contact Number</th>
                            <th data-field="email" data-sortable="true">Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-group="Colombo" class="group">
                            <td>Rasika Sampath</td>
                            <td>23234</td>
                            <td>0776543217</td>
                            <td>rasika@gmail.com</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateAgentModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Kurunegala" class="group">
                            <td>Roshel Perise</td>
                            <td>23453</td>
                            <td>0701094099</td>
                            <td>rosheperis@gmail.com</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateAgentModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Colombo" class="group">
                            <td>Anne Silva</td>
                            <td>34567</td>
                            <td>0778965432</td>
                            <td>annes12@gmail.com</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateAgentModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Gampha" class="group">
                            <td>Jerry Wilson</td>
                            <td>34568</td>
                            <td>0786543213</td>
                            <td>jerrywilson@gmail.com</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateAgentModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Colombo" class="group">
                            <td>Madawa Silva</td>
                            <td>23589</td>
                            <td>0712345678</td>
                            <td>madawa@gmail.com</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateAgentModal" title="Edit">
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

<!-- Update Agent Modal --> 
<div class="modal" id="updateAgentModal" tabindex="-1" aria-labelledby="updateAgentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: white; color: rgb(4, 167, 4);">
                <h5 class="modal-title" id="updateAgentModalLabel">Update Agent</h5>
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
                    <div class="mb-3">
                        <label class="form-label">Service and Product</label>
                        <div class="form-check">
                            <input type="checkbox" id="broadband" class="form-check-input" wire:model="skills.service.broadband">
                            <label for="broadband" class="form-check-label">Broadband</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="peoTv" class="form-check-input" wire:model="skills.service.peoTv">
                            <label for="peoTv" class="form-check-label">Peo TV</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="voice" class="form-check-input" wire:model="skills.service.voice">
                            <label for="voice" class="form-check-label">Voice</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="passwordAgentUpdate" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="passwordAgentUpdate" class="form-control" wire:model="passwordAgentUpdate" placeholder="Enter your password" aria-describedby="togglePasswordAgentUpdate">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword" onclick="togglePasswordVisibility()">
                                <i class="fa fa-eye" id="passwordIconAgentUpdate"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPasswordAgentUpdate" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" id="confirmPasswordAgentUpdate" class="form-control" wire:model="confirmPasswordAgentUpdate" placeholder="Confirm your password" aria-describedby="toggleConfirmPasswordAgentUpdate">
                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword" onclick="toggleConfirmPasswordVisibility()">
                                <i class="fa fa-eye" id="confirmPasswordIconAgentUpdate"></i>
                            </button>
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById('passwordAgentUpdate');
        const passwordIcon = document.getElementById('passwordIconAgentUpdate');
    
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
        const confirmPasswordField = document.getElementById('confirmPasswordAgentUpdate');
        const confirmPasswordIcon = document.getElementById('confirmPasswordIconAgentUpdate');
    
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