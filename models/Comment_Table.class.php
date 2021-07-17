<?php
    include_once "models/Table.class.php";

    class Comment_Table extends Table {
        public function saveComment ( $entryId, $author, $txt ) {
            $sql = "INSERT INTO comment ( entry_id, author, txt )
                    VALUES ( ?, ?, ?)";
            $data = array( $entryId, $author, $txt );
            $statement = $this->makeStatement( $sql, $data );
            return $statement;
        }

        public function getAllById ( $id ) {
            $sql = "SELECT author, txt, date FROM comment
                    WHERE entry_id = ?
                    ORDER BY comment_id DESC";
            $data = array( $id );
            $statement = $this->makeStatement($sql,$data);
            return $statement;
        }

        public function deleteByEntryId( $id ) {
            $sql = "DELETE FROM comment WHERE entry_id = ?";
            $data = array( $id );
            $statement = $this->makeStatement( $sql, $data);
        }

    }

    // class Comment_Table {
    //     private $db;
    //     public function __construct ( $db ) {
    //         $this->db = $db;
    //     }

    //     private function makeStatement ( $sql, $data = NULL ) {
    //         $statement = $this->db->prepare( $sql );
    //         try {
    //             $statement->execute( $data );
    //         } catch ( Exception $e) {
    //             $exceptionMessage = "<p> You tried run this sql : $sql </p>
    //                                 <p> Exeception: $e </p>";
    //             trigger_error($exceptionMessage);
    //         }
    //         return $statement;
    //     }
    // }