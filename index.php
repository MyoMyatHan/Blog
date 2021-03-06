<?php
    error_reporting ( E_ALL );
    ini_set('display errors', 1);

    include_once "models/Page_Data.class.php";
    $pageData = new Page_Data();
    $pageData->title = "Php/MySQL blog demo example";
    $pageData->addCSS("css/blog.css");
    $pageData->content = include_once "index-navigation.php";

    $dbInfo = "mysql:host=localhost;dbname=simple_blog";
    $dbUser = "root";
    $dbPassword = "";
    $db = new PDO( $dbInfo, $dbUser, $dbPassword );
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // $pageData->content .= include_once "controllers/blog.php";

    $pageRequested = isset( $_GET['page'] );
//default controller is blog
$controller = "blog";
if ( $pageRequested ) {
//if user submitted the search form
if ( $_GET['page'] === "search" ) {
//load the search by overwriting default controller
$controller = "search";
}
}

$pageData->content .=include_once "views/search-form-html.php";
//comment out or delete this line
//$pageData->content .=include_once "controllers/blog.php";
$pageData->content .=include_once "controllers/$controller.php";

    $page = include_once "views/page.php";
    echo $page;