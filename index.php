<?php
    include_once("dblink.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
</head>
<body>
    <div id="title">
        <h1>To do list</h1>
    </div>
    <div id="container">
        <div id="new_title" class="list_title" style="grid-row: 1/2; grid-column: 1/2;">
        <h3>NEW</h3>
        </div>
        <div id="new" class="lists" style="grid-row: 2/3; grid-column: 1/2;">
        </div>
        <div id="started_title" class="list_title"style="grid-row: 1/2; grid-column: 2/3;">
        <h3>STARTED</h3>
        </div>
        <div id="started" class="lists"style="grid-row: 2/3; grid-column: 2/3;">
        </div>
        <div id="completed_title" class="list_title" style="grid-row: 1/2; grid-column: 3/4;">
        <h3>COMPLETED</h3>
        </div>
        <div id="completed" class="lists" style="grid-row: 2/3; grid-column: 3/4;">
        </div>
    </div>  
    <?
        include_once("footer.php")
    ?>
</body>
</html>