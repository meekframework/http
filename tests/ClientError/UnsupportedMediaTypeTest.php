<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class UnsupportedMediaTypeTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $unsupportedMediaType = new UnsupportedMediaType();

        $this->assertInstanceOf(ClientError::class, $unsupportedMediaType);
    }

    /**
     * @covers \Meek\Http\ClientError\UnsupportedMediaType::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $unsupportedMediaType = new UnsupportedMediaType();

        $this->assertEquals(415, $unsupportedMediaType->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\UnsupportedMediaType::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $unsupportedMediaType = new UnsupportedMediaType();

        $this->assertEquals('Unsupported Media Type', $unsupportedMediaType->getReasonPhrase());
    }
}
