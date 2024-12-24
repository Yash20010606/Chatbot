@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow bg-white border-white">
            <div class="card-header bg-white">
                <h5 class="text-success mb-0">Supervisors</h5>
            </div>
            <div class="card-body bg-white">
                <div class="row mb-3">
                    <div class="col-md-4 search-section">
                        <input type="text" id="employee-id" class="form-control" placeholder="Employee ID">
                    </div>
                    <div class="col-md-4 search-section">
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
                    <div class="col-md-4">
                        <button class="btn btn-success w-100">Search</button>
                    </div>
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
                            <th data-field="name" data-sortable="true">Name</th>
                            <th data-field="emp_id" data-sortable="true">Emp_id</th>
                            <th data-field="group" data-sortable="true">Group</th>
                            <th data-field="email" data-sortable="true">Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-group="Colombo" class="group">
                            <td>Rasika Sampath</td>
                            <td>23234</td>
                            <td>Colombo</td>
                            <td>rasika@gmail.com</td>
                            <td>
                                <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Kurunegala" class="group">
                            <td>Roshel Perise</td>
                            <td>23453</td>
                            <td>Kurunegala</td>
                            <td>rosheperis@gmail.com</td>
                            <td>
                                <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Colombo" class="group">
                            <td>Anne Silva</td>
                            <td>34567</td>
                            <td>Colombo</td>
                            <td>annes12@gmail.com</td>
                            <td>
                                <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Gampha" class="group">
                            <td>Jerry Wilson</td>
                            <td>34568</td>
                            <td>Gampha</td>
                            <td>jerrywilson@gmail.com</td>
                            <td>
                                <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
                                &nbsp;
                                <a href="#" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <tr data-group="Colombo" class="group">
                            <td>Madawa Silva</td>
                            <td>23589</td>
                            <td>Colombo</td>
                            <td>madawa@gmail.com</td>
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
@endsection