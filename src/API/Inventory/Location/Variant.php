<?php

declare(strict_types=1);

namespace LauLamanApps\IzettleApi\API\Inventory\Location;

use Ramsey\Uuid\UuidInterface;

final class Variant
{
    private $locationUuid;
    private $locationType;
    private $productUuid;
    private $variantUuid;
    private $balance;

    public function __construct(
        UuidInterface $locationUuid,
        TypeEnum $locationType,
        UuidInterface $productUuid,
        UuidInterface $variantUuid,
        int $balance
    ) {
        $this->locationUuid = $locationUuid;
        $this->locationType = $locationType;
        $this->productUuid = $productUuid;
        $this->variantUuid = $variantUuid;
        $this->balance = $balance;
    }

    public function getLocationUuid(): UuidInterface
    {
        return $this->locationUuid;
    }

    public function getLocationType(): TypeEnum
    {
        return $this->locationType;
    }

    public function getProductUuid(): UuidInterface
    {
        return $this->productUuid;
    }

    public function getVariantUuid(): UuidInterface
    {
        return $this->variantUuid;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }
}
