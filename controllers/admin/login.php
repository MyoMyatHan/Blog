<?php
    include_once "models/Admin_Table.class.php";


    $loginFormSubmitted = isset( $_POST['log-in']);
    if( $loginFormSubmitted ) {
        // $admin->login();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $adminTable = new Admin_Table($db);
        try {
            $adminTable->checkCredentials( $email, $password);
            $admin->login();
        } catch ( Exception $e ){

        }
    }

    // $view = include_once "views/admin/login-form-html.php";

    $loggingout = isset( $_POST['logout']);
    if ( $loggingout ) {
        $admin->logout();
    }
    
    if ( $admin->isLoggedIn()){
        $view = include_once "views/admin/logout-form-html.php";        
    } else {
        $view = include_once "views/admin/login-form-html.php";
    }

    return $view;