<?php
    return " <!DOCTYPE html>
    <html>
    <head>
    <title>$pageData->title</title>
   
    $pageData->css
    $pageData->embeddedStyle   
    </head>
    <body>
    $pageData->content
    $pageData->scriptElements
    </body>
    </html>
    ";