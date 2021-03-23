
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

<!--        <ul>-->
<!--            <li><a href="#">Men</a></li>-->
<!--            <li><a href="#">Women</a></li>-->
<!--            <li><a href="#">Children</a></li>-->
<!--            <li><a href="#">Hot deals</a></li>-->
<!--        </ul>-->
    </div>
    <div class="priceFilter divSpaces">
        <!--	<p>
              <label for="amount">Price range:</label>
              <input type="text" id="amount">
            </p>

            <div id="slider-range"></div>
        </div>-->
        <div class="priceFilterRange1">
            <h2>Price Filter</h2>
            <p class="priceFilterRangeText">
                <span>100$</span>
                <span>1000$</span>
            </p>
            <input type="range" min="0" max="1100" value="100" class="slider" id="lower">
            <input type="range" min="0" max="1100" value="1000" class="slider" id="higher">
        </div>
        <p class="priceFilterRange2">
            <span>From</span>
            <input type="text" class="priceRange">
            <span>To</span>
            <input type="text" class="priceRange">
        </p>
    </div>
    <div class="productSizesAndBrands divSpaces">
        <h2>Price Filter</h2>
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