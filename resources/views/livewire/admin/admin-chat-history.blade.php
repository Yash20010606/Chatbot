@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat History</title>
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Chat History Section Below -->
    <div class="container mt-3">
        <div class="card shadow bg-white">
            <div class="card-header bg-white">
                <h5 class="text-success mb-0">Chat History</h5>
            </div>
            <div class="card-body">
                <!-- Search and Filters -->
                <div class="row mb-3">
                    <div class="col-md-4">
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
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success w-100">Search</button>
                    </div>
                </div>

                <!-- Chat Table -->
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
                            <th>Phone Number</th>
                            <th>Language | Skill</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0753412678</td>
                            <td>
                                <span class="badge bg-success">English</span>
                                <span class="badge bg-success">Peo TV</span>
                            </td>
                            <td>2024/12/25</td>
                            <td>9.56</td>
                            <td>
                                <!-- Dropdown Action Button -->
                                <div class="dropdown">
                                    <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-chat-dots"></i> Chat Options
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-eye"></i> View Chat
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-download"></i> Download
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-info-circle"></i> Details
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>0712264126</td>
                            <td>
                                <span class="badge bg-success">English</span>
                                <span class="badge bg-success">Peo TV</span>
                            </td>
                            <td>2024/12/25</td>
                            <td>8.56</td>
                            <td>
                                <!-- Dropdown Action Button -->
                                <div class="dropdown">
                                    <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-chat-dots"></i> Chat Options
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-eye"></i> View Chat
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-download"></i> Download
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-info-circle"></i> Details
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>0712345678</td>
                            <td>
                                <span class="badge bg-success">English</span>
                                <span class="badge bg-success">Peo TV</span>
                            </td>
                            <td>2024/12/25</td>
                            <td>9.56</td>
                            <td>
                                <!-- Dropdown Action Button -->
                                <div class="dropdown">
                                    <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-chat-dots"></i> Chat Options
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-eye"></i> View Chat
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-download"></i> Download
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-info-circle"></i> Details
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>0753214578</td>
                            <td>
                                <span class="badge bg-success">English</span>
                                <span class="badge bg-success">Peo TV</span>
                            </td>
                            <td>2024/12/25</td>
                            <td>9.56</td>
                            <td>
                                <!-- Dropdown Action Button -->
                                <div class="dropdown">
                                    <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-chat-dots"></i> Chat Options
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-eye"></i> View Chat
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-download"></i> Download
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-info-circle"></i> Details
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
@endsection
