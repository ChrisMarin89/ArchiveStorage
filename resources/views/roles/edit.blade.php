@extends('layouts.app')

@section('content')
<form action="{{route('roles.update', $role->id)}}" method="POST">
@method('PATCH')
@csrf
    <!-- Content Header (Page header) -->
    <div class="content-header p-0">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mt-2">Edit Role: {{$role->name}}</h6>
                            </div><!-- /.col -->
                            <div class="col-sm-6 float-sm-right">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><button type="reset" class="btn btn-light btn-sm"><a href="/roles" style="color: rgba(0, 0, 0, 0.9);"><i class="fas fa-arrow-left"></i> Back</a></button></li>
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
                        <a class="nav-link" href="#users-chart" data-toggle="tab" style="color: rgba(0, 0, 0, 0.9);">Users</a>
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
                                        <input type="text" class="form-control" name="name" value="{{$role->name}}" placeholder="Type your name." readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="description" class="form-label">Description</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="description" value="{{$role->description}}" placeholder="Type a description.">
                                    </div>
                                </div>
                            </div>
                        </div>            
                    </div>

                    <div class="chart tab-pane" id="users-chart" style="position: relative;">
                        <div class="chartjs-size-monitor">
                            <select multiple="multiple" name="users[]" class="duallistbox" title="duallistbox">
                                @foreach($users as $user)
                                    <?php if($user->hasRole($role->name)){?>
                                        <option value="{{$user->id}}" selected="selected">{{$user->email}}</option>
                                    <?php } else {?>
                                        <option value="{{$user->id}}">{{$user->email}}</option>
                                    <?php } ?>
                                @endforeach
                            </select>
                        
                            <script>
                                var duallistbox = $('.duallistbox').bootstrapDualListbox({
                                    nonSelectedListLabel: 'Available Users',
                                    selectedListLabel: 'Assigned Users',
                                    infoText: false,
                                    infoTextFiltered: false,
                                    selectorMinimalHeight: 300

                                });
                            </script>
                        </div>
                    </div>

                    <div class="chart tab-pane" id="status-chart" style="position: relative;">
                        <div class="chartjs-size-monitor">
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="created_by" class="form-label">Created By</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="created_by" value="{{$role->created_by}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="created_at" class="form-label">Creation Date</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="created_at" value="{{$role->created_at}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="updated_by" class="form-label">Modified by</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="updated_by" value="{{$role->updated_by}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="updated_at" class="form-label">Modification Date</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="updated_at" value="{{$role->updated_at}}" readonly>
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