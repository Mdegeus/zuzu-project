<?php

    global $orders;
    global $shoppingcart;

?>

<body>
    <div class="products-container">
    
        <h3>Shoppingcart: </h3>

        <?php foreach ($shoppingcart as $productID): ?>
            <?php $product = GetProduct($productID) ?>
            <div class="product-shoppingcart shoppingcart-list-item">
                <p><?= $product->name ?></p>
                <p class="product-price shoppingcart-list-item">€<?= $product->price ?></p>
            </div>
        <?php endforeach; ?>

        <div class="product-shoppingcart shoppingcart-list-item">
            <p>Total Price:</p>
            <p class="product-price shoppingcart-list-item">€<?= GetTotalShopingCart(); ?></p>
        </div>

        <br>

        <form action="action" method="post">
            <button class="order-button" type="submit" name="action" value="placeOrder">Place Order</button>
        </form>
        
        <h3>Previous Orders:</h3>

        <?php foreach ($orders as $order): ?>

            <div class="new-order shoppingcart-list-item">
                    <p>Order id: <?= $order->id ?></p>
            </div>

            <?php $order = GetOrder($order->id); ?>

            <?php foreach ($order as $product): ?>
                <div class="product-shoppingcart shoppingcart-list-item">
                    <p><?= $product->name ?></p>
                    <p class="product-price shoppingcart-list-item">€<?= $product->price ?></p>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
        
    </div>



</body>