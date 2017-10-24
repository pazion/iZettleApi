<?php

declare(strict_types=1);

namespace LauLamanApps\IzettleApi\Tests\Unit\Client;

use DateTime;
use LauLamanApps\IzettleApi\Client\AccessToken;
use PHPUnit\Framework\TestCase;

/**
 * @small
 */
final class AccessTokenTest extends TestCase
{
    /**
     * @test
     */
    public function isExpired(): void
    {
        $accessToken = new AccessToken('', new DateTime(), '');

        self::assertTrue($accessToken->isExpired());
    }
}