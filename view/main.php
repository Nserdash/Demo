<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    foreach($users as $user) {
        echo $user->login.'<br>';        
        echo $user->password.'<br><br>';
    }
    ?>

    <form action = "/reg" method = "post">
    <input name = "login">
    <input name = "password">
    <input name = "id" value = "10">
    <input type = "submit" name = "123">
    </form>
</body>
</html>
