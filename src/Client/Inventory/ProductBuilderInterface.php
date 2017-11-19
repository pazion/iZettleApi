<?php

namespace LauLamanApps\IzettleApi\Client\Inventory;

interface ProductBuilderInterface
{
    public function buildFromJson(string $json): Product;
}
