@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow bg-white border-white">
            <div class="card-header bg-white">
                <h5 class="text-success mb-0">Groups</h5>
            </div>
            <div class="card-body bg-white">
                <!-- Search Section -->
                <div class="search-section">   
                    <select class="form-select">
                        <option selected>Group</option>
                        <option value="1">Group 1</option>
                        <option value="2">Group 2</option>
                        <option value="3">Group 3</option>
                        <option value="3">Group 4</option>
                        <option value="3">Group 5</option>
                        <option value="3">Group 6</option>
                        <option value="3">Group 7</option>
                        <option value="3">Group 8</option>
                        <option value="3">Group 9</option>
                        <option value="3">Group 10</option>
                        <option value="3">Group 11</option>
                        <option value="3">Group 12</option>
                        <option value="3">Group 13</option>
                    </select>   
                </div>
        
                <!-- Table -->
                <table
                    id="table"
                    class="table table-bordered"
                    data-toggle="table"
                    data-search="true"
                    data-pagination="true"
                    data-page-size="2"
                    data-sortable="false"
                >
                    <thead class="table-success">
                        <tr>
                            <th data-field="name" data-sortable="true">Group</th>
                            <th data-field="emp_id" data-sortable="true">Group_Code</th>
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
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection