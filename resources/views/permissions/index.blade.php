@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header p-0">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mt-2">Manage Permissions</h6>
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
    <div class="table-responsive">
        <table class="table table-hover table-sm table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col" class="text-right">
                        Options
                        <a href="{{route('permissions.create')}}">
                            <button type="button" class="btn btn-light btn-sm py-0" ><i class="fas fa-plus"></i></button>
                        </a>
                    </th>
                </tr>
                <tr>
                    <form class="form-inline ml-3">
                        @if($search)
                            <td><input class="form-control form-control-sm" name="name" type="search" placeholder="Filter" aria-label="Search" value="{{$search['name']}}"></td>
                            <td class="text-right">
                                <button class="btn btn-navbar" type="submit"><i class="fas fa-filter"></i></button>
                                <button type="reset" class="btn btn-light btn-sm py-0"><a href="/permissions" style="color: rgba(0, 0, 0, 0.9);">Clear</a></button>
                            </td>
                        @else
                            <td><input class="form-control form-control-sm" name="name" type="search" placeholder="Filter" aria-label="Search"></td>
                            <td class="text-right">
                                <button class="btn btn-navbar" type="submit"><i class="fas fa-filter"></i></button>
                                <button type="reset" class="btn btn-light btn-sm py-0"><a href="/permissions" style="color: rgba(0, 0, 0, 0.9);">Clear</a></button>
                            </td>
                        @endif
                    </form>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td class="text-right">
                            <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                                <a href="{{route('permissions.show', $permission->id)}}">
                                    <button type="button" class="btn btn-light btn-sm py-0" ><i class="fas fa-search"></i></button>
                                </a>
                                <a href="{{route('permissions.edit', $permission->id)}}">
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
            {{$permissions->links()}}
        </div>
    </div>
</div>

@endsection