<?php
include_once("functions.php");
    $all_list_names = get_lists();
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
        <form method="post" action="index.php" id="form">
            <p>Select list based on name:</p>
            <select name="delete_name_list">
        <?
            foreach($all_list_names as $listname){ ?>   
                <option value="<?= $listname['id'] ?>"><?= $listname['listname'] ?></option>
            <?}
        ?> 
        <input type="submit" value="Submit" />
        </form>
    </div>
</body>
</html>