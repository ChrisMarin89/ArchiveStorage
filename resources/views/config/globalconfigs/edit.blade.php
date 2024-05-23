@extends('layouts.app')

@section('content')
<form action="{{route('globalconfigs.update', $gc->id)}}" method="POST">
@method('PATCH')
@csrf
    <!-- Content Header (Page header) -->
    <div class="content-header p-0">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mt-2">Edit Global Configuration: {{$gc->name}}</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6 float-sm-right">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><button type="reset" class="btn btn-light btn-sm"><a href="/config/globalconfigs" style="color: rgba(0, 0, 0, 0.9);"><i class="fas fa-arrow-left"></i> Back</a></button></li>
                                <li class="breadcrumb-item"><button type="submit" class="btn btn-light btn-sm"><i class="far fa-save"></i> Save</button></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </li>
            </ul>
        </div>
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#general-chart" data-toggle="tab" style="color: rgba(0, 0, 0, 0.9);">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#status-chart" data-toggle="tab" style="color: rgba(0, 0, 0, 0.9);">Status</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content p-0">

                    <div class="chart tab-pane active" id="general-chart" style="position: relative;">
                        <div class="chartjs-size-monitor">
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="name" class="form-label">Name</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="name" value="{{$gc->name}}" readonly="true">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="description" class="form-label">Description</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="description" value="{{$gc->description}}" placeholder="Type your description.">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="value" class="form-label">Value</label>
                                    </div>  
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="value" value="{{$gc->value}}" placeholder="Type your value.">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="type" class="form-label">Type</label>
                                    </div>  
                                    <div class="col-1">
                                        <select name="type">
                                            <option value="">-</option>
                                            @if ($gc->data_type == "string") <option value="string" selected>String</option>
                                            @else <option value="string">String</option>
                                            @endif
                                            @if ($gc->data_type == "integer") <option value="integer" selected>Integer</option>
                                            @else <option value="integer">Integer</option>
                                            @endif
                                            @if ($gc->data_type == "datetime") <option value="datetime" selected>Datetime</option>
                                            @else <option value="datetime">Datetime</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>            
                    </div>

                    <div class="chart tab-pane" id="status-chart" style="position: relative;">
                        <div class="chartjs-size-monitor">
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="name" class="form-label">Created By</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="created_by" value="{{$gc->created_by}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="name" class="form-label">Creation Date</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="created_at" value="{{$gc->created_at}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="lastname" class="form-label">Modified by</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="updated_by" value="{{$gc->updated_by}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="lastname" class="form-label">Modification Date</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="updated_at" value="{{$gc->updated_at}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            
            @if ($errors->any())
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col text-center">Errors</div>
                    </div><!-- /.row -->
                    @foreach ($errors->all() as $error) 
                    <div class="row">
                        <div class="col">{{ $error }}</div>
                    </div><!-- /.row -->
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</form>

@endsection