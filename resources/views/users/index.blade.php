@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-0">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mt-2">Manage Users</h6>
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
                            <th scope="col">Email</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Logins</th>
                            <th scope="col" class="text-right">
                                Options
                                <a href="{{route('users.create')}}">
                                    <button type="button" class="btn btn-light btn-sm py-0" ><i class="fas fa-user-plus"></i></button>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <form class="form-inline ml-3">
                                @if($search)
                                    <td><input class="form-control form-control-sm" name="email" type="search" placeholder="Filter" aria-label="Search" value="{{$search['email']}}"></td>
                                    <td><input class="form-control form-control-sm" name="lastname" type="search" placeholder="Filter" aria-label="Search" value="{{$search['lastname']}}"></td>
                                    <td><input class="form-control form-control-sm" name="name" type="search" placeholder="Filter" aria-label="Search" value="{{$search['name']}}"></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">
                                        <button class="btn btn-light btn-sm" type="submit" ><i class="fas fa-filter"></i></button>
                                        <button type="reset" class="btn btn-light btn-sm"><a href="/users" style="color: rgba(0, 0, 0, 0.9);">Clear</a></button>
                                        
                                    </td>
                                @else
                                    <td><input class="form-control form-control-sm" name="email" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td><input class="form-control form-control-sm" name="lastname" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td><input class="form-control form-control-sm" name="name" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">
                                        <button class="btn btn-light btn-sm" type="submit"><i class="fas fa-filter"></i></button>
                                        <button type="reset" class="btn btn-light btn-sm"><a href="/users" style="color: rgba(0, 0, 0, 0.9);">Clear</a></button>
                                    </td>
                                @endif
                            </form>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->email}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->name}}</td>
                                <td></td>
                                <td></td>
                                <td class="text-right">
                                    <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                        <a href="{{route('users.show', $user->id)}}">
                                            <button type="button" class="btn btn-light btn-sm py-0" ><i class="fas fa-search"></i></button>
                                        </a>
                                        <a href="{{route('users.edit', $user->id)}}">
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
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection