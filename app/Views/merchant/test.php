<!DOCTYPE html>
<html>
<head>
    <title>Merchant Test</title>
</head>
<body>
    <h1>Product List</h1>

    <?php if (isset($products) && !empty($products)): ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <li><?php echo $product->nama; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</body>
</html>
