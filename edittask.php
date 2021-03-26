<?php
    include_once("functions.php");
    $task_id = $_GET['taskid'];
    $task = get_task_where_id_is_id($task_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>New Task</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>
    <div id="container_new_list">
        <a href="index.php"><i class="fas fa-arrow-left">Back</i></a>
        <form method="post" action="index.php" id="form">
            Name: <input name="update_name_task" type="text" value="<?= $task[0]['name'] ?>" required/><br>
            Time: <input name='update_time_task' type="number" value="<?= $task[0]['time'] ?>" min="1" max="1440" required/></br>
            Info: <textarea name='update_info_task' type="text" required><?= $task[0]['info'] ?></textarea><br>
            Status:<select name="update_task_status">
                <? 
                    $get_all_status = get_status();
                    foreach($get_all_status as $status){?>
                    <option value="<?= $status['id'] ?>"><?= $status['name'] ?></option>
                <? }?>
            <input name="listid" type="hidden" value="<?=$_GET['id']?>" required><br>
            <input type="submit" value="Submit" /> 
        </form>           
    </div>
</body>
</html>