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
<body>
<div class="container mt-4">
@if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
    <div class="card shadow bg-white border-white">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="text-success mb-0">Supervisors</h5>
        </div>
        <div class="card-body bg-white">
    <!-- Search Form -->
    <form method="GET" action="{{ route('admin.supervisor.search') }}">
    <div class="row mb-3">
        <!-- Search by emp_id -->
        <div class="col-md-4">
            <input type="text" name="emp_id" class="form-control" placeholder="Employee ID"
                   value="{{ request('emp_id') }}">
        </div>
        
        <!-- Filter by Group Code -->
        <div class="col-md-4">
            <select name="group_code" class="form-select">
                <option value="">Select Group</option>
                @foreach ($groups as $group)
                    <option value="{{ $group->group_code }}" 
                        {{ request('group_code') == $group->group_code ? 'selected' : '' }}>
                        {{ $group->group_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="col-md-4">
            <button type="submit" class="btn btn-success w-100">Search</button>
        </div>
    </div>
</form>
           
            <!-- Table -->
            <table id="table" class="table table-bordered" data-toggle="table" data-search="false" data-pagination="true" data-page-size="2" data-sortable="false">
    <thead class="table-success">
        <tr>
            <th>Name</th>
            <th>Employee ID</th>
            <th>Group Code</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($supervisors as $supervisor)
            <tr>
                <td>{{ $supervisor->user->name ?? 'N/A' }}</td>
                <td>{{ $supervisor->user->emp_id ?? 'N/A' }}</td>
                <td>{{ $supervisor->group->group_code ?? 'N/A' }}</td>
                <td>{{ $supervisor->user->email ?? 'N/A' }}</td>
                <td>
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#updateSupervisorModal" onclick="fetchSupervisorData({{ $supervisor->id }})">
                <i class="fas fa-edit"></i>
            </button>


        <form id="deleteForm_{{ $supervisor->id }}" action="{{ route('admin.supervisor.delete', $supervisor->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-link text-danger" onclick="confirmDelete({{ $supervisor->id }})">
                <i class="fas fa-trash"></i>
            </button>
        </form>
              </td>
               </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Supervisors Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">
    {{ $supervisors->links() }}
</div>
                </div>
            </div>

   
   
   <!-- Supervisor Update Modal -->
   <div class="modal fade" id="updateSupervisorModal" tabindex="-1" aria-labelledby="updateSupervisorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="updateSupervisorForm" method="POST" action="{{ route('admin.supervisor.update', $supervisor->id) }}">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="updateSupervisorLabel">Update Supervisor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Display Employee ID (read-only) -->
                    <div class="mb-3">
                        <label for="updateEmpId" class="form-label">Employee ID</label>
                        <input type="text" id="updateEmpId" name="emp_id" class="form-control"readonly>
                    </div>

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="updateName" class="form-label">Name</label>
                        <input type="text" id="updateName" name="name" class="form-control" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="updateEmail" class="form-label">Email</label>
                        <input type="email" id="updateEmail" name="email" class="form-control" required>
                    </div>
                    
                    <!-- Group -->
                    <div class="mb-3">
                        <label for="updateGroupCode" class="form-label">Group</label>
                        <select id="updateGroupCode" class="form-select" name="group_code" required>
                            <option value="">Select</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->group_code }}">{{ $group->group_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" name="password">
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


    
<script>
    // Function to fetch supervisor data for editing
    function fetchSupervisorData(supervisorId) {
        fetch(`/admin/supervisors/${supervisorId}/edit`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Populate modal fields with supervisor data
                document.getElementById('updateEmpId').value = data.emp_id;
                document.getElementById('updateName').value = data.name;
                document.getElementById('updateEmail').value = data.email;
                document.getElementById('updateGroupCode').value = data.group_code;

                // Set the form's action attribute dynamically
                document.getElementById('updateSupervisorForm').action = `/admin/supervisors/${supervisorId}`;
            })
            .catch(error => {
                console.error('Error fetching supervisor data:', error);
                alert('Failed to load supervisor data.');
            });
    }

    // Function to reset the form fields and redirect to the first pagination row
    window.onload = function () {
        const urlParams = new URLSearchParams(window.location.search);

        // Reset fields if filters are applied
        if (urlParams.has('emp_id') || urlParams.has('group_code')) {
            document.querySelector('input[name="emp_id"]').value = urlParams.get('emp_id') || '';
            document.querySelector('select[name="group_code"]').value = urlParams.get('group_code') || '';
        } else {
            // Reset the input fields if no filters are applied
            document.querySelector('input[name="emp_id"]').value = '';
            document.querySelector('select[name="group_code"]').value = '';
        }

        // Find the first pagination link and click it to reload the first page
        const paginationLinks = document.querySelectorAll('.pagination a');
        if (paginationLinks.length > 0) {
            // Trigger click on the first pagination link (to show the first page)
            paginationLinks[0].click();
        }
    };

    // Function to clear the filters (optional - if you have a reset button)
    function clearFilters() {
        document.querySelector('input[name="emp_id"]').value = '';
        document.querySelector('select[name="group_code"]').value = '';
    }

    // Function to confirm delete action
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this supervisor?')) {
            document.getElementById('deleteForm_' + id).submit();
        }
    }
</script>


   <script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById('passwordsSupervisorUpdate');
        const passwordIcon = document.getElementById('passwordIconsSupervisorUpdate');

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
        const confirmPasswordField = document.getElementById('confirmPasswordsSupervisorUpdate');
        const confirmPasswordIcon = document.getElementById('confirmPasswordIconsSupervisorUpdate');

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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>
@endsection