@extends('layouts.admin');

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                {{-- @if ($errors->any())
	                <div class="alert alert-danger">
		                <ul class="list-unistyled">
			                @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
			                @endforeach
		                </ul>
	                </div>
                @endif --}}
                <form action="{{ route('admin.posts.update', ['post' => $post->slug]) }}" method="post" enctype=“multipart/form-data”>
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-3">
                        <label for="name" class="control-label">Name:</label>
                        <input required type="text" name="name" id="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $post->name }}">
                        @error('name')
	                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="cover_image" class="control-label">Img:</label>
                        @if($post->cover_image != null)
                            <div>
                                <img src="{{ asset('/storage/' . $post->cover_image) }}" alt="" width="300">
                            </div>
                        @else
                            <h2>immagine non presente</h2>
                        @endif
                        <input type="file" accept="image/*" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
                        @error('cover_image')
	                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="description">Description:</label>
                        <textarea required name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old('description') ?? $post->description }}</textarea>
                        @error('description')
	                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="repository_link">Repository link:</label>
                        <input required type="text" name="repository_link" id="repository_link" placeholder="link" class="form-control @error('repository_link') is-invalid @enderror" value="{{ old('repository_link') ?? $post->repository_link }}">
                        @error('repository_link')
	                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection