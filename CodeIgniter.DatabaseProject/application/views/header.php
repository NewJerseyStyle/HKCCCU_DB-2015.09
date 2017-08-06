<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script-->
    <title><?php echo $pageTitle; ?></title>
 

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="/CodeIgniter.DatabaseProject/css/bootstrap.min.css" rel="stylesheet">
    <link href="/CodeIgniter.DatabaseProject/css/font-awesome.min.css" rel="stylesheet">
    <link href="/CodeIgniter.DatabaseProject/css/prettyPhoto.css" rel="stylesheet">
    <link href="/CodeIgniter.DatabaseProject/css/price-range.css" rel="stylesheet">
    <link href="/CodeIgniter.DatabaseProject/css/animate.css" rel="stylesheet">
    <link href="/CodeIgniter.DatabaseProject/css/main.css" rel="stylesheet">
    <link href="/CodeIgniter.DatabaseProject/css/responsive.css" rel="stylesheet">
   <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

   <link rel="stylesheet" type="text/css" href="/CodeIgniter.DatabaseProject/css/header.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>

    <![endif]-->      
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> 

</head>

<body>
<header class="UH">
  <a href="javascript: void(0)" onclick="menuShow()"><img class="MenuBtn" src="/CodeIgniter.DatabaseProject/images/menu.png" alt="Menu" onmouseover="document.getElementById('menuBar').style.left = '0px'"></a>
  <a href="/codeigniter.databaseproject/index.php/home"><img class="HomeBtn" src="/CodeIgniter.DatabaseProject/images/ic_home_black_24dp_2x.png" alt="Home Page"></a>
  <a href="http://localhost/codeigniter.databaseproject/index.php/Home/login"><img class="Login" src="/CodeIgniter.DatabaseProject/images/ic_signIn_black_24dp_2x.png" alt="Sign in"></a>
  <a class="paddingHere" href="http://www.cityu.edu.hk/"><img class="iconMyTable" src="/CodeIgniter.DatabaseProject/images/Table.fw.png" alt="myTable"></a>
  <a class="paddingHere" href="http://localhost/codeigniter.databaseproject/index.php/Home/register"><img class="signIn" src="/CodeIgniter.DatabaseProject/images/ic_signUp_black_24dp_2x.png" alt="Registration"></a>
  <a href=""><img class="carticon" src="/CodeIgniter.DatabaseProject/images/ic_add_shopping_cart_black_24dp_2x.png" alt="Cart"></a>
  <!--a href=""><img id="Search" src=""></a-->
  

         <div class="dac-header-search" id="search-container">
    <div class="dac-header-search-inner">
      <div class="dac-sprite dac-search dac-header-search-btn" id="search-btn"></div>
        <form class="dac-header-search-form" onsubmit="return submit_search()">
          <input id="search_autocomplete" type="text" value="" autocomplete="off" onfocus="search_focus_changed(this, true)"
           onblur="search_focus_changed(this, false)" onkeydown="return search_changed(event, true, '/')" onkeyup="return search_changed(event, false, '/')" class="dac-header-search-input" placeholder="Search">
          <a class="dac-header-search-close hide" id="search-close">close</a>
        </form>
      </div><!-- end dac-header-search-inner -->
    </div>
   
  <div class="menuBar" id="menuBar" onmouseover="document.getElementById('menuBar').style.left = '0px'" onmouseleave="menuHide()">
    <ul><a href="" style="text-align:center;">
      <li>Hi  <?php echo  $username; ?>  !</li></a>
        <a href="http://localhost/codeigniter.databaseproject/index.php/home/hotAlbumList"><li><img class="listIcon" 
            src="/CodeIgniter.DatabaseProject/images/ic_whatshot_white_18dp_2x.png">Hot Albums</li></a>
        <a href="http://localhost/codeigniter.databaseproject/index.php/home/GenereCate"><li><img class="listIcon" src="/CodeIgniter.DatabaseProject/images/tag.png">Category</li></a>
           <a href="http://localhost/codeigniter.databaseproject/index.php/home/AlbumChart"><li><img class="listIcon" src="/CodeIgniter.DatabaseProject/images/ic_star_rate_white_18dp_2x.png">Popular Album </li></a>
        <a href=""><li><img class="listIcon" src="/CodeIgniter.DatabaseProject/images/ic_account_box_white_24dp_2x.png">Account Management</li></a>
        <a href=""><li><img class="listIcon" src="/CodeIgniter.DatabaseProject/images/ic_comment_white_18dp_2x.png">My Comments</li></a>
        <a href=""><li><img class="listIcon" src="/CodeIgniter.DatabaseProject/images/ic_album_white_24dp_2x.png">My Albums</li></a>
        <a href="http://localhost/codeigniter.databaseproject/index.php/home/logout"><li id="logoutBtn"><img class="listIcon" src="/CodeIgniter.DatabaseProject/images/ic_exit_to_app_white_24dp_2x.png">Logout</li></a>
      </ul>
  </div>

</header>
 
<br>
<br>
<br>