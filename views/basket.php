<div id = "main">
    <div class="post_title"><h2>Корзина</h2></div>
        <div class="gallery" id = "gallery">
        <?php foreach ($products as $key => $item):?>
            <div class="product">
                <a rel="gallery" class = "photo" href="/product/card/?id=<?=$item['id_prod']?>"><img src="/img/gallery_img/small/<?=$item['id_prod']?>.jpg" /></a>
                <span>Название: <?=$item['name']?></span>
                <div><span>Цена: </span><span id = "price"><?=$item['itemPrice']?></span><span> $</span></div>
                <div><button class="delete" data-id="<?=$item['id_basket']?>">Удалить</button></div>
            </div>
        <?php endforeach; ?>
       </div>
       <p>Общая стоимость корзины: <span id = "total"><?=$total?></span> $</p>
       <div><button class="clearAll">Очистить корзину</button></div><br>
       <form action="../order/MakeOrder" method = "POST">
            <br>
            <input required type = "text" name = "clientName" id = "clientName" placeholder = "Введите Ваше имя" value = "<?=$clientName?>"><br>
            <input required type = "number" name = "phone" id = "phone" placeholder = "Введите номер телефона" value = "<?=$phone?>"><br>
            <div><button class="makeOrder" name = "makeOrder">Оформить заказ</button></div>
        </form>
</div>

<script>
    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', ()=> {
            let id = elem.getAttribute('data-id');
           (async () => {
                const response = await fetch ('/api/deletebasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id,
                    }),
                });
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
                document.getElementById('total').innerText = answer.total;
                elem.parentNode.parentNode.remove();
                console.log(answer);
            })();
        }) 
    })
</script>
<script>
    let button = document.querySelectorAll('.clearAll');
    button.forEach((elem) => {
        elem.addEventListener('click', ()=> {
        console.log('click');
          (async () => {
                const response = await fetch ('/api/clearAllbasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                    }),
                });
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
                document.getElementById('total').innerText = answer.total;
                document.getElementById('gallery').remove();
                console.log(answer);
            })();
        }) 
    })
</script>
