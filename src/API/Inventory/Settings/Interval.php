<?php

declare(strict_types=1);

namespace LauLamanApps\IzettleApi\API\Inventory\Settings;

use Werkspot\Enum\AbstractEnum;

final class Interval extends AbstractEnum
{
    const DAILY = 'DAILY';
    const NEVER = 'NEVER';
}
