{{-- <?php 
$admin = new Admin;
$pages_count = $admin->getPagesCount();
$posts_count = $admin->getPostsCount();
$users_count = $admin->getUsersCount();
?> --}}
    <div class="col-md-3">
        <div class="list-group ">
            <a href="{{ url('/home') }}" class="list-group-item list-group-item-action active main-color-bg">
                Dashboard
            </a>
            <a {{-- href="pages.php" --}} href="{{ url('/pages') }}" class="list-group-item list-group-item-action"><i class='fas fa-list-alt'></i> Pages <span class="badge badge-pill badge-secondary  ">{{-- <?php echo($pages_count->total_pages);?> --}}</span></a>
            <a href="{{ url('/posts') }}" class="list-group-item list-group-item-action"><i class="fas fa-pencil-alt"></i> Posts <span class="badge badge-pill badge-secondary  ">{{-- <?php echo($posts_count->total_posts);?> --}}</span></a>
            <a href="{{ url('/users') }}" class="list-group-item list-group-item-action"><i class="fas fa-user"></i> Users <span class="badge badge-pill badge-secondary  ">{{-- <?php echo($users_count->total_users);?> --}}</span></a>
        </div>
        <div class="container-fluid card bg-light">
            <h4>Disk space used</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
            </div>
            <h4>Bandwidth used</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar " style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
            </div>    
        </div>
    </div>