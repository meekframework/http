<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class PayloadTooLargeTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $payloadTooLarge = new PayloadTooLarge();

        $this->assertInstanceOf(ClientError::class, $payloadTooLarge);
    }

    /**
     * @covers \Meek\Http\ClientError\PayloadTooLarge::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $payloadTooLarge = new PayloadTooLarge();

        $this->assertEquals(413, $payloadTooLarge->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\PayloadTooLarge::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $payloadTooLarge = new PayloadTooLarge();

        $this->assertEquals('Payload Too Large', $payloadTooLarge->getReasonPhrase());
    }
}
