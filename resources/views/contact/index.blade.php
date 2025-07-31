<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<style>
    .form-container {
        max-width: 1000px;
        margin: auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-header {
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .form-header h2 {
        font-size: 24px;
        font-weight: 600;
        margin: 0;
    }
    .form-label {
        font-weight: 500;
    }
    .form-control {
        border-radius: 5px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    }
    .btn-primary, .btn-success, .btn-info, .btn-danger {
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    .btn-success:hover {
        background-color: #28a745;
        border-color: #218838;
    }
    .btn-info:hover {
        background-color: #17a2b8;
        border-color: #117a8b;
    }
    .btn-danger:hover {
        background-color: #dc3545;
        border-color: #c82333;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered th, .table-bordered td {
        border: 1px solid #dee2e6;
    }
    .table th, .table td {
        padding: 12px;
        vertical-align: middle;
    }
    .alert {
        margin-top: 20px;
    }
</style>
@extends('layout.header2')

@section('content')
<div class="form-container">
        <div class="form-header">
            <h2>Contact List</h2>
                <a class="btn btn-success" href="{{ route('importpage') }}">Import New List</a>
                <a class="btn btn-success" href="{{ route('contact.create') }}">Create New Contact</a>
        </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Email</th>
            <th>Mob Number</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($contact as $cont)
        <tr>
            <td>{{ $cont->email }}</td>
            <td>{{ $cont->mo_number }}</td>
            <td>
                <form action="{{ route('contact.destroy', $cont->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('contact.show', $cont->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('contact.edit', $cont->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>