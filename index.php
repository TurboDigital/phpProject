<?php 
    include_once "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mon projet</title>
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">
	</head> 
	<body role="document">
        <?php 
            include_once "pages/nav.php";
	    $logged = "";
            if(isset($_SESSION['logged']))$logged = $_SESSION['logged'];
            $page = '';
            if(!empty($_GET['page']))$page = $_GET['page'];
            if($logged == "true"){
                if($page == 'admin'){
                    include_once "pages/admin.php"; 
                }elseif($page == 'adduser'){
                    include_once "pages/add_user.php";
                }elseif($page == 'useredit'){
                    include_once "pages/useredit.php";
                }elseif($page == 'addtasks'){
                    include_once 'pages/add_tasks.php';
                }elseif($page == 'search'){
                    include_once 'pages/search_tasks.php';
                }elseif($page == 'edittask'){
                    include_once 'pages/edit_task.php';
                }elseif($page == 'addwork'){
                    include_once 'pages/add_work.php';
                }else{
                    include_once "pages/admin.php";
                }
            }else{
                if($page == 'search'){
                    include_once "pages/search_tasks.php";
                }elseif($page == 'login'){
                    include_once "pages/login.php";
                }elseif($page == 'addwork'){
                    include_once "pages/add_work.php";
                }else{
                    include_once "pages/search_tasks.php";
                }
            }
        ?>
	</body>
</html>
