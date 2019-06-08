<div class="cart-item-wrapper">
    <div class="cart-item-left">
        <div>
            Name:
        </div>
        <div>
            Price:
        </div>
        <div>
            Quantity:
        </div>
        <div>
            Total:
        </div>
    </div>
    <div class="cart-item-right">
        <div>
            <?php print htmlspecialchars($p['name']); ?>
        </div>
        <div>
             <?php print htmlspecialchars($price); ?>
        </div>
        <div>
             <?php print htmlspecialchars($v['quantity']); ?>
        </div>
        <div>
            <?php print htmlspecialchars($total); ?>
        </div>
    </div>  
     <a class="action-button" href="index.php?do=productremove&id=<?php print urldecode($k); ?>">Remove</a>
</div>