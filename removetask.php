<?php
include_once("functions.php");
    $task_id = $_GET['taskid'];
?><!DOCTYPE html>
<html lang="en">
<head>
<title>Remove list</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>
    <div id="container_new_list">
        <a href="index.php"><i class="fas fa-arrow-left">Back</i></a>
        <p>Do you want to delete this task?</p>
    <button id="delete_task" onclick="delete_task(<?= $task_id ?>)">YES</button>
    </div>
</body>
</html>