<?php 
    
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $row = [];
        while ($row = mysqli_fetch_array($result)){
            $row[] = $row;
        }
        return $row;
    }
?>