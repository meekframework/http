<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class GoneTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $gone = new Gone();

        $this->assertInstanceOf(ClientError::class, $gone);
    }

    /**
     * @covers \Meek\Http\ClientError\Gone::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $gone = new Gone();

        $this->assertEquals(410, $gone->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\Gone::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $gone = new Gone();

        $this->assertEquals('Gone', $gone->getReasonPhrase());
    }
}
