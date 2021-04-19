@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                        Users
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                            
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

                                <form class="" method="GET">
                                    <input type="text" class="form-control" id="filter" name="filter" placeholder="Filter users" value="{{$filter}}">  
                              </form>
                            </div>
                        </div>
                        <table class="table  table-hover" id="users">
                            <thead class="thead-dark">
                            <tr>
                                <th class="defaultUpDown" scope="col" style="width:30%">@sortablelink('name')</th>
                                <th scope="col" style="width:30%">Email</th>
                                <th class="defaultUpDown" scope="col">@sortablelink('created_at','Joined')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($users)>0)
	                            @foreach($users as $user)
                                    <tr>
                                        <td id="name"><?php echo $user->name?></td>
                                        <td><?php echo $user->email?></td>
                                        <td><?php echo date('M d Y',strtotime($user->created_at))?></td>
                                        <?php if( $user->is_admin == 0) {?>
                                        <td><a class="btn btn-secondary mr-2" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                            <form style="display:inline" method="post"  action="{{ route('users.destroy',$user->id) }}">
                                                <input type="hidden" name="del_id" value="<?php echo $user->id;?>">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                        <?php }else ?>
                                        <td></td>
                                    </tr>
                                @endforeach
                                {!! $users->appends(\Request::except('page'))->render() !!}
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
