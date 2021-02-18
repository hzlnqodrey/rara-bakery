<?php

    session_start();
    session_destroy();

    // redirect user ke halaman login

    header("Location: loginPage.php?pesan=logout");

    if( isset($_GET['pesan']) ) {
        if( $_GET['pesan'] == "delete" ) {
            header("Location: index.php");
        } else if ( $_GET['pesan'] == "menu_awal" ) {
            header("Location: index.php");
        }
    }
?>