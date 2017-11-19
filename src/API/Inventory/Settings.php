<?php

declare(strict_types=1);

namespace LauLamanApps\IzettleApi\API\Inventory;

use LauLamanApps\IzettleApi\API\Inventory\Settings\NotificationSettings;
use LauLamanApps\IzettleApi\API\Universal\iZettlePostable;

final class Settings implements iZettlePostable
{
    private $etag;
    private $defaultRefundToLocation;
    private $notificationSettings;

    public function new(
        string $defaultRefundToLocation,
        NotificationSettings $notificationSettings
    ): self {
        return new self(null, $defaultRefundToLocation, $notificationSettings);
    }

    public function create(
        string $etag,
        string $defaultRefundToLocation,
        NotificationSettings $notificationSettings
    ): self {
        return new self($etag, $defaultRefundToLocation, $notificationSettings);
    }

    public function getEtag(): ?string
    {
        return $this->etag;
    }

    public function getDefaultRefundToLocation(): string
    {
        return $this->defaultRefundToLocation;
    }

    public function getNotificationSettings(): NotificationSettings
    {
        return $this->notificationSettings;
    }

    public function getPostData(): array
    {
        return [
                "defaultRefundToLocation" => $this->defaultRefundToLocation,
                "notificationSettings" => $this->notificationSettings->getPostData()
        ];
    }

    private function __construct(
        ?string $etag = null,
        string $defaultRefundToLocation,
        NotificationSettings $notificationSettings
    ) {
        $this->etag = $etag;
        $this->defaultRefundToLocation = $defaultRefundToLocation;
        $this->notificationSettings = $notificationSettings;
    }
}
