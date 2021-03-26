<?php
    include_once("functions.php");
    $task_id = $_GET['taskid'];
    $lists = get_lists();
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
            <p>Select to wich list you want to move:</p>
            <select name="movetolist">
            <? foreach($lists as $list){?>
                <option value="<?= $list['id'] ?>"><?= $list['listname'] ?></option>
            <? }?>
            <input name="taskid" type="hidden" value="<?= $task_id?>" />
            <input type="submit" value="Submit" />
        </form>           
    </div>
</body>
</html>