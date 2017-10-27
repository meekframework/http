<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class BadRequestTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $badRequest = new BadRequest();

        $this->assertInstanceOf(ClientError::class, $badRequest);
    }

    /**
     * @covers \Meek\Http\ClientError\BadRequest::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $badRequest = new BadRequest();

        $this->assertEquals(400, $badRequest->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\BadRequest::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $badRequest = new BadRequest();

        $this->assertEquals('Bad Request', $badRequest->getReasonPhrase());
    }
}
