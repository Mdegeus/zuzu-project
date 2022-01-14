<?php

    global $products;


?>

<body>
    <img class="top-logo" src="/public/img/logos/big_logo.svg"/>
    <div class="products-container">
        <h3>Products</h3>
        <?php foreach ($products as $product): ?>
            <div class="product-div">
                <img class="product-image"src="<?= $product->image ?>"/>
                <div class="component">
                    <p class="product-title animate-color"><?= $product->name ?></p>
                    <p class="product-price animate-color">In stock: <?= $product->stock ?></p>
                    <p class="product-price animate-color">€<?= $product->price ?></p>
                    <p class="product-price animate-color">Sold Per: <?= $product->amount ?><?php if ($product->amount == 1) { echo " Piece"; } else { echo " Pieces"; }  ?></p>
                    <p class="product-info"><?= $product->description ?></p>
                    <?php if ($product->stock > 0): ?>
                        <form method="post" class="flex center-right" action="/action/<?= $product->id ?>">
                            <input type="text" hidden name="itemid" value="<?php $product->id ?>"/>
                            <input class="form-input" type="number" name="requestamount" value="1"/>
                            <button type="submit" name="action" value="addToCart" class="button center-right">Add</button>
                        </form>
                    <?php else: ?>
                        <button class="button disabled bottom-right">Unavailable</button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>