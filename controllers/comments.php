<?php

include_once "models/Comment_Table.class.php";  
$commentTable = new Comment_Table($db);

$newCommentSubmitted = isset( $_POST['new-comment']);
if ( $newCommentSubmitted ) {
    $whichentry = $_POST['entry-id'];
    $user = $_POST['user-name'];
    $comment = $_POST['new-comment'];
    $commentTable->savecomment( $whichentry, $user, $comment );
}

$comments = include_once "views/comment-form-html.php";
$allComments = $commentTable->getAllById( $entryId );
$comments .= include_once "views/comments-html.php";
return $comments;