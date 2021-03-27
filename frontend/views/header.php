<?php
    include_once __DIR__ . "/../../common/src/Service/UserService.php";
    include_once __DIR__ . "/../../common/src/Service/BasketDBService.php";
    include_once __DIR__ . "/../../common/src/Service/ProductService.php";

    $currentUser = UserService::getCurrentUser();
    $basketDetails = (new ProductService())->getBasketItems(BasketDBService::defineBasketDetails());
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop_Mukhidinov</title>
    <link rel="stylesheet" type="text/css" href="/css/stars/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="/css/stars/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/shop-style.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/jquery.ui.touch-punch.min.js"></script>
    <script src="/js/script.js"></script>
</head>
<body>
<header>
    <div class="wrapper">
        <div class="getInTouch">
            <div class="contacts">
                <div class="headerEmailImg">
                    <img src="/img/email.png" alt="mail">
                    <h2>info@shopу.com</h2>
                </div>
                <div class="headerPhoneImg">
                    <img src="/img/phone.png" alt="phone">
                    <h2>453 &ndash; 5553 &ndash; 996</h2>
                </div>
            </div>
            <div class="social">
                <a href="#"><img src="/img/facebook.png" alt="facebook"></a>
                <a href="#"><img src="/img/twitter.png" alt="twitter"></a>
                <a href="#"><img src="/img/google.png" alt="google"></a>
                <a href="#"><img src="/img/instagram.png" alt="instagram"></a>
            </div>
        </div>
        <div class="bigHeader">
            <div class="logo">
                <div class="logoShopy">
                    <span>sh</span>
                    <a href="/"><img src="/img/logo.png" alt="logo" title="logo"></a>
                    <span class="py">py</span>
                </div>
                <h2 class="shopAnyWhere">shop any where</h2>
            </div>
            <nav class="navMenu">
                <div class="menuToggle">Menu</div>
                <ul class="menu">
                    <li><a href="/">Home</a></li>
                    <li><a href="?model=product&action=all">Products</a><li>
                    <li><a href="#">Hot deals</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            <div class="searchUserCart righted">
                <div class="productSearch">
                    <form>
                        <input class="productSearchInput" type="text" placeholder="Search">
                        <img class="searchIcon" src="/img/search.png" alt="search" title="search" aria-hidden="true">
                    </form>
                </div>
                <div class="currentUser">
                <?=!empty($currentUser['login']) ? '<div>Hello, ' . $currentUser['login'] . '!</div>' .
                    '<div class="signOut"><a href="/?model=auth&action=logout">Sign out</a></div></div>' :
                    '<a class="linkToUser" href="/?model=site&action=login"><img  src="/img/user.png" alt="user" title="user"></a>'
                ?>
                <?=!empty($currentUser['login']) ?
                    '<div class="cartAndDetails">
                        <a class="cartItems" href="?model=basket&action=view">
                            <img src="/img/cart_items.png" alt="cart" title="cart">
                        </a>' .
                        '<span>' . sizeof($basketDetails['items'] ?? []) .
                        '</span>
                    </div>'
                    : ''
                ?>
            </div>
        </div>
    </div>
</header>