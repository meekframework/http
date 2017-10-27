<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class PaymentRequiredTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $paymentRequired = new PaymentRequired();

        $this->assertInstanceOf(ClientError::class, $paymentRequired);
    }

    /**
     * @covers \Meek\Http\ClientError\PaymentRequired::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $paymentRequired = new PaymentRequired();

        $this->assertEquals(402, $paymentRequired->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\PaymentRequired::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $paymentRequired = new PaymentRequired();

        $this->assertEquals('Payment Required', $paymentRequired->getReasonPhrase());
    }
}
