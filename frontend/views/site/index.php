<?php
include_once __DIR__ . "/../header.php";
?>

<?php for ($k = 0; $k < sizeof($allHotDeals); $k++) : ?>
    <?php if($allHotDeals[$k]['to_main_page'] === '1') : ?>
    <div class="mainProduct">
        <div class="wrapper">
            <div class="featured">
                     <div class="featuredHead">
                        <h1 class="headline"><?=$allHotDeals[$k]['title']?></h1>
                        <p class="subtitle">
                            <?=$allHotDeals[$k]['first_offer']?>
                            <?=($allHotDeals[$k]['second_offer']) ? ' + ' . $allHotDeals[$k]['second_offer'] : '' ?>
                            <?=$allHotDeals[$k]['third_offer'] ? ' + ' . $allHotDeals[$k]['third_offer'] : '' ?>
                        </p>
                        <p class="description">
                            <?=$allHotDeals[$k]['content']?>
                        </p>
                    </div>
                    <div class="priceAndOrder">
                        <p class="price">Price: <?=$allHotDeals[$k]['price']?>$</p>
                        <a href="#"><img class="cart" src="/img/cart.png" alt="cart"></a>
                        <p class="order">Order Now</p>
                    </div>
            </div>
        </div>
    </div>
    <main class="main">
        <div class="wrapper">
            <div class="arrivals">
                <div>
                    <span class="textNew">new</span>
                    <span class="textArrivals">arrivals</span>
                </div>
                <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            </div>
            <div class="recentProducts">
                <?php for ($i = 0; $i < sizeof($allProducts); $i++) : ?>
                <div class="item">
                    <a class="productImg" href="/?model=product&action=view&id=<?=$allProducts[$i]['id']?>">
                        <img alt="photo" src="http://localhost/php/Alif_Academy_php/shop/uploads/products/<?=$allProducts[$i]['picture']?>">
                    </a>
                    <h2 class="trackJacket"><?=$allProducts[$i]['title']?></h2>
                    <p class="productCost"><?=$allProducts[$i]['price']?>$</p>
                </div>
                <?php endfor; ?>
            </div>
            <?php if ($moreContent < $totalProducts): ?>
                <div>
                    <a href="/?model=site&action=index&<?='limit=' . $moreContent?>">
                        <div class="moreProducts">
                            <div class="loadMore"></div>
                            <div class="loadMore"></div>
                            <div class="loadMore"></div>
                        </div>
                    </a>
                </div>
            <?php endif;?>
            <div class="saleAndAdv">
                <div class="saleBox">
                    <div class="saleImg">
                        <span class="saleTitle">Sale</span>
                        <span class="salePercent"><?=$allHotDeals[$k]['sale']?>%</span>
                    </div>
                    <div class="saleAdv">
                        <h1 class="saleAdvTitle"><?=$allHotDeals[$k]['title']?></h1>
                        <p class="saleAdvDescription">
                            <?=$allHotDeals[$k]['first_offer'] . ' + ' . $allHotDeals[$k]['second_offer'] .
                            ' + ' . $allHotDeals[$k]['third_offer'];
                            ?>
                        </p>
                    </div>
                    <div class="saleCartAndPrice">
                        <a href="#"><img src="/img/addToCart.png" alt="Add to cart"></a>
                        <span class="salePrice"><?=$allHotDeals[$k]['price']?></span><!--
                             --><span class="saleCurrency">$</span>
                    </div>
                </div>
                <div class="winterAdv">
                    <div>
                        <span class="winterAdvText1">adv</span>
                        <span class="winterAdvText2">area</span>
                    </div>
                    <p class="winterAdvSize">470 x 100</p>
                </div>
            </div>
            <div class="arrivals">
                <div>
                    <span class="textNew">best</span>
                    <span class="textArrivals">sales</span>
                </div>
                <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            </div>
            <div class="bestSales">
                <div class="bestSalesItem">
                    <div class="bestSalesEverything">
                        <img src="/img/bestProduct.png" alt="product">
                        <div class="nameAndCost">
                            <h2 class="trackJacket">Reebok Track Jacket</h2>
                            <div class ="starsAndCost">
                                <div class="review_stars_wrap">
                                    <div id="review_stars">
                                        <input id="star-4" type="radio" name="stars"/>
                                        <label title="Отлично" for="star-4">
                                            <i class="fas fa-star"></i>
                                        </label>
                                        <input id="star-3" type="radio" name="stars"/>
                                        <label title="Хорошо" for="star-3">
                                            <i class="fas fa-star"></i>
                                        </label>
                                        <input id="star-2" type="radio" name="stars" checked="checked" />
                                        <label title="Нормально" for="star-2">
                                            <i class="fas fa-star"></i>
                                        </label>
                                        <input id="star-1" type="radio" name="stars"/>
                                        <label title="Плохо" for="star-1">
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                                <p class="bestSaleCost">100$</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bestSalesItem">
                    <div class="bestSalesEverything">
                        <img src="/img/bestProduct.png" alt="product">
                        <div class="nameAndCost">
                            <h2 class="trackJacket">Reebok Track Jacket</h2>
                            <div class ="cartAndText">
                                <a href="#"><img src="/img/addToCart.png" alt="cart"></a>
                                <p class="putCartText">add to cart</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bestSalesItem">
                    <div class="bestSalesEverything">
                        <img src="/img/bestProduct.png" alt="product">
                        <div class="nameAndCost">
                            <h2 class="trackJacket">Reebok Track Jacket</h2>
                            <div class ="starsAndCost">
                                <div class="review_stars_wrap">
                                    <div id="review_stars">
                                        <input id="star-4-3" type="radio" name="stars2"/>
                                        <label title="Отлично" for="star-4-3">
                                            <i class="fas fa-star"></i>
                                        </label>
                                        <input id="star-3-3" type="radio" name="stars2" />
                                        <label title="Хорошо" for="star-3-3">
                                            <i class="fas fa-star"></i>
                                        </label>
                                        <input id="star-2-2" type="radio" name="stars2" checked="checked" />
                                        <label title="Нормально" for="star-2-2">
                                            <i class="fas fa-star"></i>
                                        </label>
                                        <input id="star-1-1" type="radio" name="stars2"/>
                                        <label title="Плохо" for="star-1-1">
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                                <p class="bestSaleCost">100$</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    </main>
    <?php endif; ?>
<?php endfor; ?>
<?php
include_once __DIR__ . "/../footer.php";
?>
