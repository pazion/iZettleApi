<?php

declare(strict_types=1);

namespace LauLamanApps\IzettleApi\API\Inventory\Location;

use Ramsey\Uuid\UuidInterface;

final class Inventory
{
    private $locationUuid;
    private $trackedProducts;
    private $variants;

    public function __construct(UuidInterface $locationUuid, array $trackedProducts, array $variants)
    {
        $this->locationUuid = $locationUuid;
        $this->trackedProducts = $trackedProducts;
        $this->variants = $variants;
    }
}
