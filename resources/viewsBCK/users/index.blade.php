@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    Users list
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">
                        Options
                        <a href="{{route('users.create')}}">
                            <button type="button" class="btn btn-light btn-sm" ><i class="fas fa-user-plus"></i></button>
                        </a>
                    </th>
                </tr>
                <tr>
                    <form class="form-inline ml-3">
                        @if($search)
                            <td><input class="form-control" name="name" type="search" placeholder="Filter" aria-label="Search" value="{{$search['name']}}"></td>
                            <td><input class="form-control" name="lastname" type="search" placeholder="Filter" aria-label="Search" value="{{$search['lastname']}}"></td>
                            <td><input class="form-control" name="email" type="search" placeholder="Filter" aria-label="Search" value="{{$search['email']}}"></td>
                            <td>
                                <button class="btn btn-navbar" type="submit"><i class="fas fa-filter"></i></button>
                                <a href="/users">Clear</a></li>
                            </td>
                        @else
                            <td><input class="form-control" name="name" type="search" placeholder="Filter" aria-label="Search"></td>
                            <td><input class="form-control" name="lastname" type="search" placeholder="Filter" aria-label="Search"></td>
                            <td><input class="form-control" name="email" type="search" placeholder="Filter" aria-label="Search"></td>
                            <td>
                                <button class="btn btn-navbar" type="submit"><i class="fas fa-filter"></i></button>
                                <a href="/users">Clear</a></li>
                            </td>
                        @endif
                    </form>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                <a href="{{route('users.show', $user->id)}}">
                                    <button type="button" class="btn btn-light btn-sm" ><i class="fas fa-search"></i></button>
                                </a>
                                <a href="{{route('users.edit', $user->id)}}">
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
    </div>
    <div class="row">
        <div class="mx-auto">
            {{$users->links()}}
        </div>
    </div>
</div>

@endsection