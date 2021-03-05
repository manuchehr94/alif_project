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
                        <img src="/img/1.png" alt="inverted product">
                    </div>
                    <div class="productSecondImg">
                        <img src="/img/2.png" alt="panty product">
                    </div>
                    <div class="productThirdImg">
                        <img src="/img/3.png" alt="small product">
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
                            <a class="increaseQunatity" href="#"><span>+</span></a>
                            <span class="quantity">3</span>
                            <a  class="decreaseQunatity" href="#"><span>-</span></a>
                        </p>
                    </div>
                </div>
                <div class="priceImgOrder">
                    <p>Price:<?=$oneProduct['price']?>$</p>
                    <div class="shareAndOrder">
                        <div class="shareCartLike">
                            <a href="#"><img src="/img/share.png" alt="share"></a>
                            <a href="#"><img src="/img/cart_.png" alt="add to cart"></a>
                            <a href="#"><img src="/img/like.png" alt="put like"></a>
                        </div>
                        <form action="/?model=basket&action=addProduct" method="POST">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="product_id" value="<?=$oneProduct['id']?>">
                            <button class="orderNow">Order Now</button>
                        </form>
                    </div>
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