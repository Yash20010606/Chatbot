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
    <div class="card shadow bg-white border-white">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="text-success mb-0">Reporters</h5>
        </div>
        <div class="card-body bg-white">
            <!-- Search Form -->
            <div class="row mb-3">
                <div class="col-md-4 search-section">
                    <input type="text" id="empID" class="form-control" placeholder="Employee ID">
                </div>
                <div class="col-md-4 search-section">
                    <select class="form-select" id="group-filter">
                        <option selected value="">Select Group</option>
                        @foreach($groups as $group)
                        <option value="{{ $group->group_code }}">{{ $group->group_code }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button id="searchBtn" class="btn btn-success w-100">Search</button>
                    <button type="button" class="btn btn-secondary w-100 mt-2" onclick="resetForm()">Clear</button>
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
                        <th>Name</th>
                        <th>Employee ID</th>
                        <th>Group</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reporters as $reporter)
                        <tr>
                            <td>{{ $reporter->name}}</td>
                            <td>{{ $reporter->emp_id}}</td>
                            <td>{{ $reporter->group}}</td>
                            <td>{{ $reporter->email}}</td>
                            <td>
                                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#updateReporterModal" onclick="fetchReporterData({{ $reporter->emp_id }})">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <form action="{{ route('reporters.destroy', $reporter->emp_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this reporter?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Reporters Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Update Reporter Modal -->
<div class="modal" id="updateReporterModal" tabindex="-1" aria-labelledby="updateReporterModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: white; color: rgb(4, 167, 4);">
                <h5 class="modal-title" id="updateReporterModalLabel">Update Reporter</h5>
                <button type="button" class="btn-close text-white" id="close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateReporterForm" method="POST" action="{{ route('reporters.update', $reporter->emp_id ?? '') }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="updateEmpId" class="form-label">Employee ID</label>
                        <input
                        type="text"
                        id="updateEmpId"
                        name="emp_id"
                        class="form-control"
                        value="{{ old('emp_id', $reporter->emp_id ?? '') }}"
                        required>
                    </div>
                    <div class="mb-3">
                        <label for="updateName" class="form-label">Name</label>
                        <input
                        type="text"
                        id="updateName"
                        class="form-control"
                        name="name" 
                        value="{{ old('name', $reporter->name ?? '') }}"
                        required>
                    </div>
                    <div class="mb-3">
                        <label for="updateEmail" class="form-label">Email</label>
                        <input
                        type="email"
                        id="updateEmail"
                        class="form-control"
                        name="email"
                        value="{{ old('email', $reporter->email ?? '') }}"
                        required />
                    </div>
                    <div class="mb-3">
                        <label for="updateGroup" class="form-label">Groups</label>
                        <div id="groupsContainer">
                            @foreach($groups as $group)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="group_code[]" value="{{ $group->group_code }}" id="group_{{ $group->group_code }}"
                                @if(in_array($group->group_code, old('group_code', []))) checked @endif />
                                <label class="form-check-label" for="group_{{ $group->group_code }}">
                                    {{ $group->group_code }}
                                </label>
                            </div>
                            @endforeach
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
// Function to fetch reporter data for editing
function fetchReporterData(empId) {
    fetch(`/admin/reporters/${empId}/edit`) // Ensure the route is correct for fetching the details
        .then(response => response.json())
        .then(data => {
            // Check if data was successfully returned
            if (data && data.reporter) {
                // Populate modal fields with the specific reporter data
                document.getElementById('updateEmpId').value = data.reporter.emp_id;
                document.getElementById('updateName').value = data.reporter.name;
                document.getElementById('updateEmail').value = data.reporter.email;
                document.getElementById('updateGroup').value = data.reporter.group_code;
                
                
                // Dynamically populate the groups
                const groupsContainer = document.getElementById('groupsContainer');
                groupsContainer.innerHTML = ''; // Clear existing group checkboxes
                
                data.group.forEach(groupCode => {
                    const checkbox = document.createElement('div');
                    checkbox.classList.add('form-check');
                    checkbox.innerHTML = `
                        <input class="form-check-input" type="checkbox" name="group_code[]" value="${groupCode}" id="group_${groupCode}" checked>
                        <label class="form-check-label" for="group_${groupCode}">${groupCode}</label>
                    `;
                    groupsContainer.appendChild(checkbox);
                });

                // Set the form's action attribute dynamically using the current emp_id
                document.getElementById('updateReporterForm').action = `/admin/reporters/${data.reporter.emp_id}`;
            } else {
                alert('Failed to load reporter data.');
            }
        })
        .catch(error => {
            console.error('Error fetching reporter data:', error);
            alert('Failed to load reporter data.');
        });
}

    // Function to clear the filters (optional - if you have a reset button)
    function clearFilters() {
        document.querySelector('input[name="emp_id"]').value = '';
        document.querySelector('select[name="group_code"]').value = '';
    }

    // Function to confirm delete action
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this reporter?')) {
            document.getElementById('deleteForm_' + id).submit();
        }
    }

    // Populate modal with reporter data and set initial values
function editReporter(empId) {
    fetch(`/reporters/edit/${empId}`)
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            const { reporter, group } = data;

            document.getElementById('updateEmpId').value = reporter.emp_id;

            const nameField = document.getElementById('updateName');
            const emailField = document.getElementById('updateEmail');
            const groupField = document.getElementById('group');

            nameField.value = reporter.name;
            nameField.dataset.initialValue = reporter.name;

            emailField.value = reporter.email;
            emailField.dataset.initialValue = reporter.email;

            groupField.value = group || '';
            groupField.dataset.initialValue = group || '';

            saveButton.disabled = true;
            updateForm.action = `/reporters/update/${reporter.emp_id}`;
            setInitialData(); // Set initial data after populating the form
        })
        .catch(error => {
            console.error('Error fetching reporter details:', error);
            alert('Error fetching reporter details. Please try again.');
        });
}


document.getElementById('searchBtn').addEventListener('click', function () {
    const empID = document.getElementById("empID").value;
    const group = document.getElementById("group-filter").value;

    // Fetch filtered data via AJAX
    fetch(`{{ route('reporters.filter') }}?empID=${empID}&group=${group}`)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#table tbody');
            if (data.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="4" class="text-center">No records found</td>
                    </tr>`;
            } else {
                tableBody.innerHTML = data.map(reporter => `
                    <tr>
                        <td>${reporter.name}</td>
                        <td>${reporter.emp_id}</td>
                        <td>${reporter.group}</td>
                        <td>${reporter.email}</td>
                        <td>
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#updateReporterModal" onclick="fetchReporterData('${reporter.emp_id}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('reporters.destroy', '') }}/${reporter.emp_id}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this reporter?');">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                `).join('');
            }
        });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
