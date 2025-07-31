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
    .form-group strong {
        display: block;
        font-weight: 600;
        margin-bottom: 5px;
    }
    .form-group {
        padding: 10px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
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
</style>
@extends('layout.header2')

@section('content')
<div class="form-container">
    <div class="form-header">
        <h2>Show Product</h2>
        <a class="btn btn-primary" href="{{ route('contact.index') }}">Back</a>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $contact->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mob. Number:</strong>
                {{ $contact->mo_number }}
            </div>
        </div>
    </div>
</div>
@endsection