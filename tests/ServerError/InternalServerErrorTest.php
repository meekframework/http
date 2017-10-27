<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ServerError;

class InternalServerErrorTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAServerError()
    {
        $internalServerError = new InternalServerError();

        $this->assertInstanceOf(ServerError::class, $internalServerError);
    }

    /**
     * @covers \Meek\Http\ServerError\InternalServerError::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $internalServerError = new InternalServerError();

        $this->assertEquals(500, $internalServerError->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ServerError\InternalServerError::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $internalServerError = new InternalServerError();

        $this->assertEquals('Internal Server Error', $internalServerError->getReasonPhrase());
    }
}
