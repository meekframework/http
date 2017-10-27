<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class NotAcceptableTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $notAcceptable = new NotAcceptable();

        $this->assertInstanceOf(ClientError::class, $notAcceptable);
    }

    /**
     * @covers \Meek\Http\ClientError\NotAcceptable::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $notAcceptable = new NotAcceptable();

        $this->assertEquals(406, $notAcceptable->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\NotAcceptable::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $notAcceptable = new NotAcceptable();

        $this->assertEquals('Not Acceptable', $notAcceptable->getReasonPhrase());
    }
}
