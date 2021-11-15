@extends('backend.app')
@section('title', 'Create Articles')
@extends('backend.sidebar')

{{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

@section('content')
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
            {{-- start content --}}
            <div class="card card-outline card-info">
                <div class="card-body">
                    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control col-7" placeholder="Title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                                <div class="custom-file col-7">
                                    <input type="file" name="file" class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="summernote" name="content"></textarea>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ url()->previous() }}" class="btn btn-default float-right">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            {{-- end content --}}
        </div>
    </div>
</div>
  {{-- </section> --}}

<!-- bs-custom-file-input -->
<script src="{{ asset('template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<script>
    $(function () {
        // Summernote
        $('#summernote').summernote()
    })

    $(function () {
        bsCustomFileInput.init();
    });
</script>

@endsection

