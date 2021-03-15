<?php
    include_once __DIR__ . "/../header.php";
?>

<section class="section">
    <div class="wrapper">
        <div class="mainContentOfProducts">

            <!--sidebar -->
            <?php include_once __DIR__ . "/../sidebar.php"; ?>
            <!--sidebar -->

            <div class="allProductsAndMore">
                <div class="allProducts">
                    <?php for ($i = 0; $i < sizeof($allProducts); $i++) : ?>
                    <div class="item">
                        <a class="productImg" href="/?model=product&action=view&id=<?=$allProducts[$i]['id']?>">
                            <img alt="photo" src="http://localhost/php/Alif_Academy_php/shop/uploads/products/<?=$allProducts[$i]['picture']?>">
                        </a>
                        <h2 class="trackJacket"><?=$allProducts[$i]['title']?></h2>
                        <p class="productCost"><?=$allProducts[$i]['price']?>$</p>
                    </div>
                    <?php endfor; ?>
                  <!-- <div class="item">
                        <a class="productImg" href="#"><img src="/img/Product3.png" alt="photo"></a>
                        <h2 class="trackJacket orangeColor">Reebok Track Jacket</h2>
                        <p class="productSizes">sizes: s-m-l-xl</p>
                        <div class="varianOfProducts">
                            <div class="good productColor1"></div>
                            <div class="good productColor2"></div>
                            <div class="good productColor3"></div>
                            <div class="good productColor4"></div>
                        </div>
                        <div class="productIcons">
                            <a class="shareIcon" href="#"><img src="/img/share.png" alt="share"></a>
                            <a class="cartIcon" href="#"><img src="/img/addToCart.png" alt="addToCart"></a>
                            <a class="likeIcon" href="#"><img src="/img/like.png" alt="putLike"></a>
                        </div>
                    </div>-->
                </div>

                <?php if ((isset($_GET['category_id']) && ($leftProducts > $limit)) ||
                        (!isset($_GET['category_id']) && ($moreContent < $totalProducts))): ?>
                <div>
                    <a href="/?model=product&action=all&<?=isset($_GET['category_id']) ?
                        'category_id=' . $_GET['category_id'] . '&limit=' . $moreContent : 'limit=' . $moreContent?>">
                        <div class="moreProducts2">
                            <div class="loadMore"></div>
                            <div class="loadMore"></div>
                            <div class="loadMore"></div>
                        </div>
                    </a>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>

<section class="section2">
    <div class="wrapper">
        <div class="newsAndJoin">
            <div class="newsAndJoinBackground">
                <div class="newsText">
                    <span class="newsTitle">news letter</span>
                    <span class="newsDescription">join us now to get all news and special offer</span>
                </div>
                <div class="emailAndJoin">
                    <div class="email">
                        <img src="/img/email.png" alt="e-mail"><!--
									--><input class="inputEmail" type="email" placeholder="type your email here"/>
                    </div>
                    <a class="joinUs" href="#">
                        <span>join us</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once __DIR__ . "/../footer.php";
?>