@extends('layout.header2')

@section('content')
<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container mt-5">
                <h2>Survey List</h2>

                <table id="templateTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Form Details</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($template as $temp)
                            <tr>
                                <td>View Form {{ $temp->id }} {{ $temp->form_name }}</td>
                                <td><a class="btn btn-primary" href="{{ route('draft_form', ['id' => $temp->id]) }}">View</a></td>
                                <td>
                                    <form action="{{ route('delete_form', ['id' => $temp->id]) }}" method="POST" class="delete-form">
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
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#templateTable').DataTable();
        // console.log("svd");
        $('.delete-form').on('submit', function(e) {
            var form = this;
            e.preventDefault();
            var confirmed = confirm('Are you sure you want to delete this form?');
            if (confirmed) {
                form.submit();
            }
        });
    });
</script>
@endsection
