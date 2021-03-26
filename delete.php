<?php
    include_once("functions.php");
    $task_id = $_GET['id'];
    delete_task($task_id);
    header("Location: index.php");
    exit;
?>
