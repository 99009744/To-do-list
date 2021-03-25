<?php
    include_once("functions.php");
    $name_task = $_POST['name'];
    $delete_list = $_POST['delete_name_list'];
    if($name_task != NULL){
        newList($name_task);
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
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
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
                        <a id="new_task" href="newtask.php">Add new task<i class="fas fa-plus"></i></a>
                        
                    </div>
                    <? $result_tasks = get_tasks();
                    foreach($result_tasks as $task){ ?>
                        <div class="task">
                            <p>Name = <?= $task['name'] ?></p>
                            <p>Time H/M/S =<?=$task['time'] ?></p>
                            <p>Info =<?= $task['info'] ?></p>
                        </div>
                    <? } ?>
                </div>
            </div>
        <? } ?>
    </div>  
    <?
        include_once("footer.php")
    ?>
</body>
</html>
