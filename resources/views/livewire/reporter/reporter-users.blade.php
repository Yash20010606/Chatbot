@extends('layouts.reporter-app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow bg-white border-white">
            <div class="card-header bg-white">
                <h5 class="text-success mb-0">Users</h5>
            </div>
            <div class="card-body bg-white">
                <div class="row mb-3 justify-content-start align-items-center">
                    <div class="col-md-4 d-flex align-items-center">
                        <label for="group-select" class="fw-bold me-2" style="min-width: 120px;">Select Group:</label>
                        <select id="group-select" class="form-select" style="max-width: 200px;">
                            <option selected>Group</option>
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
                    <div class="col-md-4">
                        <button class="btn btn-success w-100">Search</button>
                    </div>
                </div>
      
                <table
                    id="table1"
                    class="table table-bordered"
                    data-toggle="table"
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Rasika Sampath</td>
                            <td>23234</td>
                            <td>Colombo</td>
                            <td>rasika@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Roshel Perise</td>
                            <td>23453</td>
                            <td>Kurunegala</td>
                            <td>rosheperis@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Anne Silva</td>
                            <td>34567</td>
                            <td>Colombo</td>
                            <td>annes12@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Jerry Wilson</td>
                            <td>34568</td>
                            <td>Gampha</td>
                            <td>jerrywilson@gmail.com</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mb-4"></div>

                <table
                    id="table2"
                    class="table table-bordered"
                    data-toggle="table"
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Saman Kumara</td>
                            <td>23244</td>
                            <td>Colombo</td>
                            <td>Saman@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Sherara Perise</td>
                            <td>23478</td>
                            <td>Mathara</td>
                            <td>Sherara@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Raj Kumar</td>
                            <td>34569</td>
                            <td>Vauniya</td>
                            <td>Raj12@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Marie Wilson</td>
                            <td>34572</td>
                            <td>Gampha</td>
                            <td>Marie@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
