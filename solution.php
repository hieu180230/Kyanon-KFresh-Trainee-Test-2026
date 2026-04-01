<?php
class Product {
    public $id;
    public $name;
    public $price;
    public $category;

    public function __construct($id, $name, $price, $category) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }
}

// Create a list of at least 5 products. 
$products = [
    new Product(1, "Mechanical Keyboard", 150.00, "Electronics"),
    new Product(2, "Gaming Mouse", 80.00, "Electronics"),
    new Product(3, "Ergonomic Chair", 300.00, "Furniture"),
    new Product(4, "Standing Desk", 450.00, "Furniture"),
    new Product(5, "Artisan Coffee Beans", 20.00, "Groceries")
];

// Filter by category.
function filterProductsByCategory($products, $categoryName) {
    return array_filter($products, function($product) use ($categoryName) {
        return $product->category === $categoryName;
    });
}

// Apply discount and RETURN A NEW LIST.
function applyDiscount($products, $percent) {
    $discountedProducts = [];
    $discountFactor = 1 - ($percent / 100);

    foreach ($products as $product) {
        $newPrice = $product->price * $discountFactor;
        
        $discountedProducts[] = new Product(
            $product->id, 
            $product->name, 
            $newPrice, 
            $product->category
        );
    }
    
    return $discountedProducts;
}

// --- Execution & Testing ---
echo "--- 1. Filtered by 'Electronics' ---\n";
$electronics = filterProductsByCategory($products, "Electronics");
print_r($electronics);

echo "\n--- 2. Applied 10% Discount to all products ---\n";
$discounted = applyDiscount($products, 10);
print_r($discounted);

echo "\n--- 3. Original Products Check ---\n";
echo "It' magic.\n";
print_r($products[0]); 

?>