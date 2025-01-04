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
    <div class="container mt-3">

        @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        <div class="card shadow bg-white">
            <div class="card-header bg-white">
                <h4 class="text-success mb-0">Skills</h4>
            </div>
            <div class="card-body">
                <!-- Skill Form -->
                <form action="{{ route('skills.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3 align-items-start">
                        <!-- Skill Name -->
                        <div class="col-md-6 d-flex">
                            <label for="skillName" class="fw-bold me-2" style="min-width: 120px;">Skill Name:</label>
                            <input type="text" id="skillName" name="name" class="form-control" placeholder="Enter skill name" required>
                        </div>
                
                        <!-- Category -->
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <label for="category" class="form-label me-2">Category:</label>
                            <select id="category" name="category" class="form-select" required>
                                <option value="">Select Category</option>
                                <option value="language">Languages</option>
                                <option value="tech">Service and Product</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="row mb-3 align-items-start">
                        <!-- Description -->
                        <div class="col-md-6 d-flex">
                            <label for="description" class="fw-bold me-2" style="min-width: 120px;">Description:</label>
                            <textarea id="description" name="description" rows="3" class="form-control" placeholder="Enter description" required></textarea>
                        </div>
                    </div>
                
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" onclick="resetForm()">Clear</button>
                    </div>
                </form>
                

                <!-- Skills Table -->
                <div class="mt-4">
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
                                <th>Skills</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skills as $skill)
                            <tr>
                                <td>{{ $skill->name }}</td>
                                <td>{{ $skill->category }}</td>
                                <td>{{ Str::limit($skill->description, 50) }}</td>
                                <td>
                                    <!-- Edit button -->
                                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#updateSkillModal" onclick="openUpdateModal({{ json_encode($skill) }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                        
                                    <!-- Delete button -->
                                    <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display:inline;" id="deleteForm{{ $skill->id }}">
                                    @csrf
                                            @method('DELETE')
                                    <button type="button" title="Delete" class="btn btn-link text-danger" onclick="confirmDelete({{ $skill->id }})">
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
    </div>

   <!-- Update Skill Modal -->
<div class="modal" id="updateSkillModal" tabindex="-1" aria-labelledby="updateSkillModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: white; color: rgb(4, 167, 4);">
                <h5 class="modal-title" id="updateSkillModalLabel">Update Skill</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateSkillForm" action="{{ route('skills.update', ':id') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="updateSkillId" name="id">
                    <div class="mb-3">
                        <label for="updateName" class="form-label">Skill Name</label>
                        <input type="text" id="updateName" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateCategory" class="form-label">Category</label>
                        <select id="updateCategory" class="form-select" name="category" required>
                            <option value="language">Languages</option>
                            <option value="tech">Service and Product</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="updateDescription" class="form-label">Description</label>
                        <textarea id="updateDescription" class="form-control" rows="3" name="description" required></textarea>
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
// JavaScript to populate the modal with the selected skill data
function openUpdateModal(skill) {
    // Set the form action URL with the skill ID
    const formAction = '{{ route('skills.update', ':id') }}'.replace(':id', skill.id);
    document.getElementById('updateSkillForm').action = formAction;

    // Set the form input values
    document.getElementById('updateSkillId').value = skill.id;
    document.getElementById('updateName').value = skill.name;
    document.getElementById('updateCategory').value = skill.category;
    document.getElementById('updateDescription').value = skill.description;

    // Show the modal
    const modal = new bootstrap.Modal(document.getElementById('updateSkillModal'));
    modal.show();
}
// JavaScript to reset the skill form
function resetForm() {
    document.getElementById("skillName").value = "";
    document.getElementById("category").value = "";
    document.getElementById("description").value = "";
}

</script>

<script>
    // JavaScript to show a confirmation dialog before deleting a skill
    function confirmDelete(skillId) {
        const deleteForm = document.getElementById('deleteForm' + skillId);

        // Display a confirmation dialog
        if (confirm("Are you sure you want to delete this skill?")) {
            deleteForm.submit(); // Submit the form if confirmed
        }
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>
@endsection