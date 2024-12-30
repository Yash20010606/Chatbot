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
                        <tr data-group="Group 1" class="group">
                            <td>Group 1</td>
                            <td>G001</td>
                            <td>123 Main St, Colombo</td>
                            <td>+94123456789</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateGroupModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Group 2" class="group">
                            <td>Group 2</td>
                            <td>G002</td>
                            <td>456 High St, Kurunegala</td>
                            <td>+94198765432</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateGroupModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Group 3" class="group">
                            <td>Group 3</td>
                            <td>G003</td>
                            <td>789 Park Ave, Colombo</td>
                            <td>+94123456780</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateGroupModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Group 4" class="group">
                            <td>Group 4</td>
                            <td>G004</td>
                            <td>101 Lake Rd, Gampha</td>
                            <td>+94198765431</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateGroupModal" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Group 5" class="group">
                            <td>Group 5</td>
                            <td>G005</td>
                            <td>202 Hill St, Colombo</td>
                            <td>+94123456781</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateGroupModal" title="Edit">
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

    <!-- Update group Modal -->
    <div class="modal" id="updateGroupModal" tabindex="-1" aria-labelledby="updateGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: white; color: rgb(4, 167, 4);">
                    <h5 class="modal-title" id="addGroupModalLabel">Update Group</h5>
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
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection