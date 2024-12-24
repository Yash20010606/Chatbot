@extends('layouts.app')

@section('content')
<body>
    <div class="container mt-3">
        <div class="card shadow bg-white">
            <div class="card-header bg-white">
                <h5 class="text-success mb-0">Skills</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3 align-items-start">
                        <div class="col-md-6 d-flex">
                            <label for="skillName" class="fw-bold me-2" style="min-width: 120px;">Skill Name:</label>
                            <input type="text" id="skillName" class="form-control" placeholder="Enter skill name">
                        </div>
                      <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <label for="category" class="form-label me-2">Category:</label>
                        <select id="category" class="form-select">
                            <option>Select Category</option>
                            <option value="language">Languages</option>
                            <option value="tech">Service and Product</option>
                        </select>
                    </div>

                    </div>
                    <div class="row mb-3 align-items-start">
                        <div class="col-md-6 d-flex">
                            <label for="description" class="fw-bold me-2" style="min-width: 120px;">Description:</label>
                            <textarea id="description" rows="3" class="form-control" placeholder="Enter description"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-secondary">Clear</button>
                    </div>
                </form>

                <div class="mt-4">
                <table
                    id="table"
                    class="table table-bordered"
                    data-toggle="table"
                    data-pagination="true"
                    data-page-size="2"
                    data-sortable="false"
                >
    <thead class="table-success">
        <tr>
            <th>Skills</th>
            <th>Category</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>English</td>
            <td>Languages</td>
            <td>Proficiency in communicating with...</td>
            <td>
                <a href="#" data-bs-toggle="modal" data-bs-target="#updateSkillModal" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
                &nbsp;
                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
            </td>
        </tr>
        <tr>
            <td>Service and Product</td>
            <td>PEO TV</td>
            <td>Expertise in understanding products...</td>
            <td>
                <a href="#" data-bs-toggle="modal" data-bs-target="#updateSkillModal" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
                &nbsp;
                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
            </td>
        </tr>
        <tr>
            <td>Service and Product</td>
            <td>PEO TV</td>
            <td>Expertise in understanding products...</td>
            <td>
                <a href="#" data-bs-toggle="modal" data-bs-target="#updateSkillModal" title="Edit">
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
    </div>
</body>

 <!-- Update Skill Modal -->
 <div class="modal" id="updateSkillModal" tabindex="-1" aria-labelledby="updateSkillModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: white; color: rgb(4, 167, 4);">
                <h5 class="modal-title" id="updateSkillModalLabel">Update Skills</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="#">
                    <div class="mb-3">
                        <label for="name" class="form-label">Skill Name</label>
                        <input type="text" id="name" class="form-control" wire:model="name">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Group</label>
                        <select id="category" class="form-select" wire:model="category">
                            <option value="">Select</option>
                            <option value="1">English</option>
                            <option value="2">Service and Product</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" class="form-control" rows="3" placeholder="Enter Address" wire:model="description"></textarea>
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
