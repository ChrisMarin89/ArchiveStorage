@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/users">Users</a></li>
                    <li class="breadcrumb-item active">Show</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-4 mb-3">User details</h3>
            <p class="lead">Name: {{$user->name}}</p>
            <p class="lead">Lastname: {{$user->lastname}}</p>
            <p class="lead">e-mail: {{$user->email}}</p>
        </div>
    </div>
</div>
@endsection