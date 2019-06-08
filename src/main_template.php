<!DOCTYPE html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/page.css">
        <title>Pritesh Wadhia | MVC Shopping Cart Demo</title>
    </head>
    <body>
        <div id="main-wrapper">
            <div id="header">
                <h1>Pritesh's Shopping Cart Site</h1>
            </div>
            <?php print $cart_view->renderMsg(); ?>
            <div id="left-right-wrapper"> 
                <div id="right-wrapper">
                    <?php print $cart_view->render(); ?>
                </div>
                <div id="left-wrapper">
                <?php print $products_view->render(); ?>
                </div>
            </div>
            <div id="disclaimer">* All images courtsey of Amazon.co.uk</div>
        </div>
    </body>
</html>
