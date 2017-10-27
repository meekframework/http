<?php declare(strict_types=1);

namespace Meek\Http;

use PHPUnit\Framework\TestCase;

class ServerErrorTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAHttpException()
    {
        $exception = new ServerError(500, 'Internal Server Error');

        $this->assertInstanceOf(Exception::class, $exception);
    }

    /**
     * @covers \Meek\Http\ServerError::assertStatusCodeIsInRange
     */
    public function testThrowsExceptionIfStatusCodeIsTooLow()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('A server error status code ("5xx") was not provided');

        $exception = new ServerError(499, 'reason phrase');
    }

    /**
     * @covers \Meek\Http\ServerError::assertStatusCodeIsInRange
     */
    public function testThrowsExceptionIfStatusCodeIsTooHigh()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('A server error status code ("5xx") was not provided');

        $exception = new ServerError(600, 'reason phrase');
    }

    /**
     * @covers \Meek\Http\ServerError::assertStatusCodeIsInRange
     */
    public function testDoesNotThrowExceptionIfCodeIsInRange()
    {
        $exception = new ServerError(500, 'Internal Server Error');

        $this->assertEquals(500, $exception->getStatusCode());
    }
}
