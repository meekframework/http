<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class NotFoundTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $notFound = new NotFound();

        $this->assertInstanceOf(ClientError::class, $notFound);
    }

    /**
     * @covers \Meek\Http\ClientError\NotFound::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $notFound = new NotFound();

        $this->assertEquals(404, $notFound->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\NotFound::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $notFound = new NotFound();

        $this->assertEquals('Not Found', $notFound->getReasonPhrase());
    }
}
