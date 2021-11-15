@extends('backend.app')
@section('title', 'Articles')
@extends('backend.sidebar')

{{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

@section('content')
{{-- <section class="content"> --}}
<div class="container-fluid">
    @include('flash::message')
    <!-- /.row -->
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
            <a href="{{ route('articles.create')}}" class="btn btn-primary">Tambah Artikel</a>
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
                <th class="col-1">No</th>
                <th class="col-6">Title</th>
                <th class="col-2">Date</th>
                <th class="col-2">Creator / Editor</th>
                <th class="col-1"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td class="align-middle">{{$loop->iteration}}</td>
                    <td class="align-middle">{{ $post->title }}</td>
                    <td class="align-middle">{{ \Carbon\Carbon::parse($post->updated_at)->format('d F Y') }}</td>
                    <td class="align-middle">{{ $post->users[0]->name }}</td>
                    <td>
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                Action
                            </button>
                            <ul class="dropdown-menu">
                                <a href="{{ route('articles.show', $post->id) }}"><li class="dropdown-item">Preview</li></a>
                                <a href="{{ route('articles.edit', $post->id) }}"><li class="dropdown-item">Edit</li></a>
                                <li class="dropdown-divider"></li>
                                <form id="delete_form"
                                action="{{ route('articles.destroy', $post->id) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <a href="javascript: submitForm()">
                                    <li class="dropdown-item text-danger">
                                        Delete
                                    </li>
                                </a>
                                </form>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                    <td class="text-center" colspan="5">Belum ada artikel untuk saat ini.</td>
                @endforelse
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

<script>
    function submitForm() {
        document.getElementById('delete_form').submit();
    }
</script>

@endsection
