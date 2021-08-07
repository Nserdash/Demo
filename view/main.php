<?php include 'layouts/header.php' ?>
    <h1>Добро пожаловать, <?=$_SESSION['login']?>!</h1>
    <table>
        <thead>
            <th>Логин</th>
            <th>Пароль</th>            
        </thead>
    <?php     
    echo (isset($error)) ? $error : "";
    foreach($users as $user) {
        echo "<tr><td>".$user->login."</td></tr>";
    }
    ?>
    </table>
    <a href = "/exit">Выход</a>

<?php include 'layouts/footer.php' ?>