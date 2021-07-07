<?php foreach ($catalog as $key => $item):?>
    <div class="product">
        <a rel="gallery" class = "photo" href="/product/card/?id=<?=$item['id']?>"><img src="/img/gallery_img/small/<?=$item['id']?>.jpg" /></a>
        <span>Название: <?=$item['name']?></span>
        <span>Цена: <?=$item['price']?> $</span>
        <button class="buy" data-id="<?=$item['id']?>">Купить</button>
    </div>
<?php endforeach; ?>
