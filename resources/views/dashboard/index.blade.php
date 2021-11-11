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
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Article</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p> --}}
                </a>
              </li>
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

@if (session()->has('message'))
<ul>
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 25%">
    <strong>{{ session()->get('message') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</ul>
@endif

{{-- <section class="content"> --}}
<div class="container-fluid">
    <!-- /.row -->
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
            <a href="/article/create" class="btn btn-primary">Tambah Artikel</a>
            {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}

            <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table text-nowrap"> {{-- table-hover --}}
            <thead>
                <tr>
                <th style="width: 5%">No</th>
                <th style="width: 50%">Title</th>
                <th style="width: 15%">Date</th>
                <th style="width: 15%">Writer</th>
                <th style="width: 15%">Setting</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                <td class="align-middle">1</td>
                <td class="align-middle">Ronald Antonio Bonay, Ketua Umum Kadin Papua yang Baru</td>
                <td class="align-middle">11-7-2014</td>
                <td class="align-middle">Admin Tampan</td>
                <td>
                    <span>
                    <a href="/article/test" class="btn btn-success">Preview</a>
                    </span>
                    <span>
                    <a href="/edit" class="btn btn-primary">Edit</a>
                    </span>
                    <span>
                    <a href="/delete" class="btn btn-danger">Delete</a>
                    </span>
                </td>
                </tr> --}}
                @foreach ($posts as $post)
                    <tr>
                    <td class="align-middle">1</td>
                    <td class="align-middle">{{ $post->title }}</td>
                    <td class="align-middle">{{ date('jS M Y', strtotime($post->updated_at)) }}</td>
                    <td class="align-middle">{{ $post->user->name }}</td>
                    <td>
                        <span>
                        <a href="/article/{{ $post->slug }}" class="btn btn-success float-left mr-1">Preview</a>
                        </span>
                        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                            <span>
                            <a href="/article/{{ $post->slug }}/edit" class="btn btn-primary float-left mr-1">Edit</a>
                            </span>
                            <span class="float-left">
                                <form 
                                    action="/article/{{ $post->slug }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </span>
                        @endif
                    </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div>
</div><!-- /.container-fluid -->
  {{-- </section> --}}

@endsection