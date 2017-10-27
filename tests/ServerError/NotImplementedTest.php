<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ServerError;

class NotImplementedTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAServerError()
    {
        $notImplemented = new NotImplemented();

        $this->assertInstanceOf(ServerError::class, $notImplemented);
    }

    /**
     * @covers \Meek\Http\ServerError\NotImplemented::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $notImplemented = new NotImplemented();

        $this->assertEquals(501, $notImplemented->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ServerError\NotImplemented::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $notImplemented = new NotImplemented();

        $this->assertEquals('Not Implemented', $notImplemented->getReasonPhrase());
    }
}
