@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Posts</li>
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
                        Posts
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                            {{-- <?php echo displayMessage();?> --}}
                            
                        @switch(true)
                            @case(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                                @break

                            @case(Session::has('modal_user') && Session::has('errors'))
                                {{Session::forget('modal_user')}}
                                {{Session::forget('modal_post')}}
                                {{Session::forget('modal_page')}}

                                <script>
                                $(document).ready(function(){
                                    $('#addUser').modal({show: true});
                                })
                                </script>
                                @break

                            @case(Session::has('modal_post') && Session::has('errors'))
                                {{Session::forget('modal_user')}}
                                {{Session::forget('modal_post')}}
                                {{Session::forget('modal_page')}}

                                <script>
                                $(document).ready(function(){
                                    $('#addPost').modal({show: true});
                                })
                                </script>
                                @break
                            @case(Session::has('modal_page') && Session::has('errors'))
                                {{Session::forget('modal_user')}}
                                {{Session::forget('modal_post')}}
                                {{Session::forget('modal_page')}}

                                <script>
                                $(document).ready(function(){
                                    $('#addPage').modal({show: true});
                                })
                                </script>
                                @break
                        @endswitch
                               {{--  <input id ="filter"  type="text" class="form-control" placeholder="filter Posts..."> --}}
                                <form class="" method="GET">
                                      <input type="text" class="form-control" id="filter" name="filter" placeholder="Filter posts" value="{{$filter}}">  
                                </form>

                            </div>
                        </div>
                        <table class="table  table-hover" id="posts">
                            <thead class="thead-dark">
                            <tr>
                                <th class="defaultUpDown" scope="col" style="width:30%">@sortablelink('post_title','Title')</th>
                                <th scope="col" style="width:20%">Published</th>
                                <th class="defaultUpDown" scope="col">@sortablelink('created_at','Created')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($posts)>0)
	                            @foreach($posts as $post)
                                    <tr>
                                        <td id="name"><?php echo $post->post_title?></td>
                                        <?php if($post->is_published==1):?>
                                        <td><i class="fas  fa-check"></i></td>
                                        <?php else :?>
                                        <td><i class="fas  fa-times"></i></td>
                                        <?php endif?>
                                        {{-- <td><?php echo $post->is_published?></td> --}}
                                        <td><?php echo date('M d Y',strtotime($post->created_at))?></td>
                                        <td><a class="btn btn-secondary mr-2" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                            <form style="display:inline" method="post"  action="{{ route('posts.destroy',$post->id) }}">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    {{-- {{$posts->links("pagination::bootstrap-4")}} --}}
                                    {!! $posts->appends(\Request::except('page'))->render() !!}
                                @else
                                    <h1>No Users Found...</h1>
                                @endif
                            </tbody>
                        </table>
                        <!-- pager --> 
                    </div>
                </div>
            </div><!-- 9 COL-MD-9 -->
        </div><!-- ROW FIRST -->
    </div>
</section>                        
@endsection
