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
    /*
        Every function select
    */
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
    function get_tasks(){
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM taken");
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        return $results;
    }
    function get_status(){
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM status");
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        return $results;
    }
    
    /*
        Every function select by value
    */
    function get_task_where_id_is_id($task_id){
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM taken WHERE id = :id");
        $sql->bindParam(':id', $task_id);
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        return $results;
    }
    function sort_tasks_time(){
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM taken order by time;");
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        header("Location: ".$_SERVER['PHP_SELF']);
    }
    function get_status_name_by_id($id){
            $conn = connect();
            $sql = $conn->prepare("SELECT * FROM status where id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $id = $sql->fetchAll();
            $conn = null;
            return $id;
    }
    function get_tasks_by_id($id){
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM taken where id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        $results = $sql->fetchAll();
        $conn = null;
        return $results;
    }
    function get_tasks_sorted_by_listid($status_select){
            $conn = connect();
            $sql = $conn->prepare("SELECT * FROM taken where statusid = :id");
            $sql->bindParam(':id', $status_select);
            $sql->execute();
            $results = $sql->fetchAll();
            $conn = null;
            unset($_POST);
            return $results;
            
    }
    /*
        Every function with insert
    */
    function create_new_list($name_list){
        $conn = connect();
        $sql = $conn->prepare("INSERT INTO `lijst` (`listname`) VALUES (:name)");
        $sql->bindParam(':name', $name_list);
        $sql->execute();
        $conn = null;
    }
    function create_new_task($name_task,$time_task,$info_task,$listid,$task_status){
        $conn = connect();
        $sql = $conn->prepare("INSERT INTO `taken` (`name`,`info`,`time`,`listid`,`statusid`) VALUES (:name,:info,:time,:listid,:status)");
        $sql->bindParam(':name', $name_task);
        $sql->bindParam(':time', $time_task);
        $sql->bindParam(':info', $info_task);
        $sql->bindParam(':listid', $listid);
        $sql->bindParam(':status', $task_status);
        $sql->execute();
        $conn = null;
    }
    /*
        Every function with delete
    */
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
    /*
        Every function with update
    */
    function move_task($move_task_to_list,$taskid){
        $conn = connect();
        $sql = $conn->prepare("UPDATE `taken` set `listid` = :listid WHERE id = :taskid"); 
        $sql->bindParam(':listid', $move_task_to_list);
        $sql->bindParam(':taskid', $taskid);
        $sql->execute();
        $conn = null;
    }
    function change_list_name($update_list_name,$list_id){
        $conn = connect();
        $sql = $conn->prepare("UPDATE `lijst` set `listname` = :name WHERE id = :id"); 
        $sql->bindParam(':name', $update_list_name);
        $sql->bindParam(':id', $list_id);
        $sql->execute();
        $conn = null;
    }
    function update_task($update_name_task,$update_time_task,$update_info_task,$update_task_status,$update_list_id){
        $conn = connect();
        $sql = $conn->prepare("UPDATE `taken` set `name` = :name,`info` = :info,`time` = :time,`statusid` = :statusid where id = :id");
        $sql->bindParam(':name', $update_name_task);
        $sql->bindParam(':time', $update_time_task);
        $sql->bindParam(':info', $update_info_task);
        $sql->bindParam(':statusid', $update_task_status);
        $sql->bindParam(':id', $update_list_id);
        $sql->execute();
        $conn = null;
    }
    function remove_post(){
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
    ?>