<?php

namespace LauLamanApps\IzettleApi\Client\Inventory;

use LauLamanApps\IzettleApi\API\Inventory\Settings;

interface SettingsBuilderInterface
{
    public function buildFromJson(string $json): Settings;
}
