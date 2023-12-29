

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">

    <!-- Add your custom styles here -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
            color: #fff;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #fff;
            margin-right: 15px;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
        <p><a class="" style="color:red; font-style: oblique;" href="#">Blog Application</a></p>
            <h1 style="color:red; font-style: oblique;" >"Where Ideas Meet Words"</h1>
           
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.index') }}" style="color:black">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.create') }}" style="color:black">Create Post</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}" style="color:black">Logout</a>
                    </li>
                    
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    @stack('scripts')
</body>
</html>
