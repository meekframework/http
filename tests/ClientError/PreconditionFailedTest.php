<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class PreconditionFailedTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $preconditionFailed = new PreconditionFailed();

        $this->assertInstanceOf(ClientError::class, $preconditionFailed);
    }

    /**
     * @covers \Meek\Http\ClientError\PreconditionFailed::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $preconditionFailed = new PreconditionFailed();

        $this->assertEquals(412, $preconditionFailed->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\PreconditionFailed::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $preconditionFailed = new PreconditionFailed();

        $this->assertEquals('Precondition Failed', $preconditionFailed->getReasonPhrase());
    }
}
