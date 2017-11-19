<?php

namespace LauLamanApps\IzettleApi\Client\Inventory;

use LauLamanApps\IzettleApi\API\Inventory\Location;

interface LocationBuilderInterface
{
    /**
     * @return Location[]
     */
    public function buildFromJsonArray(string $json): array;

    public function buildFromJson(string $json): Location;
}
