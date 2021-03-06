<?php
include_once __DIR__ . "/../header.php";
?>

<div class="detailsOFProduct">
    <div class="wrapper">
        <div class="productShow">
            <div class="productPhotos">
                <div class="bigProductImg">
                    <img src="http://localhost/php/Alif_Academy_php/shop/uploads/products/<?=$oneProduct['picture']?>" alt="Big photo of the product">
                </div>
                <div class="smallView">
                    <div class="productFirstImg">
                        <img style="max-width: 42px; max-height: 48px" src="http://localhost/php/Alif_Academy_php/shop/uploads/products/<?=$oneProduct['picture']?>" alt="inverted product">
                    </div>
                    <div class="productSecondImg">
                        <img style="max-width: 42px; max-height: 48px" src="http://localhost/php/Alif_Academy_php/shop/uploads/products/<?=$oneProduct['picture']?>" alt="inverted product">
                    </div>
                    <div class="productThirdImg">
                        <img style="max-width: 42px; max-height: 48px" src="http://localhost/php/Alif_Academy_php/shop/uploads/products/<?=$oneProduct['picture']?>" alt="inverted product">
                    </div>
                </div>
            </div>
            <div class="productDetails">
                <div class="featuredHeadProduct">
                    <h1 class="headline"><?=$oneProduct['title']?></h1>
                    <p class="subtitle"><?=$oneProduct['preview']?></p>
                    <p class="description">
                        <?=$oneProduct['content']?>
                    </p>
                </div>
                <div class="sizeAndQuantity">
                    <div class="sizesForProduct">
                        <span class="chooseSizeText">Choose size</span>
                        <div class="chooseSize">
                            <span>s</span> -
                            <span>m</span> -
                            <span>l</span> -
                            <span>xl</span>
                        </div>
                    </div>
                    <div class="chooseQunatity">
                        <span class="chooseQunatityText">Choose quantity</span>
                        <p>
                            <button class="increaseQunatity"><span>+</span></button>
                            <span class="quantity">1</span>
                            <button class="decreaseQunatity"><span>-</span></button>
                        </p>
                    </div>
                </div>
                <div class="priceImgOrder">
                    <p>Price:<?=$oneProduct['price']?>$</p>
                    <form action="/?model=basket&action=addProduct" method="POST">
                        <div class="shareAndOrder">
                            <div class="shareCartLike">
                                <a href="#"><img src="/img/share.png" alt="share"></a>
                                <button class="cartIcon"><img src="/img/cart_.png" alt="add to cart"></button>
                                <a href="#"><img src="/img/like.png" alt="put like"></a>
                                <input type="hidden" name="quantity" value="1" class="productQuantity">
                                <input type="hidden" name="product_id" value="<?=$oneProduct['id']?>">
                                <button class="orderNow">Order Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="main">
    <div class="wrapper">
        <div class="products">
            <div>
                <span class="textRelated">related</span>
                <span class="textProducts">products</span>
            </div>
            <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        </div>
        <div class="recentProducts">
            <?php for ($i = 0; $i < 4; $i++) : ?>
                <div class="item">
                    <a class="productImg" href="/?model=product&action=view&id=<?=$allProducts[$i]['id']?>">
                        <img alt="photo" src="http://localhost/php/Alif_Academy_php/shop/uploads/products/<?=$allProducts[$i]['picture']?>">
                    </a>
                    <h2 class="trackJacket"><?=$allProducts[$i]['title']?></h2>
                    <p class="productCost"><?=$allProducts[$i]['price']?>$</p>
                </div>
            <?php endfor; ?>
           <!--
            <div class="item">
                <a class="productImg" href="#"><img src="/img/Product2.png" alt="photo"></a>
                <h2 class="trackJacket">Reebok Track Jacket</h2>
                <p class="productCost">100$</p>
            </div>
            <div class="item">
                <a class="productImg" href="#"><img src="/img/Product1.png" alt="photo"></a>
                <h2 class="trackJacket">Reebok Track Jacket</h2>
                <p class="productCost">100$</p>
            </div>
            <div class="item">
                <a class="productImg" href="#"><img src="/img/Product4.png" alt="photo"></a>
                <h2 class="trackJacket">Reebok Track Jacket</h2>
                <p class="productCost">100$</p>
            </div>-->
        </div>
    </div>
</main>

<?php
include_once __DIR__ . "/../footer.php";
?>