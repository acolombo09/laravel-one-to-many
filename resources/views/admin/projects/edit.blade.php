@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="d-flex justify-content-center">
                    <h2 class="fs-4 text-lg my-4">
                        Edit {{ $project->title }}
                    </h2>
                </div>

                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf()
                    @method("PATCH")

                    {{-- title --}}
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <div>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title', $project->title)}}"
                                name="title">
                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Publishing Date</label>
                        <input type="date" class="form-control" name="published_at" value="{{ $project->published_at?->toDateString() }}">
                    </div>


                    {{-- description --}}
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div>
                            <textarea class="form-control @error('description') is-invalid @enderror" style="height: 150px;"
                                name="description">{{old('description', $project->description)}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- image (solo url) --}}
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        @if($project->image)
                        <img src="{{ asset('/storage/' . $project->image) }}" alt="" class="img-thumbnail" style="width: 300px">
                        @endif
                
                        <div class="input-group">
                            <label class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">
                                <input type="file" class="form-control d-none" name="image" accept="image/*">
                                Upload
                            </label>
                            <input type="text" class="form-control" name="image_link">
                        </div>
                    </div>

                    {{-- link --}}
                    <div class="mb-3">
                        <label class="form-label">Link</label>
                        <div>
                            <input type="text" class="form-control @error('link') is-invalid @enderror" value="{{old('link', $project->link)}}"
                                name="link">
                            @error('link')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- checkbox per project published o in bozze --}}
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" id="is_published_input" name="is_published" value="1" {{ $project->is_published ? "checked" : ""}}>
                            <label class="form-check-label" for="is_published_input">Published</label>
                        </div>
                    </div>

                    <div class="w-100 text-center my-5">
                        <a class="btn btn-secondary" href="{{ route("admin.projects.index") }}">Cancel</a>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
                <div class="d-flex justify-content-center w-100 my-3">
                    <form action="{{ route("admin.projects.destroy", $project->slug) }}" method="POST">
                        @csrf
                        @method("DELETE")
            
                        <button type="submit" class="btn btn-danger">Delete Project</button>
            
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection