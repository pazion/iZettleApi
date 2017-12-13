<?php

namespace LauLamanApps\IzettleApi\Client\Inventory;

use LauLamanApps\IzettleApi\API\Inventory\Product;

interface ProductBuilderInterface
{
    public function buildFromJson(string $json): Product;
}
