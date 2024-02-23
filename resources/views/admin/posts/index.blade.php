@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="pt-5">
                <div class="d-flex justify-content-between align-items-center ">
                    <h2>Repository</h2>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add Repo</a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="py-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Repository Link</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->repository_link }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>
                                    <a href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">
                                        <i class="fa-solid fa-eye fa-xl color-primary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection