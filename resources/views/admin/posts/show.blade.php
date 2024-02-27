@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="py-5">
                    <h3>Name:</h3>
                    <p>{{ $post->name }}</p>
                    <h5>Image:</h5>
                    <img src="{{ asset('/storage/' . $post->cover_image) }}" width="300" alt="">
                    <h5>Description:</h5>
                    <p>{{ $post->description }}</p>
                    <h5>Repository:</h5>
                    <p>{{ $post->repository_link }}</p>
                    <h5>Slug:</h5>
                    <p>{{ $post->slug }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection