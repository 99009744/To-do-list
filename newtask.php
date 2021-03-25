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
            Name: <input name="name" type="text" placeholder="name" required/><br>
            Time: <input id='time' type="time" placeholder="name" required/></br>
            Info: <textarea id='info' type="text" placeholder="info" required></textarea><br>
            <input type="submit" value="Submit" /> 
        </form>           
    </div>
</body>
</html>