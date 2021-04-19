<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- Custom Styles -->
    <link href="/laravelAdminApp/resources/css/app.css" rel="stylesheet">

    <script src="/js/app.js" rel="stylesheet"></script>
    <!-- for ckeditor  -->
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <!-- for jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <!-- for poper ie MODAL -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- for table sorter and pager -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    @if(Auth::check())

        <nav class="navbar navbar-default navbar-expand-md navbar-dark  ">
            <a class="navbar-brand" href="{{ url('/home') }}">Admin straps</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                 <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/home') }} ">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ request()->segment(1) == 'pages' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/pages') }}">Pages</a>
                    </li>
                    <li class="nav-item {{ request()->segment(1) == 'posts' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ url('/posts') }}" >Posts</a>
                    </li>
                    <li class="nav-item {{ request()->segment(1) == 'users' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ url('/users') }}">Users</a>
                   </li>
                </ul> 
                {{-- <ul class="navbar-nav  navbar-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Welcome <?php echo ucfirst($_SESSION['user']);?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log out</a>
                    </li>
                </ul> --}}
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto ">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        
                        {{-- @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>
        </nav>
        <header id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <h1>
                    <div class="fa fa-cog mt-2"></div>
                    @if (Request::is('home')) Dashboard</h1>@endif
                    @if (request()->segment(1) == 'pages') Pages <small>manage your site Pages</small></h1>@endif
                    @if (request()->segment(1) == 'posts') Posts <small>manage your site Posts</small></h1>@endif
                    @if (request()->segment(1) == 'users') Users <small>manage your site Users</small></h1>@endif

                </div>
                <div class="col-md-2">
                    <div class="dropdown class create">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Create Content
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a type="button" class="dropdown-item" data-toggle="modal" data-target="#addPage" >Add Page</a>
                            <a type="button" class="dropdown-item" data-toggle="modal" data-target="#addUser" >Add User</a>
                            <a type="button" class="dropdown-item" data-toggle="modal" data-target="#addPost" >Add Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

@else
<nav class="navbar navbar-default navbar-expand-md navbar-dark  ">
    <a class="navbar-brand" href="#">Admin straps</a>
</nav>
<header id="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 text-center">
                <h1>
                 Admin <small>Login Account</small></h1>
            </div>
        </div>
    </div>
</header>
@endif
    <main class="py-4">
        @yield('content')
    </main>
    @include('layouts/footer')