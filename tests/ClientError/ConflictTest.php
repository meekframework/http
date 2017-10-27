<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class ConflictTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $conflict = new Conflict();

        $this->assertInstanceOf(ClientError::class, $conflict);
    }

    /**
     * @covers \Meek\Http\ClientError\Conflict::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $conflict = new Conflict();

        $this->assertEquals(409, $conflict->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\Conflict::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $conflict = new Conflict();

        $this->assertEquals('Conflict', $conflict->getReasonPhrase());
    }
}
