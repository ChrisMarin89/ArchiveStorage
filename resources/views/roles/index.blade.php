@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header p-0">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mt-2">Manage Roles</h6>
                    </div><!-- /.col -->
                    <div class="col-sm-6 float-sm-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><button type="reset" class="btn btn-light btn-sm"><a href="/" style="color: rgba(0, 0, 0, 0.9);"><i class="fas fa-arrow-left"></i> Back</a></button></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </li>
        </ul>
    </div>
</div>
<!-- /.content-header -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-right">
                                Options
                                <a href="{{route('roles.create')}}">
                                    <button type="button" class="btn btn-light btn-sm py-0" ><i class="fas fa-plus"></i></button>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td class="text-right">
                                    <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                        <a href="{{route('roles.show', $role->id)}}">
                                            <button type="button" class="btn btn-light btn-sm py-0" ><i class="fas fa-search"></i></button>
                                        </a>
                                        <a href="{{route('roles.edit', $role->id)}}">
                                            <button type="button" class="btn btn-light btn-sm py-0" ><i class="fas fa-pen"></i></button>
                                        </a>
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-light btn-sm py-0"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="mx-auto">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection