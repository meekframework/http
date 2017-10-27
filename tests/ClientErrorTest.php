<?php declare(strict_types=1);

namespace Meek\Http;

use PHPUnit\Framework\TestCase;

class ClientErrorTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAHttpException()
    {
        $exception = new ClientError(404, 'Not Found');

        $this->assertInstanceOf(Exception::class, $exception);
    }

    /**
     * @covers \Meek\Http\ClientError::assertStatusCodeIsInRange
     */
    public function testThrowsExceptionIfStatusCodeIsTooLow()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('A client error status code ("4xx") was not provided');

        $exception = new ClientError(399, 'reason phrase');
    }

    /**
     * @covers \Meek\Http\ClientError::assertStatusCodeIsInRange
     */
    public function testThrowsExceptionIfStatusCodeIsTooHigh()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('A client error status code ("4xx") was not provided');

        $exception = new ClientError(500, 'reason phrase');
    }

    /**
     * @covers \Meek\Http\ClientError::assertStatusCodeIsInRange
     */
    public function testDoesNotThrowExceptionIfCodeIsInRange()
    {
        $exception = new ClientError(404, 'Not Found');

        $this->assertEquals(404, $exception->getStatusCode());
    }
}
