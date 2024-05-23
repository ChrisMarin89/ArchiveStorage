@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-0">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mt-2">Configurations</h6>
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

<!-- Main content -->
<div class="container">
    <div class="row justify-content-center">
        <div class="card m-2" style="width: 18rem;">
            <div class="card-header"><p class="h6 text-center font-weight-bold">Settings</p></div> 
            <div class="card-body">
                <a href="/config/globalconfigs" style="color: rgba(0, 0, 0, 0.9);"><p>- Global Configurations</p></a>
                <p>- Parser Templates (Json)</p>
            </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
            <div class="card-header"><p class="h6 text-center font-weight-bold">Triggers</p></div> 
            <div class="card-body">
                <p>- Schedule Tasks</p>
                <p>- File Imports</p>
            </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
            <div class="card-header"><p class="h6 text-center font-weight-bold">Monitoring</p></div> 
            <div class="card-body">
                <p>- Service Status</p>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
@endsection