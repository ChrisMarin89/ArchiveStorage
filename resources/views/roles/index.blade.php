@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    Roles list
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Roles</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container">
    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">
                    Options
                    <a href="{{route('roles.create')}}">
                        <button type="button" class="btn btn-light btn-sm" ><i class="fas fa-plus"></i></button>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>
                        <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                            <a href="{{route('roles.show', $role->id)}}">
                                <button type="button" class="btn btn-light btn-sm" ><i class="fas fa-search"></i></button>
                            </a>
                            <a href="{{route('roles.edit', $role->id)}}">
                                <button type="button" class="btn btn-light btn-sm" ><i class="fas fa-pen"></i></button>
                            </a>
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
        </div>
    </div>
</div>

@endsection