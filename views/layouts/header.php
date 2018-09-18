<?php
use libs\Session;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$this->title;?></title>
<?php
foreach($this->vendor as $key => $val){
  if($key == "css"){
    foreach($val as $value){
      echo "<link href='$value' type='text/css' rel='stylesheet'>\n";
    }
  }
}
?>
</head>
<body>

<div class="super_container">

  <!-- Header -->

  <header class="header trans_300">

    <!-- Top Navigation -->

    <div class="top_nav">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="top_nav_left"> </div>
          </div>
          <div class="col-md-6 text-right">
            <div class="top_nav_right">
              <ul class="top_nav_menu">
                <li class="account">
                  <a href="#">
                    My Account
                    <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="account_selection">
                    <li><a href="<?=URL;?>/auth"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                    <li><a href="<?=URL;?>/auth/register"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                  </ul>
                </li>
                <?php if(Session::get("username")): ?>
                <li class="account">
                  <a href="#">
                    <?=Session::get("username");?>
                    <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="account_selection">
                    <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></li>
                  </ul>
                </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-right">
            <div class="logo_container">
              <a href="<?=URL;?>">Busana<span>Indah</span></a>
            </div>
            <nav class="navbar">
              <form class="navbar-form" method="post">
                <div class="form-group" style="display:inline;">
                  <div class="input-group">
                    <input class="form-control" name="search" type="text" placeholder="Cari...">
                    <span class="input-btn-group"><button class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button></span>
                  </div>
                </div>
              </form>
              <ul class="navbar_menu">
                <li><a href="<?=URL;?>">home</a></li>
                <li><a href="<?=URL;?>/contact">contact</a></li>
                <li><a href="<?=URL;?>/products">products</a></li>
              </ul>
              <ul class="navbar_user">
                <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                <li class="checkout">
                  <a href="#">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="checkout_items" class="checkout_items">2</span>
                  </a>
                </li>
              </ul>
              <div class="hamburger_container">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>

  </header>

  <div class="fs_menu_overlay"></div>
  <div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
      <ul class="menu_top_nav">
        <li class="menu_item has-children">
          <a href="#">
            My Account
            <i class="fa fa-angle-down"></i>
          </a>
          <ul class="menu_selection">
            <li><a href="<?=URL;?>/auth"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
            <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
          </ul>
        </li>
        <li class="menu_item"><a href="<?=URL;?>">home</a></li>
        <li class="menu_item"><a href="<?=URL;?>/contact">contact</a></li>
        <li class="menu_item"><a href="<?=URL;?>/products">products</a></li>
      </ul>
    </div>
  </div>