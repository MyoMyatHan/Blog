<?php
    include_once "models/Blog_Entry_Table.class.php";
    $entryTable = new Blog_Entry_Table ( $db );
    $isEntryClicked = isset($_GET['id']);
    if ( $isEntryClicked) {
        $entryId = $_GET['id'];
        $entryData = $entryTable->getEntry( $entryId );
        $blogOutput = include_once "views/entry-html.php";
        // $blogOutput = "will soon show entry with entry_id = $entryId";

        $blogOutput .= include_once "controllers/comments.php";

    } else {
        $entries = $entryTable->getALLEntries();
        $blogOutput = include_once "views/list-entry-html.php";
    }

    // $entries = $entryTable->getALLEntries();
    // // $oneEntry = $entries->fetchObject();
    // // $test = print_r( $oneEntry, true );
    // $blogOutput = include_once "views/list-entry-html.php";
    return $blogOutput;
