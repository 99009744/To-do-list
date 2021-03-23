<?php
    include_once("functions.php");
    $name_task = $_POST['name'];
        if($name_task != NULL){
            alert($new_task);
            newList($name_task);
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
    <div id="title">
        <h1>To do list</h1>
    </div>
    <div id="container">
        <div id="optionsbar">
            <a id='new_list' href='newlist.php'>Add new list <i class="fas fa-plus"></i></a>
        </div>
            <?
            $result_lists = get_lists();
            foreach($result_lists as $list){
                echo '<div class="lists">';
                echo '<div class="list_title">';
                echo '<h3>' . $list['listname'] .'</h3>';
                echo '</div>';
            echo '<div class="lists_items">';
            }
                $result_tasks = get_tasks();
                foreach($result_tasks as $task){
                    echo '<div class="task">';
                    echo '<p>Name = ' . $task['name'] . '</p>';
                    echo '<p>Time H/M/S =' . $task['time'] .'</p>' ;
                    echo '<p>Info = ' . $task['info'] .'</p>';
                    echo '</div>';
                    }
                
            echo '</div>';
            ?>
        </div>
    </div>  
    <?
        include_once("footer.php")
    ?>
</body>
</html>
