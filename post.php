<?php
    /*
    Posts for lists
    */
    $delete_list = $_POST['delete_name_list'];
    $name_list = $_POST['name_list'];
    $update_list_name = $_POST['update_name_list'];
    $list_id = $_POST['listid'];
    /* 
    Posts for tasks
    */
    $name_task = $_POST['name_task'];
    $time_task = $_POST['time_task'];
    $info_task = $_POST['info_task'];
    $task_status = $_POST['task_status'];
    $update_name_task = $_POST['update_name_task'];
    $update_time_task = $_POST['update_time_task'];
    $update_info_task = $_POST['update_info_task'];
    $update_list_id = $_POST['update_list_id'];
    $update_task_status = $_POST['update_task_status'];
    $listid = $_POST['listid'];
    $taskid = $_POST['taskid'];
    $move_task_to_list = $_POST['movetolist'];
    $sort_time = $_POST['sort_time'];
    /*
        Posts for status
    */

    $status_select = $_POST['status_select'];

    function remove_post(){
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
    
    if($name_task != NULL){
        create_new_task($name_task,$time_task,$info_task,$listid,$task_status);
        remove_post();
    }
    if($name_list != NULL){
        create_new_list($name_list);
        remove_post();
    }
    if($delete_list != NULL){
        delete_list($delete_list);
        remove_post();
    }
    if($move_task_to_list != NULL){
        move_task($move_task_to_list,$taskid);
        remove_post();
    }
    if ($update_list_name != NULL){
        change_list_name($update_list_name,$list_id);
        remove_post();
    }
    if($update_name_task != NULL){
        update_task($update_name_task, $update_time_task, $update_info_task, $update_task_status,$update_list_id);
        remove_post();
    }
    if($sort_time != NULL){
        if ($sort_time == 0){
            $sort_value = 1;
        }
        elseif ($sort_time == 1){
            $sort_value = 2;
            
        }
        elseif ($sort_time == 2){
            $sort_value = 0;
        }

    }
?>