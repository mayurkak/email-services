@extends('layout.header2')

@section('content')

<body>
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif

                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif

                                    <form action="{{ route('importfile') }}" method="POST" 
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" class="form-control">
                                        @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <br>
                                        <button type="submit" class="btn btn-success">Import contact Data</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    </main>

    </main><!-- End #main -->

    @endsection
