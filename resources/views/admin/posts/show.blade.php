@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="py-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Repository Link</th>
                                <th scope="col">Slug</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>
                                    <a>
                                        {{ $post->name }}
                                    </a>
                                </td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->repository_link }}</td>
                                <td>{{ $post->slug }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection