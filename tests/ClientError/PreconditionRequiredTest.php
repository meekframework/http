<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class PreconditionRequiredTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $preconditionRequired = new PreconditionRequired();

        $this->assertInstanceOf(ClientError::class, $preconditionRequired);
    }

    /**
     * @covers \Meek\Http\ClientError\PreconditionRequired::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $preconditionRequired = new PreconditionRequired();

        $this->assertEquals(428, $preconditionRequired->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\PreconditionRequired::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $preconditionRequired = new PreconditionRequired();

        $this->assertEquals('Precondition Required', $preconditionRequired->getReasonPhrase());
    }
}
