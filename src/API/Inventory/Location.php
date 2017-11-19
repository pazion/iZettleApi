<?php

declare(strict_types=1);

namespace LauLamanApps\IzettleApi\API\Inventory;

use LauLamanApps\IzettleApi\API\Inventory\Location\TypeEnum;
use Ramsey\Uuid\UuidInterface;

final class Location
{
    private $uuid;
    private $type;
    private $name;
    private $description;
    private $default;

    public function __construct(UuidInterface $uuid, TypeEnum $type, string $name, string $description, bool $default)
    {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->name = $name;
        $this->description = $description;
        $this->default = $default;
    }

    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    public function getType(): TypeEnum
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isDefault(): bool
    {
        return $this->default;
    }
}
