<div class="collapse navbar-collapse" id="header-navbar-collapse">

    <ul id="main-menu" class="nav navbar-nav navbar-left">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown"><i class="fa fa-plus"></i> Add new <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="post.php?type=post">Posts</a></li>
                <li><a href="post.php?type=page">Pages</a></li>
                <li><a href="category.php">Catagory</a></li>
                <li><a href="product.php">Products</a></li>
            </ul>
        </li>
        <li><a href="#">Comments <span class="badge">3</span></a></li>
    </ul>
    <!-- .navbar-left -->

    <ul class="nav navbar-nav navbar-right navbar-toolbar hidden-sm hidden-xs">


        <li class="dropdown dropdown-profile">
            <a href="javascript:void(0)" data-toggle="dropdown">
                <span class="m-r-sm"><?php
                if($userinfo['fname']==''){
                  echo $userinfo['acc_email'];
                }else{
                  echo $userinfo['fname']." ".$userinfo['lname'];
                }
                ?> <span class="caret"></span></span>
                <img class="img-avatar img-avatar-48" src="assets/img/avatars/avatar3.jpg" alt="User profile pic" />
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-header">
                    Pages
                </li>
                <li>
                    <a href="base_pages_profile.html">Profile</a>
                </li>
                <li>
                    <a href="base_pages_profile.html"><span class="badge badge-success pull-right">3</span> Blog</a>
                </li>
                <li>
                    <a href="frontend_login_signup.html">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- .navbar-right -->
</div>
