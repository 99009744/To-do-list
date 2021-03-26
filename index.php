<?php
    include_once("functions.php");
    include_once("post.php");   
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
                    <h3><?= $list['listname']?> <a class='edit_list' href='editlist.php?listid=<?= $list['id']?>'><i class="fas fa-edit"></i></a></h3>
                    <div class="lists_items">
                        <a id="new_task" href="newtask.php?id=<?= $list['id']?>">Add new task<i class="fas fa-plus"></i></a>
                    
                    <? 
                    $result_tasks = get_tasks(); 
                    foreach($result_tasks as $task){
                        $task_id = $task['statusid'];
                        $id = get_status_name_by_id($task_id);
                        if($task['listid'] == $list['id']){?>
                            <div class="task">
                                <p>Name = <?= $task['name'] ?></p>
                                <p>Time in min = <?=$task['time'] ?></p>
                                <p>Status = <?= $id[0]['name'] ?></p>
                                <p>Info = <?= $task['info'] ?></p>
                                <a id='edit_task' href='edittask.php?taskid=<?= $task['id']?>'><i class="fas fa-edit"></i></a>
                                <a id='move_task' href='movetask.php?taskid=<?= $task['id']?>'><i class="fas fa-arrows-alt-h"></i></a>
                                <a id='remove_list' href='removetask.php?taskid=<?= $task['id']?>'><i class="far fa-trash-alt"></i></a>
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
