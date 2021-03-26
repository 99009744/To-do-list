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
        $sql = $conn->prepare("SELECT 'listname' FROM lijst");
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        return $results;
    }
    function get_lists_where_id_is_id($task_id){
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM taken WHERE id = :id");
        $sql->bindParam(':id', $task_id);
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
    function create_new_list($name_list){
        $conn = connect();
        $sql = $conn->prepare("INSERT INTO `lijst` (`listname`) VALUES (:name)");
        $sql->bindParam(':name', $name_list);
        $sql->execute();
        $conn = null;
    }
    function create_new_task($name_task,$time_task,$info_task,$listid){
        $conn = connect();
        $sql = $conn->prepare("INSERT INTO `taken` (`name`,`info`,`time`,`listid`) VALUES (:name,:info,:time,:listid)");
        $sql->bindParam(':name', $name_task);
        $sql->bindParam(':time', $time_task);
        $sql->bindParam(':info', $info_task);
        $sql->bindParam(':listid', $listid);
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
        $sql = $conn->prepare("DELETE FROM `lijst` WHERE id = :listid");
        $sql->bindParam(':listid', $delete_list);
        $sql->execute();
        $conn = null;
    }
    function delete_task($task_id){
        $conn = connect();
        $sql = $conn->prepare("DELETE FROM `taken` WHERE id = :taskid");
        $sql->bindParam(':taskid', $task_id);
        $sql->execute();
        $conn = null;
    }
    function move_task($move_task_to_list,$taskid){
        $conn = connect();
        $sql = $conn->prepare("UPDATE `taken` set `listid` = :listid WHERE id = :taskid"); 
        $sql->bindParam(':listid', $move_task_to_list);
        $sql->bindParam(':taskid', $taskid);
        $sql->execute();
        $conn = null;
    }
    ?>