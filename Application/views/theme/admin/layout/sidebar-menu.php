<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="<?=url('assets/img/avatar2.png')?>" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?= $data['user']->first_name ?? "" ?></strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close('mySidebar')" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="<?=url("admin")?>" class="w3-bar-item w3-button w3-padding <?=$data['page'] == 'overview' ? 'w3-blue-grey' : ''?>"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="#" class="w3-bar-item w3-button w3-padding <?=$data['page']=='posts'?'w3-blue-grey':''?>"><i class="fa fa-file"></i>  Posts</a>
    <a href="<?=url("admin/users")?>" class="w3-bar-item w3-button w3-padding <?=$data['page'] == 'users' ? 'w3-blue-grey' : ''?>"><i class="fa fa-users fa-fw"></i>  Users</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><hr>
    <a href="<?=url('auth/logout')?>" class="w3-bar-item w3-button w3-text-red"><i class="fa fa-sign-out"></i>  Logout</a><br><br>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close('mySidebar')" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
