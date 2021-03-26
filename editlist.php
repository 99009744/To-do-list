<?php
    include_once("functions.php");
    $list_id = $_GET["listid"];
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
            Name: <input name="update_name_list" type="text" placeholder="name" required/><br>
            <input name="listid" type="hidden" value="<?=$_GET['listid']?>" required>
            <input type="submit" value="Submit" /> 
        </form>           
    </div>
</body>
</html>