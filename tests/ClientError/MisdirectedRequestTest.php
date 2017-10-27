<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class MisdirectedRequestTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $misdirectedRequest = new MisdirectedRequest();

        $this->assertInstanceOf(ClientError::class, $misdirectedRequest);
    }

    /**
     * @covers \Meek\Http\ClientError\MisdirectedRequest::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $misdirectedRequest = new MisdirectedRequest();

        $this->assertEquals(421, $misdirectedRequest->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\MisdirectedRequest::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $misdirectedRequest = new MisdirectedRequest();

        $this->assertEquals('Misdirected Request', $misdirectedRequest->getReasonPhrase());
    }
}
