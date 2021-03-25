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
    function get_lists_names(){
        $conn = connect();
        $sql = $conn->prepare("SELECT listname FROM lijst");
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
        $sql = $conn->prepare("INSERT INTO `lijst` (`listname`) VALUES (:name)");
        $sql->bindParam(':name', $name_task);
        $sql->execute();
        $conn = null;
    }
    function sort_tasks_time(){
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM taken order by time;");
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
    }
    function delete_list($delete_list){
        $conn = connect();
        $sql = $conn->prepare("DELETE FROM `lijst` WHERE listname = :listname");
        $sql->bindParam(':listname', $delete_list);
        $sql->execute();
        $conn = null;
    }
    ?>