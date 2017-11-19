<?php

declare(strict_types=1);

namespace LauLamanApps\IzettleApi\API\Inventory\Location;

use Werkspot\Enum\AbstractEnum;

final class TypeEnum extends AbstractEnum
{
    const SUPPLIER = 'SUPPLIER';
    const STORE = 'STORE';
    const SOLD = 'SOLD';
    const BIN = 'BIN';
}
