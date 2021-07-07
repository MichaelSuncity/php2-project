<?if ($admin or $allow):?>
<div id = "main">
    <div class="post_title" id = "orderBasket" data-id="<?=$id?>"><h2>Корзина заказа № <?=$id?></h2></div>
        <div class="gallery">
        <?php foreach ($catalog as $key => $item):?>
            <div class="product">
                <a rel="gallery" class = "photo" href="/product/card/?id=<?=$item['id_prod']?>"><img src="/img/gallery_img/small/<?=$item['id_prod']?>.jpg" /></a>
                <span>Название: <?=$item['name']?></span>
                <span>Цена: <?=$item['itemPrice']?> $</span>
            </div>
        <?php endforeach; ?>
       </div>
        <div>
            <div>Имя заказчика: <?=$clientName?></div>
            <div>Телефон: <?=$phone?></div>
            <div>Статус заказа: <span id="statusOrder"><?=$statusOrder?></span></div>
            <div>Общая стоимость корзины: <span id = "total"><?=$total?></span> $</div>
        </div>
        <br>
        <?if ($admin):?>
        <div>
            <select id="status" name = "sign">
                    <option value = "Заказ оформлен">Заказ оформлен</option>
                    <option value = "В работе">В работе</option>
                    <option value = "Оплачен">Оплачен</option>
                    <option value = "Обработан">Обработан</option>
            </select>
            <button class="buttonStatus">Изменить статус заказа</button>
        </div><br>
        <?endif;?>
        <div>
            <a href="/order/">Назад</a>
        </div>
</div>
<?else:?>
<div id = "main">
    <div class = "post_title"><h2>Страница не найдена</h2></div>
</div>
<?endif;?>

<script>
    let id = document.getElementById('orderBasket').getAttribute('data-id');
    let button = document.querySelectorAll('.buttonStatus');
    button.forEach((elem) => {
        elem.addEventListener('click', ()=> {
            let statusOrder = document.getElementById('status').value;
            //console.log('click', id, statusOrder);
            (async () => {
                const response = await fetch('/api/changeorderstatus/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id,
                        statusOrder: statusOrder
                    }),
                });
                const answer = await response.json();
                document.getElementById('statusOrder').innerText = answer.status;
            })();
        })
    })

</script>
