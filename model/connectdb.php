<?php
    function connectdb(){
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=mrk", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        } catch(PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }

    function get_all($sql){
        $conn = connectdb();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $list = $stmt->fetchAll();
        $conn = null;
        return $list;
    }

    function get_one($sql){
        $conn = connectdb();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $list = $stmt->fetch();
        $conn = null;
        return $list;
    }

    function update($sql){
        $conn = connectdb();
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
    }
    function delete($sql){
        $conn= connectdb();
        $conn->exec($sql);
    }
?>