@extends('backend.app')
@section('title', 'Preview Articles')
@extends('backend.sidebar')

{{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

@section('content')
{{-- <section class="content"> --}}
<div class="container-fluid">
    @include('flash::message')
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            {{-- start content --}}
            <div class="card card-outline card-info">
                <div class="card-body">
                    <div class="form-group card-header col-9 mb-2">
                        <span class="text-muted text-small"><i class="far fa-user mr-2"></i> {{ $editor->name }}</span>
                        <span class="text-muted text-small float-right"><i class="far fa-calendar-alt mr-2"></i> {{ \Carbon\Carbon::parse($article->updated_at)->format('D, d F Y') }}</span>
                    </div>
                    <div class="form-group">
                        @if (isset($article->image_path))
                        <img src="{{ asset('storage/'.$article->image_path) }}" class="col-9">
                        @else
                        <div class="col-9">
                            <div class="text-danger p-5 border">No Image</div>
                        </div>
                        @endif
                    </div>

                    <div class="form-group col-9 my-4">
                        <h4 class="text-justify font-weight-bold">{{ $article->title }}</h4>
                    </div>

                    <div class="form-group col-9 text-justify">
                        {!! $article->description !!}
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('articles.index') }}" class="btn btn-default float-right">Back</a>
                    </div>
                </div>
            </div>
            {{-- end content --}}
        </div>
    </div>
</div>
  {{-- </section> --}}
<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
@endsection

