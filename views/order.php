<?if ($admin or $auth):?>
<div id = "main">
    <div class = "post_title"><h2>Заказы</h2></div>
    <?php foreach ($orders as $item):?>
        <div class="order">
        <a  href="/order/catalogOrder/?id=<?=$item['id']?>">Заказ № <?=$item['id']?> Имя заказчика: <?=$item['clientName']?> телефон:<?=$item['phone']?>.</a><br>
                Статус заказа: <?=$item['statusOrder']?><br>
                Общая стоимость корзины: <span id = "total"><?=$item['total']?></span> $
        </div><br>
    <?php endforeach; ?>
</div>
<?else:?>
<div id = "main">
    <div class = "post_title"><h2>Страница не найдена</h2></div>
</div>
<?endif;?>
