@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="color:red; font-style: oblique;">Blog Posts</h2>

        @if(session('success'))
            <div class="alert alert-success" >{{ session('success') }}</div>
        @endif

        <form id="searchForm" action="{{ route('blog.search') }}" method="GET" class="mb-3">
        @csrf
        <div class="form-group">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search by name">
        </div>
        <button class="btn btn-primary">Search</button>
    </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->date }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->content }}</td>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    $(document).ready(function () {
        $('#searchForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'GET',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    $('#postsTable tbody').html(data);
                }
            });
        });
    });
</script>
@endsection
