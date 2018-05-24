<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$this->title;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=URL;?>/views/admin-layouts/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=URL;?>/views/admin-layouts/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=URL;?>/views/admin-layouts/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=URL;?>/views/admin-layouts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">BUSANA INDAH KISARAN</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?=($this->controller=="admin") ? 'class="active"' : ''; ?>>
                        <a href="<?=URL;?>/admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li <?=($this->controller=="admin/products") ? 'class="active"' : ''; ?>>
                        <a href="<?=URL;?>/admin/products"><i class="fa fa-fw fa-bar-chart-o"></i> Manajemen Produk</a>
                    </li>
                    <li <?=($this->controller=="admin/members") ? 'class="active"' : ''; ?>>
                        <a href="<?=URL;?>/admin/members"><i class="fa fa-fw fa-table"></i> Manajemen Member</a>
                    </li>
                    <li <?=($this->controller=="admin/transactions") ? 'class="active"' : ''; ?>>
                        <a href="<?=URL;?>/admin/trancations"><i class="fa fa-fw fa-edit"></i> Transaksi</a>
                    </li>
                    <li <?=($this->controller=="admin/promo") ? 'class="active"' : ''; ?>>
                        <a href="<?=URL;?>/admin/promo"><i class="fa fa-fw fa-desktop"></i> Promo</a>
                    </li>
                    <li <?=($this->controller=="admin/settings") ? 'class="active"' : ''; ?>>
                        <a href="<?=URL;?>/admin/settings"><i class="fa fa-fw fa-wrench"></i> Settings</a>
                    </li>
                    <li <?=($this->controller=="admin/users") ? 'class="active"' : ''; ?>>
                        <a href="<?=URL;?>/admin/users"><i class="fa fa-fw fa-users"></i> Manajemen User</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">