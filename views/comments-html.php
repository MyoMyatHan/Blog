<?php
    $commetsFound = isset( $allComments );
    if ( $commetsFound === false ){
        trigger_error('views/comments-html.php needs $allComments');
    }
    $allCommentsHTML = "<ul id= 'comments'>";
    while ( $commentData = $allComments->fetchObject()){
        $allCommentsHTML .= "</li>
        $commentData->author wrote:
        <p>$commentData->txt</p>
        </li>";
    }
        $allCommentsHTML .= "</ul>";
        return $allCommentsHTML;
    