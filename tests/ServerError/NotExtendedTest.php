<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ServerError;

class NotExtendedTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAServerError()
    {
        $notExtended = new NotExtended();

        $this->assertInstanceOf(ServerError::class, $notExtended);
    }

    /**
     * @covers \Meek\Http\ServerError\NotExtended::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $notExtended = new NotExtended();

        $this->assertEquals(510, $notExtended->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ServerError\NotExtended::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $notExtended = new NotExtended();

        $this->assertEquals('Not Extended', $notExtended->getReasonPhrase());
    }
}
