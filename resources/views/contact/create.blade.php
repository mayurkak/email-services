<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<style>
    .form-container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 85px;
    }
    .form-header {
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form-header h2 {
        font-size: 24px;
        font-weight: 600;
        margin: 0;
        flex-grow: 1;
        text-align: center;
    }
    .form-label {
        font-weight: 500;
    }
    .form-control {
        border-radius: 5px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    .text-center {
        margin-top: 20px;
    }
</style>
@extends('layout.header2')

@section('content')
<div class="form-container">
    <div class="form-header">
        <h2>Add New Contact</h2>
        <a class="btn btn-primary ml-3" href="{{ route('importpage') }}">Back</a>
    </div>

    <form action="{{ route('contact.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" class="form-label"><strong>Email:</strong></label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mo_number" class="form-label"><strong>Mob. Number:</strong></label>
                    <input type="text" name="mo_number" id="mo_number" class="form-control" placeholder="Mob. Number">
                </div>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection