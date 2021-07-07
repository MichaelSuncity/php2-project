<div class = "menu">
    <a href="/"> Главная </a>
    <a href="/product/catalog"> Каталог </a>
    <a href="/basket/"> Корзина <span id = "count"><?=$count?></span> </a>
    <?if ($admin):?>
    <a href="/order/"> Заказы </a>
    <?endif;?>
    <?if ($auth && !$admin):?>
        <a href="/order/">Мои заказы </a>
    <?endif;?>
    <?if (!$auth):?>
        <a href="/user/">Регистрация</a>
    <?endif;?>
</div>