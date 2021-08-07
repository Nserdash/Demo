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
    <a href = "/exit">Выход</a>
</body>
</html>
