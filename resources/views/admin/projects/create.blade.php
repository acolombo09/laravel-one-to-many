@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">

                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf()
                    {{-- title --}}
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <div>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}"
                                name="title">
                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- description --}}
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div>
                            <textarea class="form-control @error('description') is-invalid @enderror" style="height: 150px;"
                                name="description">{{old('description')}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- image --}}
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror"
                            name="image">
                        @error('image')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- link --}}
                    <div class="mb-3">
                        <label class="form-label">Link</label>
                        <div>
                            <input type="text" class="form-control @error('link') is-invalid @enderror" value="{{old('link')}}"
                                name="link">
                            @error('link')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="w-100 text-center">
                        <a class="btn btn-secondary" href="{{ route("admin.projects.index") }}">Cancel</a>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection