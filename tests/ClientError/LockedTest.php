<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class LockedTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $locked = new Locked();

        $this->assertInstanceOf(ClientError::class, $locked);
    }

    /**
     * @covers \Meek\Http\ClientError\Locked::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $locked = new Locked();

        $this->assertEquals(423, $locked->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\Locked::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $locked = new Locked();

        $this->assertEquals('Locked', $locked->getReasonPhrase());
    }
}
