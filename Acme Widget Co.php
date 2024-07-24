<?php
class Basket {
    private $catalogue;
    private $deliveryRules;
    private $offers;
    private $products = [];

    public function __construct($catalogue, $deliveryRules, $offers) {
        $this->catalogue = $catalogue;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    public function add($productCode) {
        if (isset($this->catalogue[$productCode])) {
            $this->products[] = $productCode;
        } else {
            throw new Exception("The product code was not found in the catalogue");
        }
    }

    public function total() {
        $total = 0;

        foreach ($this->products as $productCode) {
            $total += $this->catalogue[$productCode];
        }

        foreach ($this->offers as $offer) {
            $total = $offer->apply($this->products, $total);
        }

        $deliveryCharge = 0;
        if ($total < 50) {
            $deliveryCharge = 4.95;
        } elseif ($total < 90) {
            $deliveryCharge = 2.95;
        }

        return $total + $deliveryCharge;
    }
}

class Offer {
    public function apply($products, $total) {
        // Implement the specific offer logic here
        return $total;
    }
}

// Example of usage:

$catalogue = [
    'B01' => 7.95,
    'G01' => 24.95,
    'R01' => 32.95,
];

$deliveryRules = [
    ['min' => 0, 'max' => 50, 'charge' => 4.95],
    ['min' => 50, 'max' => 90, 'charge' => 2.95],
    ['min' => 90, 'max' => INF, 'charge' => 0],
];

$offers = [
    new Offer(),
    // Add a new offer
];

// Example cases
$basket = new Basket($catalogue, $deliveryRules, $offers);
$basket->add('B01');
$basket->add('G01');
echo "Products: B01, G01\n";
echo "Total: $" . number_format($basket->total(), 2) . "\n";

$basket = new Basket($catalogue, $deliveryRules, $offers); 
$basket->add('R01');
$basket->add('R01');
echo "Products: R01, R01\n";
echo "Total: $" . number_format($basket->total(), 2) . "\n";

$basket = new Basket($catalogue, $deliveryRules, $offers); 
$basket->add('R01');
$basket->add('G01');
echo "Products: R01, G01\n";
echo "Total: $" . number_format($basket->total(), 2) . "\n";

$basket = new Basket($catalogue, $deliveryRules, $offers);
$basket->add('B01');
$basket->add('B01');
$basket->add('R01');
$basket->add('R01');
$basket->add('R01');
echo "Products: B01, B01, R01, R01, R01\n";
echo "Total: $" . number_format($basket->total(), 2) . "\n";
?>
