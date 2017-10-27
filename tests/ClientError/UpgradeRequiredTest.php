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
        $upgradeRequired = new UpgradeRequired();

        $this->assertInstanceOf(ClientError::class, $upgradeRequired);
    }

    /**
     * @covers \Meek\Http\ClientError\UpgradeRequired::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $upgradeRequired = new UpgradeRequired();

        $this->assertEquals(426, $upgradeRequired->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\UpgradeRequired::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $upgradeRequired = new UpgradeRequired();

        $this->assertEquals('Upgrade Required', $upgradeRequired->getReasonPhrase());
    }
}
