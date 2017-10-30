<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class UpgradeRequiredTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $upgradeRequired = new UpgradeRequired(['HTTP/3.0']);

        $this->assertInstanceOf(ClientError::class, $upgradeRequired);
    }

    /**
     * @covers \Meek\Http\ClientError\UpgradeRequired::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $upgradeRequired = new UpgradeRequired(['HTTP/3.0']);

        $this->assertEquals(426, $upgradeRequired->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\UpgradeRequired::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $upgradeRequired = new UpgradeRequired(['HTTP/3.0']);

        $this->assertEquals('Upgrade Required', $upgradeRequired->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\ClientError\UpgradeRequired::__construct
     */
    public function testAddsUpgradeHeader()
    {
        $protocols = ['HTTP/2.0', 'SHTTP/1.3'];
        $upgradeRequired = new UpgradeRequired($protocols);
        $headers = $upgradeRequired->getHeaders();

        $this->assertArrayHasKey('upgrade', $headers);
        $this->assertEquals($protocols, $headers['upgrade']);
    }

    /**
     * @covers \Meek\Http\ClientError\UpgradeRequired::__construct
     */
    public function testSetsConnectionTypeToUpgrade()
    {
        $upgradeRequired = new UpgradeRequired(['HTTP/3.0']);
        $headers = $upgradeRequired->getHeaders();

        $this->assertArrayHasKey('connection', $headers);
        $this->assertContains('upgrade', $headers['connection']);
    }

    /**
     * @covers \Meek\Http\ClientError\UpgradeRequired::__construct
     */
    public function testHeadersAreMergedCorrectly()
    {
        $upgradeRequired = new UpgradeRequired(['HTTP/3.0'], ['host' => ['https://example.com']]);
        $headers = $upgradeRequired->getHeaders();

        $this->assertArrayHasKey('upgrade', $headers);
        $this->assertArrayHasKey('connection', $headers);
        $this->assertArrayHasKey('host', $headers);
    }
}
