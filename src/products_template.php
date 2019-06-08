<div class="product-wrapper">
   <img src="images/<?php print htmlspecialchars($p['img']); ?>" />
    <div><?php print htmlspecialchars($p['name']); ?></div>
    <div><?php print htmlspecialchars($price); ?></div>
    <div><a class="action-button" href="index.php?do=productadd&id=<?php print urldecode($k); ?>">Add to cart</a></div>
</div>

