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
                <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
                &nbsp;
                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
            </td>
        </tr>
        <tr>
            <td>Service and Product</td>
            <td>PEO TV</td>
            <td>Expertise in understanding products...</td>
            <td>
                <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
                &nbsp;
                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
            </td>
        </tr>
        <tr>
            <td>Service and Product</td>
            <td>PEO TV</td>
            <td>Expertise in understanding products...</td>
            <td>
                <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
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
</html>
@endsection
