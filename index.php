<?php 
    $sort_value = 0;
    include_once("functions.php");
    include_once("post.php");    
    $get_all_status = get_status();
   
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
                <form method="post" action="<?=$_SERVER['PHP_SELF']?>" id="form">
                    Sort time: <button id="sort_time_btn" type="submit" name="sort_time" value="<?= $sort_value; ?>"><i class="fas fa-arrows-alt-v"></i></button>
                </form>
            </div>
            <div id="sort_status">
                <form method="post" action="<?=$_SERVER['PHP_SELF']?>" id="form">
                    Status:<select name="status_select" id="select_status">
                        <option value="0"> All </option>
                        <?  
                            foreach($get_all_status as $change_status){
                        ?>
                        <option value="<?= $change_status['id'] ?>"><?= $change_status['name'] ?></option>
                        
                    <? }?>
                    <input id="select_status_btn" type="submit" value="Submit" />
                </form>
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
                    if ($status_select != NULL){        // Helps me to check on status of task with the value from a _POST
                        if($status_select == 0 ){       // If its 0 show all tasks
                            $result_tasks = get_tasks();
                        }
                        else{                           // If value is not NULL or 0 use the function to show tasks with a specific status    
                        $result_tasks =  get_tasks_sorted_by_listid($status_select);
                        }
                    }
                    else{
                        if ($sort_value == 0){
                            $result_tasks = get_tasks();
                        }
                        elseif ($sort_value == 1){
                            $result_tasks = sort_tasks_time_asc();
                        }
                        elseif ($sort_value == 2){
                            $result_tasks = sort_tasks_time_desc();
                        }
                    }
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
