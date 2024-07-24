# ThriveCart-Coding-Challenge
# Basket Implementation
This PHP script implements a shopping basket system for Acme Widget Co. It includes functionality to add products to the basket, apply offers, and calculate the total cost including delivery charges.
## Assumptions
1. **Product Catalogue**: The product catalogue is predefined and contains the following products:
   - Red Widget (Code: R01) - $32.95
   - Green Widget (Code: G01) - $24.95
   - Blue Widget (Code: B01) - $7.95
2. **Delivery Charges**:
   - Orders under $50 cost $4.95 for delivery.
   - Orders under $90 cost $2.95 for delivery.
   - Orders of $90 or more have free delivery.
3. **Offers**: The script includes a placeholder for offers. The `Offer` class is provided as a base class for implementing specific offers. Currently, no specific offer logic is implemented.
## Class Definitions
### Basket
The `Basket` class represents the shopping basket. It has methods to add products and calculate the total cost, including delivery charges.
#### Methods
- **__construct($catalogue, $deliveryRules, $offers)**: Initializes the basket with the product catalogue, delivery rules, and offers.
- **add($productCode)**: Adds a product to the basket by its product code.
- **total()**: Calculates the total cost of the basket, including delivery charges and applying offers.
### Offer
The `Offer` class is a placeholder for implementing specific offer logic. It has a method `apply($products, $total)` which can be overridden to apply custom offer rules.
## Usage
1. Save the PHP script to a file, e.g., `basket.php`.
2. Open your terminal or command prompt and navigate to the directory containing `basket.php`.
3. Start the PHP built-in server:
   ```sh
   php -S localhost:8000
4. Open your web browser and go to http://localhost:8000/basket.php.
