<?php
    include_once "models/Blog_Entry_Table.class.php";
    $entryTable = new Blog_Entry_Table( $db );

    $editorSubmitted = isset($_POST['action']);
    if ($editorSubmitted) {
        $buttonClicked = $_POST['action'];
        $save = ( $buttonClicked === 'save' );
        $id = $_POST['id'];
        $insertNewEntry = ( $save and $id === '0');


        // $insertNewEntry = ( $buttonClicked === 'save');

        $deleteEntry = ( $buttonClicked === 'delete');
        $updateEntry = ( $save and $insertNewEntry === false );
        $title = $_POST['title'];
        $entry = $_POST['entry'];
        // $id = $_POST['id'];

        if ( $insertNewEntry ) {
            // $title = $_POST['title'];
            // $entry = $_POST['entry'];
            // $entryTable->saveEntry( $title, $entry );
            $saveEntryId = $entryTable->saveEntry( $title, $entry );
        } else if ( $updateEntry ) {
            $entryTable->updateEntry( $id, $title, $entry);
            $saveEntryId = $id;
        }
         else if ( $deleteEntry ) {
                $entryTable->deleteEntry( $id );
        }

    }

    $entryRequested = isset( $_GET['id']);
    if ( $entryRequested ) {
        $id = $_GET['id'];
        $entryData = $entryTable->getEntry( $id );
        $entryData->entry_id = $id;
        $entryData->message = "";
    }

    $entrySaved = isset( $saveEntryId );
    if ( $entrySaved ) {
        $entryData = $entryTable->getEntry( $saveEntryId );
        $entryData->message = "Entry was saved";
    }

    $editorOutput = include_once 'views/admin/editor-html.php' ;
    return $editorOutput;
    
