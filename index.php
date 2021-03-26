<?php
    include_once("functions.php");
    
    /*
    Posts for lists
    */
    $delete_list = $_POST['delete_name_list'];
    $name_list = $_POST['name_list'];
    /* 
    Posts fot tasks
    */
    $name_task = $_POST['name_task'];
    $time_task = $_POST['time_task'];
    $info_task = $_POST['info_task'];
    $listid = $_POST['listid'];
    $taskid = $_POST['taskid'];
    $move_task_to_list = $_POST['movetolist'];
    if($name_task != NULL){
        create_new_task($name_task,$time_task,$info_task,$listid);
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
    if($name_list != NULL){
        create_new_list($name_list);
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
    if($delete_list != NULL){
        delete_list($delete_list);
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
    if($move_task_to_list != NULL){
        move_task($move_task_to_list,$taskid);
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>To do list</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

</head>
<body>
<?= $name ?>
    <div id="title">
        <h1>To do list</h1>
    </div>
    <div id="container">
        <div id="optionsbar">
            <a id='new_list' href='newlist.php'>Add new list <i class="fas fa-plus"></i></a>
            <a id='remove_list' href='removelist.php'>Remove a list <i class="far fa-trash-alt"></i></a>
            <div id="sort_taks">
                <p id="time_name">Sort time:</p> 
                <button id="time_button" onclick="sort_tasks_time()"><i class="fas fa-arrows-alt-v"></i></button>
                
            </div>
        </div>
        <?
        $result_lists = get_lists();
        foreach($result_lists as $list){?>
            <div class="lists">
                <div class="list_title">
                    <h3><?= $list['listname']?></h3>
                    <div class="lists_items">
                        <a id="new_task" href="newtask.php?id=<?= $list['id']?>">Add new task<i class="fas fa-plus"></i></a>
                    
                    <? $result_tasks = get_tasks();
                    foreach($result_tasks as $task){ 
                        if($task['listid'] == $list['id']){?>
                            <div class="task">
                                <p>Name = <?= $task['name'] ?></p>
                                <p>Time H/M/S = <?=$task['time'] ?></p>
                                <p>Info = <?= $task['info'] ?></p>
                                <a id='remove_list' href='removetask.php?taskid=<?= $task['id']?>'><i class="far fa-trash-alt"></i></a>
                                <a id='move_task' href='movetask.php?taskid=<?= $task['id']?>'><i class="fas fa-arrows-alt-h"></i></a>
                        </div>
                        <? }
                    } ?>
                    </div>
                </div>
            </div>
        <? } ?>
    </div>  
    <?
        include_once("footer.php")
    ?>
</body>
</html>
