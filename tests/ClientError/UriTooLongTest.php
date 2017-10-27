<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class UriTooLongTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $uriTooLong = new UriTooLong();

        $this->assertInstanceOf(ClientError::class, $uriTooLong);
    }

    /**
     * @covers \Meek\Http\ClientError\UriTooLong::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $uriTooLong = new UriTooLong();

        $this->assertEquals(414, $uriTooLong->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\UriTooLong::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $uriTooLong = new UriTooLong();

        $this->assertEquals('URI Too Long', $uriTooLong->getReasonPhrase());
    }
}
