<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class ExpectationFailedTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $expectationFailed = new ExpectationFailed();

        $this->assertInstanceOf(ClientError::class, $expectationFailed);
    }

    /**
     * @covers \Meek\Http\ClientError\ExpectationFailed::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $expectationFailed = new ExpectationFailed();

        $this->assertEquals(417, $expectationFailed->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\ExpectationFailed::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $expectationFailed = new ExpectationFailed();

        $this->assertEquals('Expectation Failed', $expectationFailed->getReasonPhrase());
    }
}
