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
        $upgradeRequired = new UpgradeRequired('HTTP/3.0');

        $this->assertInstanceOf(ClientError::class, $upgradeRequired);
    }

    /**
     * @covers \Meek\Http\ClientError\UpgradeRequired::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $upgradeRequired = new UpgradeRequired('HTTP/3.0');

        $this->assertEquals(426, $upgradeRequired->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\UpgradeRequired::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $upgradeRequired = new UpgradeRequired('HTTP/3.0');

        $this->assertEquals('Upgrade Required', $upgradeRequired->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\ClientError\UpgradeRequired::__construct
     */
    public function testAddsUpgradeHeader()
    {
        $protocol = 'HTTP/3.0';
        $upgradeRequired = new UpgradeRequired($protocol);
        $headers = $upgradeRequired->getHeaders();

        $this->assertArrayHasKey('upgrade', $headers);
        $this->assertContains($protocol, $headers['upgrade']);
    }
}
