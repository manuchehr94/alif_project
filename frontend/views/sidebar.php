
<?php
    include_once __DIR__ . "/../../common/src/Service/CategoryService.php";
?>

<aside class="aside">
    <div class="productCategories divSpaces">
        <h2>Categories</h2>

        <?php foreach (CategoryService::getAllProducts() as $group => $categories) : ?>
        <h3 class="productCategoriesTitle"><?=$group?></h3><br><br>
            <ul>
                <?php foreach ($categories as $category) : ?>
                <li><a href="/?model=product&action=all&category_id=<?=$category['id']?>"><?=$category['title']?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    </div>

    <div class="priceFilter divSpaces">
        <div class="priceFilterRange1">
            <h2>Price Filter</h2>
            <p class="priceFilterRangeText">
                <span id="result-polzunok1"></span>
                <span id="result-polzunok2"></span>
            </p>
            <div id="polzunok"></div>
        </div>
        <p class="priceFilterRange2">
            <form action="" method="GET">
            <input type="hidden" name="model" value="product">
            <input type="hidden" name="action" value="priceFilter">
                <span>From</span>
                <input type="number" id="send-result-polzunok1" value="send-result-polzunok1" name="minPrice" class="priceRange" min="0" max="1100">
                <span>To</span>
                <input type="number" id="send-result-polzunok2" value="send-result-polzunok2" name="maxPrice" class="priceRange" min="1" max="1100">
                <input class="priceFilterSubmit" type ="submit" value="Search">
            </form>
        </p>
    </div>



    <div class="productSizesAndBrands divSpaces">
        <h2>Sizes</h2>
        <ul>
            <li><a href="#">Small</a></li>
            <li><a href="#">Medium</a></li>
            <li><a href="#">Large</a></li>
            <li><a href="#">XLarge</a></li>
        </ul>
    </div>

    <div class="productSizesAndBrands divSpacesSpecial">
        <h2>Brands</h2>
        <ul>
            <li><a href="#">Reebok</a></li>
            <li><a href="#">Adidas</a></li>
            <li><a href="#">Nike</a></li>
            <li><a href="#">Active</a></li>
        </ul>
    </div>
</aside>