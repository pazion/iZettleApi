<?php

namespace LauLamanApps\IzettleApi\Client\Inventory;

interface HistoryBuilderInterface
{
    public function buildFromJson(string $json): History;
}
