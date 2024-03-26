@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-0">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mt-2">Home</h6>
                            </div><!-- /.col -->
                            <div class="col-sm-6 float-sm-right">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><button type="reset" class="btn btn-light"><a href="#" style="color: rgba(0, 0, 0, 0.9);"><i class="fas fa-home"></i></a></button></li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </li>
                </ul>
            </div>
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard ye</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
@endsection