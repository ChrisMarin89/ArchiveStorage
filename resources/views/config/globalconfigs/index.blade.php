@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-0">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mt-2">Global Configurations</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6 float-sm-right">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><button type="reset" class="btn btn-light btn-sm"><a href="/config" style="color: rgba(0, 0, 0, 0.9);"><i class="fas fa-arrow-left"></i> Back</a></button></li>
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
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Value</th>
                            <th scope="col">Type</th>
                            <th scope="col" class="text-right">
                                Options
                                <a href="{{route('globalconfigs.create')}}">
                                    <button type="button" class="btn btn-light btn-sm py-0" ><i class="fas fa-plus"></i></button>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <form class="form-inline ml-3">
                                @if($search)
                                    <td><input class="form-control form-control-sm" name="name" type="search" placeholder="Filter" aria-label="Search" value="{{$search['name']}}"></td>
                                    <td><input class="form-control form-control-sm" name="description" type="search" placeholder="Filter" aria-label="Search" value="{{$search['description']}}"></td>
                                    <td><input class="form-control form-control-sm" name="value" type="search" placeholder="Filter" aria-label="Search" value="{{$search['value']}}"></td>
                                    <td><input class="form-control form-control-sm" name="type" type="search" placeholder="Filter" aria-label="Search" value="{{$search['type']}}"></td>
                                    <td></td>
                                @else
                                    <td><input class="form-control form-control-sm" name="name" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td><input class="form-control form-control-sm" name="description" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td><input class="form-control form-control-sm" name="value" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td><input class="form-control form-control-sm" name="type" type="search" placeholder="Filter" aria-label="Search"></td>
                                    <td></td>
                                @endif
                                    <td class="text-right">
                                        <button class="btn btn-light btn-sm" type="submit"><i class="fas fa-filter"></i></button>
                                        <button type="reset" class="btn btn-light btn-sm"><a href="/config/globalconfigs" style="color: rgba(0, 0, 0, 0.9);">Clear</a></button>
                                    </td>
                            </form>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gcs as $gc)
                            <tr>
                                <td><a href="{{route('globalconfigs.edit', $gc->id)}}" style="color: rgba(0, 0, 0, 0.9);">{{$gc->name}}</a></td>
                                <td>{{$gc->description}}</td>
                                <td>{{$gc->value}}</td>
                                <td>{{$gc->data_type}}</td>
                                <td class="text-right">
                                    <form action="{{route('globalconfigs.destroy', $gc->id)}}" method="POST">
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
                    {{$gcs->links()}}
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>

@endsection