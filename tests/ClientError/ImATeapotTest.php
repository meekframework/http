<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class ImATeapotTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $imATeapot = new ImATeapot();

        $this->assertInstanceOf(ClientError::class, $imATeapot);
    }

    /**
     * @covers \Meek\Http\ClientError\ImATeapot::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $imATeapot = new ImATeapot();

        $this->assertEquals(418, $imATeapot->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\ImATeapot::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $imATeapot = new ImATeapot();

        $this->assertEquals('I\'m A Teapot', $imATeapot->getReasonPhrase());
    }
}
