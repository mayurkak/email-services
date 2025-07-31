@extends('layout.header2')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Department</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('Department.create') }}"> Create Student</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-striped table-bordered" id="department-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Department Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($department as $depart)
                    <tr>
                        <td>{{ $depart->id }}</td>
                        <td>{{ $depart->Department }}</td>
                        <td>
                        <form action="{{ route('Department.destroy',$depart->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('Department.edit',$depart->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        
    </div>
<script>
    $(document).ready(function() {
        $('#department-table').DataTable();
    });
</script>
@endsection