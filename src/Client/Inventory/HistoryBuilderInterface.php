<?php

namespace LauLamanApps\IzettleApi\Client\Inventory;

use LauLamanApps\IzettleApi\API\Inventory\History;

interface HistoryBuilderInterface
{
    public function buildFromJson(string $json): History;
}
