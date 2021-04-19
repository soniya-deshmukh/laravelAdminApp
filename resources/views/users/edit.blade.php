@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/users') }}">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit user</li>
        </ol>
    </div>
</nav>
<section id="main">
    <div class="container-fluid">
        <div class="row">
        {{-- <?php include 'inc/left-panel.php';?> --}}
        @include('layouts.left-panel')
            <div class="col-md-9">
                <div class="card  bg-light">
                    <div class="card-header main-color-bg">
                        Edit User
                    </div>
                    <div class="card-body">
                        {{-- <form id="edit_user" action="edit-user.php?edit_id=<?php echo $user->id;?>" method="post"> --}}
                           
                        <form id="edit_user" action="{{ route('users.update',$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="div formgroup">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}" >
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="div formgroup">
                                <label for="user_email">Email</label>
                                <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email" value="{{ $user->email }}" >
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                {{-- <div id="status"></div> --}}
                            </div>
                            {{-- <div class="div formgroup">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" value="{{ $user->password }}" required>
                            </div> --}}
                            <div class="div formgroup">
                                <label for="notes">Notes</label>
                                <textarea name="notes" class="form-control" placeholder="User details"> {{ $user->notes }}</textarea >
                            </div>
                            <div class="div form-group">
                                <input type="submit" name ="submit" class="btn btn-primary mt-2" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- 9 COL-MD-9 -->
        </div><!-- ROW FIRST -->
    </div>
</section>
@endsection

