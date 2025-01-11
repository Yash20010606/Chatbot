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
    <h5 class="text-success mb-0">Groups</h5>
    <a href="#" class="nav-link text-green py-2"><i class="bi bi-geo-alt"></i> View Groups</a>
    </div>

            <div class="card-body bg-white">
                <div class="row mb-3">
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
                            <th data-field="name" data-sortable="true">Group Name</th>
                            <th data-field="emp_id" data-sortable="true">Group Code</th>
                            <th data-field="group" data-sortable="true">Address</th>
                            <th data-field="email" data-sortable="true">Contact Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                        <tr>
                            <td>{{ $group->group_name }}</td>
                            <td>{{ $group->group_code }}</td>
                            <td>{{ $group->address }}</td>
                            <td>{{ $group->contact_number }}</td>
                            <td>
                                <!-- Edit button -->
                                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#updateGroupModal" onclick="openUpdateModal({{ json_encode($group) }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                                <!-- Delete button -->
                                <form action="{{ route('group.destroy', $group->id) }}" method="POST" style="display:inline;" id="deleteForm{{ $group->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" title="Delete" class="btn btn-link text-danger" onclick="confirmDelete({{ $group->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button> 
                                </form>       
                            </td>
                        </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Update group Modal -->
    <div class="modal" id="updateGroupModal" tabindex="-1" aria-labelledby="updateGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: white; color: rgb(4, 167, 4);">
                    <h5 class="modal-title" id="addGroupModalLabel">Update Group</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateGroupForm" action="{{ route('group.update', ':id') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="updateGroupId" name="id">
                        <div class="mb-3">
                            <label for="updateGroupCode" class="form-label">Group Code</label>
                            <input type="text" id="updateGroupCode" class="form-control" name="group_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateName" class="form-label">Group Name</label>
                            <input type="text" id="updateName" class="form-control" name="group_name" required>
                        </div>
                        
                        <!-- Address Section with Textarea -->
                        <div class="mb-3">
                            <label for="updateAddress" class="form-label">Address</label>
                            <textarea id="updateAddress" class="form-control" rows="3" placeholder="Enter Address" name="address" required></textarea>
                        </div>
    
                        <div class="mb-3">
                            <label for="updateContactNumber" class="form-label">Contact Number</label>
                            <input type="text" id="updateContactNumber" class="form-control" name="contact_number" required>
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
        // JavaScript to populate the modal with the selected group data
        function openUpdateModal(group) {
            // Set the form action URL with the group ID
            const formAction = '{{ route('group.update', ':id') }}'.replace(':id', group.id);
            document.getElementById('updateGroupForm').action = formAction;

            // Set the form input values
            document.getElementById('updateGroupId').value = group.id;
            document.getElementById('updateGroupCode').value = group.group_code;
            document.getElementById('updateName').value = group.group_name;
            document.getElementById('updateAddress').value = group.address;
            document.getElementById('updateContactNumber').value = group.contact_number;

            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('updateGroupModal'));
            modal.show();
        }
    </script>

    <script>
        // JavaScript to show a confirmation dialog before deleting a group
        function confirmDelete(groupId) {
            const deleteForm = document.getElementById('deleteForm' + groupId);

            // Display a confirmation dialog
            if (confirm("Are you sure you want to delete this group?")) {
                deleteForm.submit(); // Submit the form if confirmed
            }
        }
    </script>
@endsection