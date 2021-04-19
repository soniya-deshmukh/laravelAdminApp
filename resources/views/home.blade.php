@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        </ol>
    </div>
</nav>
<section id="main">
    <div class="container-fluid">
        <div class="row">
           {{--  <?php include 'inc/left-panel.php';?> --}}
            @include('layouts.left-panel')
            <div class="col-md-9">
                <div class="card  bg-light">
                    <div class="card-header main-color-bg">
                        Panel Title
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                <div class="card-body">
                                    <h2><i class="fas fa-user"></i> {{$count_users}} {{-- <?php echo $users_count->total_users;?> --}}</h2>
                                    <h4>Users</h4>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h2><i class="fas fa-list-alt"></i> {{$count_pages}}{{-- <?php echo $pages_count->total_pages;?> --}}</h2>
                                        <h4>Pages</h4>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h2><i class="fas fa-pencil-alt"></i> {{$count_posts}} {{-- <?php echo $posts_count->total_posts;?> --}}</h2>
                                        <h4>Posts</h4>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h2><i class="fas fa-chart-bar"></i> 120</h2>
                                        <h4>Visits</h4>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-light">
                    <div class="card-header  ">
                        <h3>latest User</h3>
                    </div>
                    <div class="card-body">
                    <div class="row">
                            <div class="col-md-12 form-group">
                                <form class="" method="GET">
                                    <input type="text" class="form-control" id="filter" name="filter" placeholder="Filter users" value="{{$filter}}">  
                              </form>
                            </div>
                        </div>
                    <table class="table  table-hover" id="users">
                            <thead class="thead-dark">
                            <tr>
                                <th class="defaultUpDown" scope="col" style="width:20%">@sortablelink('name')</th>
                                <th scope="col" style="width:50%">Email</th>
                                <th class="defaultUpDown" scope="col">@sortablelink('created_at')</th>
                            </tr>
                            </thead>
                            <tbody>
                                {{-- <?php foreach ($users as $user):?>
                                <tr>
                                    <td id="name"><?php echo $user->name?></td>
                                    <td><?php echo $user->email?></td>
                                    <td><?php echo date('M d Y',strtotime($user->created_at))?></td>
                                    
                                </tr>
                                <?php endforeach;?> --}}

                                <tbody>
                                    @if(count($users)>0)
                                    @foreach($users as $user)
                                        <tr>
                                            <td id="name"><?php echo $user->name?></td>
                                            <td><?php echo $user->email?></td>
                                            <td><?php echo date('M d Y',strtotime($user->created_at))?></td>
                                        </tr>
                                    @endforeach
                                    {!! $users->appends(\Request::except('page'))->render() !!}
                                    @else
                                        <h1>No Users Found...</h1>
                                    @endif
                                </tbody>
                            </tbody>
                        </table>
                    </div> 
                </div><!-- CARD TABLE -->           
            </div><!-- 9 COL-MD-9 -->
        </div><!-- ROW FIRST -->
    </div>
</section>
@endsection