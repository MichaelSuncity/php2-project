<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
</head>
<body>
<?if ($auth):?>
    <div class ="menu">Добро пожаловать <?=$username?> <a href="/user/logout/"> [Выход]</a></div>
<?else:?>
    <form class ="menu" action="/user/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="pass" placeholder="Пароль">
        Save? <input type='checkbox' name='save'>
        <input type="submit" name="submit" value="Войти">
    </form>
<?endif;?>
<?=$menu?>
<?=$content?>
</body>
</html>