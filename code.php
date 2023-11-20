<?php

// Add minimum price or price range to single product
function display_min_price_or_range() {
    global $product;

    // Check if it's a variable product
    if ($product->is_type('variable')) {
        $variation_prices = $product->get_variation_prices();
        
        // Get the minimum price
        $min_price = current($variation_prices['price']);
        
        // Get the maximum price
        $max_price = end($variation_prices['price']);

        // Display the price range
        echo '<div class="cc-starting-price"><h4>Starting with: <span class="cc-price">' . wc_price($min_price) . '</span></h4></div>';
        
      
    } else {
        // For simple products, just display the price
		 echo '<div class="cc-single-price"><h4>Starting with: <span class="cc-price">' . $product->get_price_html() . '</span></h4></div>';
    }
}

add_action('woocommerce_single_product_summary', 'display_min_price_or_range', 11);

?>
