@extends('admin.layout')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
<!-- /.content-header -->

@section('body')
<!-- Main row -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @if(auth()->user()?->role === 'admin')
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- small box -->
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-clock"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">About</span>
                            <span class="info-box-number">
                                
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- small box -->
                    <div class="info-box">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Features</span>
                            <span class="info-box-number">
                                
                            </span>
                        </div>
                    </div>
                    
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                    <!-- small box -->
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-handshake"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Packages</span>
                            <span class="info-box-number">
                                
                            </span>
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- small box -->
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-project-diagram"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Services</span>
                            <span class="info-box-number">
                                
                            </span>
                        </div>
                    </div>
                    
                </div>
            @endif
           
        </div>
    </div>
</section>
@endsection