<?php
    global $con;
    
    try{
        $con = new PDO('mysql:host=us-cdbr-iron-east-02.cleardb.net;dbname=heroku_70137967cfc9460', 'b7c8700356c454', '814395c0');
        $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'ERROR!';
        print_r( $e );
    }
?>