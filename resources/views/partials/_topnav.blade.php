<header class="app-header navbar">
<button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="#">
<img class="navbar-brand-full" src="#" width="89" height="25" alt="Weather Sys">
<img class="navbar-brand-minimized" src="#" width="30" height="30" alt="Weather Sys">
</a>
<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
<span class="navbar-toggler-icon"></span>
</button>
<ul class="nav navbar-nav d-md-down-none">
<li class="nav-item px-3">
<a class="nav-link" href="#">Dashboard</a>
</li>
<li class="nav-item px-3">
<a class="nav-link" href="#">Users</a>
</li>
<li class="nav-item px-3">
<a class="nav-link" href="#">Settings</a>
</li>
</ul>

<ul class="nav navbar-nav ml-auto">


<li class="nav-item dropdown">
<a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
<img class="img-avatar" src="#" alt="{{ Auth::user()->name }}">
</a>
<div class="dropdown-menu dropdown-menu-right">
<div class="dropdown-header text-center">
<strong>Account</strong>
</div>


<a class="dropdown-item" href="#">
<i class="fa fa-tasks"></i> Tasks
<span class="badge badge-danger">42</span>
</a>
<a class="dropdown-item" href="#">
<i class="fa fa-comments"></i> Comments
<span class="badge badge-warning">42</span>
</a>
<div class="dropdown-header text-center">
<strong>Settings</strong>
</div>

<a class="dropdown-item" href="#">
<i class="fa fa-wrench"></i> Settings</a>


<div class="divider"></div>

<a class="dropdown-item" href="#">
<i class="fa fa-lock"></i> Logout</a>
</div>
</li>


</ul>

</header>