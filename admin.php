<?php
    error_reporting ( E_ALL );
    ini_set ( "display_errors", 1);

    include_once "models/Page_Data.class.php";
    $pageData = new Page_Data();
    $pageData->title = "PHP/MySQL blog demo";
    $pageData->addCSS("css/blog.css");
    $pageData->addScript("js/editor.js");
    // $pageData->content = include_once "views/admin/admin-navigation.php";
   

    $dbInfo = "mysql:host=localhost;dbname=simple_blog";
    $dbUser = "root";
    $dbPassword = "";
    $db = new PDO( $dbInfo, $dbUser, $dbPassword );
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $navigationIsClicked = isset($_GET['page']);
    // if ($navigationIsClicked) {
    //     $contrl = $_GET['page'];
    // } else {
    //     $contrl = 'entries';
    // }

    include_once "models/Admin_User.class.php";
    $admin = new Admin_User();
    $pageData->content = include_once "controllers/admin/login.php";
    if ( $admin->isLoggedIn()) {
        $pageData->content .= include_once "views/admin/admin-navigation.php";
        $navigationIsClicked = isset( $_GET['page']);
        if ( $navigationIsClicked ) {
            $controller = $_GET['page'];
            } else {
                $controller = "entries";
            }
            $pathToController = "controllers/admin/$controller.php";
            $pageData->content .= include_once $pathToController;
    }

    // $pageData->content .= include_once "controllers/admin/$contrl.php";

    $page = include_once "views/page.php";
    echo $page;