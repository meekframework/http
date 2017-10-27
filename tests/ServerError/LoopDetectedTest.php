<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ServerError;

class LoopDetectedTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAServerError()
    {
        $loopDetected = new LoopDetected();

        $this->assertInstanceOf(ServerError::class, $loopDetected);
    }

    /**
     * @covers \Meek\Http\ServerError\LoopDetected::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $loopDetected = new LoopDetected();

        $this->assertEquals(508, $loopDetected->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ServerError\LoopDetected::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $loopDetected = new LoopDetected();

        $this->assertEquals('Loop Detected', $loopDetected->getReasonPhrase());
    }
}
