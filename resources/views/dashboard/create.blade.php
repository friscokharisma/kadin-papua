{{-- @extends('backend.app')
@section('title', 'Dashboard')

@section('content')
    @include('dashboard.table')
@endsection --}}

@extends('backend.app')
@section('title', 'Dashboard Admin')

@section('sidebar')
    <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kadin Papua</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Tampan</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Article</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Article</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li> --}}
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@endsection

{{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

@section('content')
    {{-- @include('dashboard.table') --}}

@if ($errors->any())
  <ul>
      @foreach ($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 25%">
            <strong>{{ $error }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      @endforeach
  </ul>
@endif
      {{-- <section class="content"> --}}
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Article</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form
          action="/article"
          method="POST"
          enctype="multipart/form-data">
          @csrf

          <div class="card-body">
            <div class="form-group">
              <label>Title</label> {{-- for="exampleInputEmail1" --}}
              <input class="form-control" type="text" name="title" placeholder="Judul Artikel"> {{-- id="exampleInputEmail1"  --}}
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="12" placeholder="Isi artikel"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Picture</label>
              <div class="input-group">
                <div class="custom-file">
                  <input class="custom-file-input" type="file" name="image"> {{-- id="exampleInputFile" --}}
                  <label class="custom-file-label" >Choose file</label> {{-- for="exampleInputFile" --}}
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
      {{-- </section> --}}

@endsection

{{-- <div class="w-8/12 m-auto pt-20">
  <form 
      action="/article"
      method="POST"
      enctype="multipart/form-data">
      @csrf
      
      <input 
          type="text"
          name="title"
          placeholder="Judul Artikel"
          class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
      
      <textarea 
          name="description"
          placeholder="Isi Artikel"
          class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>
  
      <div class="bg-grey-lighter pt-15">
          <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
              <span class="mt-2 text-base leading-normal">
                  Select a file
              </span>
              <input type="file" name="image" class="hidden">
          </label>
      </div>

      <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
          Submit
      </button>

  </form>
</div> --}}