<?php /** @var \app\models\Product $product */
$content = "<div class='wrapper' style='display: flex ;justify-content: space-around'>";
foreach ($products as $product) {
    $content .= "<div class='product-wrapper' style='border: 1px solid blue'><h1>$product->name</h1>
<p>$product->description</p></div>";
    }
    $content .= "</div>";
    echo $content;
?>

