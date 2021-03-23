<?php
    function connect(){
        $dbservername = "localhost";
        $username = "mitchell";
        $password = "w8Z6NiSLuwljtKjR";
        $dbname = "todolist";
        $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo "Connected successfully";
            return $conn;
    }
    function get_lists(){
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM lijst");
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        return $results;
    }
    function get_tasks(){
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM taken");
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        return $results;
    }
    function get_tasks_order_by_time($conn){
        $sql = $conn->prepare("SELECT * FROM taken order by time;");
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        return $results;
    }
    function newList($name_task){
        $conn = connect();
        $insert = $conn->prepare("INSERT INTO `lijst` (`listname`) VALUES (:name)");
        $insert->bindParam(':name', $name_task);
        $insert->execute();
        $conn = null;
    }
    ?>