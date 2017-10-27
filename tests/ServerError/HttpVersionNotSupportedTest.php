<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ServerError;

class HttpVersionNotSupportedTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAServerError()
    {
        $httpVersionNotSupported = new HttpVersionNotSupported();

        $this->assertInstanceOf(ServerError::class, $httpVersionNotSupported);
    }

    /**
     * @covers \Meek\Http\ServerError\HttpVersionNotSupported::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $httpVersionNotSupported = new HttpVersionNotSupported();

        $this->assertEquals(505, $httpVersionNotSupported->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ServerError\HttpVersionNotSupported::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $httpVersionNotSupported = new HttpVersionNotSupported();

        $this->assertEquals('HTTP Version Not Supported', $httpVersionNotSupported->getReasonPhrase());
    }
}
