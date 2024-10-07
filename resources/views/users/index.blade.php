@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-0">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mt-2">Manage Users ({{count($users)}})</h6>
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
        <div class="col-1"></div>
        <div class="col-10">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Name</th>
                            <th scope="col">Profile</th>
                            <th scope="col">Language</th>
                            <th scope="col">Logins</th>
                            <th scope="col" class="text-right">
                                Options
                                @can('app-users-create')
                                <a href="{{route('users.create')}}">
                                    <button type="button" class="btn btn-light btn-sm py-0" ><i class="fas fa-user-plus"></i></button>
                                </a>
                                @endcan
                            </th>
                        </tr>
                        <tr>
                            <form class="form-inline ml-3">
                                @if($search)
                                    <td><input class="form-control form-control-sm" name="email" type="search" placeholder="Filter" aria-label="Search" value="{{$search['email']}}"></td>
                                    <td><input class="form-control form-control-sm" name="lastname" type="search" placeholder="Filter" aria-label="Search" value="{{$search['lastname']}}"></td>
                                    <td><input class="form-control form-control-sm" name="name" type="search" placeholder="Filter" aria-label="Search" value="{{$search['name']}}"></td>
                                    <td><input class="form-control form-control-sm" name="profile" type="search" placeholder="Filter" aria-label="Search" value="{{$search['profile']}}"></td>
                                    <td><input class="form-control form-control-sm" name="lang" type="search" placeholder="Filter" aria-label="Search" value="{{$search['lang']}}"></td>
                                    <td></td>
                                @else
                                    <td><input class="form-control form-control-sm" name="email" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td><input class="form-control form-control-sm" name="lastname" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td><input class="form-control form-control-sm" name="name" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td><input class="form-control form-control-sm" name="profile" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td><input class="form-control form-control-sm" name="lang" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td></td>
                                @endif
                                    <td class="text-right">
                                        <button class="btn btn-light btn-sm" type="submit"><i class="fas fa-filter"></i></button>
                                        <button type="reset" class="btn btn-light btn-sm"><a href="/users" style="color: rgba(0, 0, 0, 0.9);">Clear</a></button>
                                    </td>
                            </form>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->email}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->profile}}</td>
                                <td>{{$user->lang}}</td>
                                <td style="text-align: center;">{{$user->login_count}}</td>
                                @canany(['app-users-read', 'app-users-update', 'app-users-delete'])
                                <td class="text-right">
                                    <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                        @can('app-users-read')
                                            <a href="{{route('users.show', $user->id)}}">
                                                <button type="button" class="btn btn-light btn-sm py-0" ><i class="fas fa-search"></i></button>
                                            </a>
                                        @endcan
                                        @can('app-users-update')
                                            <a href="{{route('users.edit', $user->id)}}">
                                                <button type="button" class="btn btn-light btn-sm py-0" ><i class="fas fa-pen"></i></button>
                                            </a>
                                        @endcan
                                        @method('DELETE')
                                        @csrf
                                        @can('app-users-delete')
                                            <button type="submit" class="btn btn-light btn-sm py-0"><i class="fas fa-trash-alt"></i></button>
                                        @endcan
                                    </form>
                                </td>
                                @endcanany
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
        <div class="col-1"></div>
    </div>
</div>

@endsection