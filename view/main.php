<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>Логин</th>
            <th>Пароль</th>            
        </thead>
    <?php     
    echo (isset($error)) ? $error : "";
    foreach($users as $user) {
        echo $user->login;
    }
    ?>
    </table>

    <form action = "/reg" method = "post">
    <input name = "login">
    <input name = "password">    
    <input type = "submit" name = "123">
    </form>

</body>
</html>
