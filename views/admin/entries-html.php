    <?php
        if( isset( $allEntries ) === false ) {
            trigger_error('views/admin/entries-html.php needs $allEntries');
        }
        $entriesAsHtml = "<ul>";
        while ( $entry = $allEntries->fetchObject()){
            $href = "admin.php?page=editor&amp;id=$entry->entry_id";
            $entriesAsHtml .= "<li><a href='$href'>$entry->title</a></li>";
        }
        $entriesAsHtml .= "</ul>";
        return $entriesAsHtml;