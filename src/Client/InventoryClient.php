<?php

declare(strict_types=1);

namespace LauLamanApps\IzettleApi\Client;

use LauLamanApps\IzettleApi\API\Inventory\Location;
use LauLamanApps\IzettleApi\API\Inventory\Settings;
use LauLamanApps\IzettleApi\Client\Inventory\HistoryBuilderInterface;
use LauLamanApps\IzettleApi\Client\Inventory\LocationBuilderInterface;
use LauLamanApps\IzettleApi\Client\Inventory\ProductBuilderInterface;
use LauLamanApps\IzettleApi\Client\Inventory\SettingsBuilderInterface;
use LauLamanApps\IzettleApi\IzettleClientInterface;
use Ramsey\Uuid\UuidInterface;

final class InventoryClient
{
    private const DEFAULT_ORGANIZATION_UUID = 'self';

    const BASE_URL = 'https://inventory.izettle.com/organizations/%s';

    const GET_HISTORY = self::BASE_URL . '/history/locations/%s';

    const GET_PRODUCT_INVENTORY = self::BASE_URL . '/inventory/locations/%s/products/%s';
    const GET_LOCATION_INVENTORY = self::BASE_URL . '/inventory/locations/%s';
    const POST_INVENTORY = self::BASE_URL . '/inventory';
    const POST_INVENTORY_BULK = self::BASE_URL . '/inventory/bulk';
    const PUT_INVENTORY = self::BASE_URL . '/inventory';
    const DELETE_PRODUCT_INVENTORY = self::BASE_URL . '/inventory/products/%s';

    const GET_LOCATIONS = self::BASE_URL . '/locations';
    const PUT_LOCATIONS = self::BASE_URL . '/locations/%s';

    const GET_SETTINGS = self::BASE_URL . '/settings';
    const POST_SETTINGS = self::BASE_URL . '/settings';
    const PUT_SETTINGS = self::BASE_URL . '/settings';

    /**
     * @var IzettleClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $organizationUuid;

    /**
     * @var LocationBuilderInterface
     */
    private $locationBuilder;

    /**
     * @var ProductBuilderInterface
     */
    private $productBuilder;

    /**
     * @var HistoryBuilderInterface
     */
    private $historyBuilder;

    /**
     * @var SettingsBuilderInterface
     */
    private $settingsBuilder;

    public function __construct(
        IzettleClientInterface $client,
        ?UuidInterface $organizationUuid = null,
        LocationBuilderInterface $locationBuilder,
        ProductBuilderInterface $productBuilder,
        HistoryBuilderInterface $historyBuilder,
        SettingsBuilderInterface $settingsBuilder
    ) {
        $this->client = $client;
        $this->organizationUuid = $organizationUuid ? $organizationUuid->toString() : self::DEFAULT_ORGANIZATION_UUID;
        $this->locationBuilder = $locationBuilder;
        $this->productBuilder = $productBuilder;
        $this->historyBuilder = $historyBuilder;
        $this->settingsBuilder = $settingsBuilder;
    }

    public function setOrganizationUuid(UuidInterface $organizationUuid): void
    {
        $this->organizationUuid = $organizationUuid->toString();
    }

    public function resetOrganizationUuid(): void
    {
        $this->organizationUuid = self::DEFAULT_ORGANIZATION_UUID;
    }

    /**
     * @return Location[]
     */
    public function getLocations(): array
    {
        $url = sprintf(self::GET_LOCATIONS, $this->organizationUuid);
        $json = $this->client->getJson($this->client->get($url));

        return $this->locationBuilder->buildFromJsonArray($json);
    }

    public function getLocation(UuidInterface $locationUuid): Location
    {
        $url = sprintf(self::GET_LOCATION_INVENTORY, $this->organizationUuid, $locationUuid->toString());
        $json = $this->client->getJson($this->client->get($url));

        return $this->locationBuilder->buildFromJson($json);
    }

    public function getProduct(UuidInterface $locationUuid, UuidInterface $productUuid): Product
    {
        $url = sprintf(self::GET_PRODUCT_INVENTORY, $this->organizationUuid, $locationUuid->toString(), $productUuid->toString());
        $json = $this->client->getJson($this->client->get($url));

        return $this->productBuilder->buildFromJson($json);
    }

    public function getHistory(UuidInterface $locationUuid): History
    {
        $url = sprintf(self::GET_HISTORY, $this->organizationUuid, $locationUuid->toString());
        $json = $this->client->getJson($this->client->get($url, ['balanceChangeType' => 'RESTOCK']));

        return $this->historyBuilder->buildFromJson($json);
    }

    public function getSettings(): Settings
    {
        $url = sprintf(self::GET_SETTINGS, $this->organizationUuid);
        $json = $this->client->getJson($this->client->get($url));

        return $this->settingsBuilder->buildFromJson($json);
    }
}
