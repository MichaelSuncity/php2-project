<?
/**
 * @var app\models\Product $product
 */
?>



<div id="main">
    <img class="bigimage" src="/img/gallery_img/big/<?=$product->id?>.jpg" alt="">
    <span>Название товара: <?=$product->name?></span><br>
    <span>Описание товара: <?=$product->description?></span><br>
    <span>Цена: <?=$product->price?> $</span><br><br>
</div>
