@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="color:red; font-style: oblique;">Blog Posts</h2>

        @if(session('success'))
            <div class="alert alert-success" >{{ session('success') }}</div>
        @endif


        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
    <tr>
        <td>{{ $post->name }}</td>
        <td>{{ $post->date }}</td>
        <td>{{ $post->author }}</td>
        <td>
            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('blog.destroy', $post->id) }}" method="post" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
    </div>

   
@endsection
