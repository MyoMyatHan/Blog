<?php
    include_once "models/Blog_Entry_Table.class.php";
    $entryTable = new Blog_Entry_Table( $db );
    $allEntries = $entryTable->getAllEntries();
    // $oneEntry = $allEntries->fetchObject();
    // $testOutput = print_r ( $oneEntry, true);
    // return "<pre>$testOutput</pre>";
    $entriesAsHTML = include_once "views/admin/entries-html.php";
    return $entriesAsHTML;