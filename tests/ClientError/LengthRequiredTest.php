<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class LengthRequiredTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $lengthRequired = new LengthRequired();

        $this->assertInstanceOf(ClientError::class, $lengthRequired);
    }

    /**
     * @covers \Meek\Http\ClientError\LengthRequired::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $lengthRequired = new LengthRequired();

        $this->assertEquals(411, $lengthRequired->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\LengthRequired::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $lengthRequired = new LengthRequired();

        $this->assertEquals('Length Required', $lengthRequired->getReasonPhrase());
    }
}
