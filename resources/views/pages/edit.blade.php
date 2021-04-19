@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/pages') }}">Pages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit page</li>
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
                        Edit Page
                    </div>
                    <div class="card-body">
                        {{-- <form id="edit_user" action="edit-user.php?edit_id=<?php echo $page->id;?>" method="post"> --}}
                           
                        <form id="edit_page" action="{{ route('pages.update',$page->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="div formgroup">
                                <label for="page_title">Page Title</label>
                                <input type="text" name="page_title" class="form-control" placeholder="Page Title" value="{{ $page->page_title }}" >
                                @if ($errors->has('page_title'))
                                <span class="text-danger">{{ $errors->first('page_title') }}</span>
                                @endif
                            </div>
                            <div class="div formgroup">
                                <label for="page_body">Page Body </label>
                                <textarea name="page_body" class="form-control" placeholder="Page Body">{{ $page->page_body }}</textarea>
                                @if ($errors->has('page_body'))
                                <span class="text-danger">{{ $errors->first('page_body') }}</span>
                                @endif
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="is_published" id="" class=""  @if($page->is_published==1) checked @endif>
                                <label>Published</label>
                            </div>
                            <div class="div formgroup">
                                <label for="meta_tag">Meta Tags </label>
                                <input type="text" name="meta_tag" class="form-control" placeholder="Add some Tags.." value="{{ $page->meta_tag }}">
                            </div>
                            <div class="div formgroup">
                                <label for="meta_description">Meta Description </label>
                                <textarea type="text" name="meta_description" class="form-control" placeholder="Add Meta Description.." >{{$page->meta_description}}</textarea>
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

