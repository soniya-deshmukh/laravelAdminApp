@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/posts') }}">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit post</li>
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
                        Edit Post
                    </div>
                    <div class="card-body">
                        {{-- <form id="edit_user" action="edit-user.php?edit_id=<?php echo $post->id;?>" method="post"> --}}
                           
                        <form id="edit_user" action="{{ route('posts.update',$post->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="div formgroup">
                                <label for="name">Post Title</label>
                                <input type="text" name="post_title" class="form-control" placeholder="Post Title" value="{{ $post->post_title }}" >
                                @if ($errors->has('post_title'))
                                <span class="text-danger">{{ $errors->first('post_title') }}</span>
                                @endif
                            </div>
                            <div class="div formgroup">
                                <label for="post_body">Post Body </label>
                                <textarea name="post_body" class="form-control" placeholder="Post Body">{{ $post->post_body }}</textarea>
                                @if ($errors->has('post_body'))
                                <span class="text-danger">{{ $errors->first('post_body') }}</span>
                                @endif
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="is_published" id="" class=""  @if($post->is_published==1) checked @endif>
                                <label>Published</label>
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

