<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class RangeNotSatisfiableTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $rangeNotSatisfiable = new RangeNotSatisfiable();

        $this->assertInstanceOf(ClientError::class, $rangeNotSatisfiable);
    }

    /**
     * @covers \Meek\Http\ClientError\RangeNotSatisfiable::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $rangeNotSatisfiable = new RangeNotSatisfiable();

        $this->assertEquals(416, $rangeNotSatisfiable->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\RangeNotSatisfiable::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $rangeNotSatisfiable = new RangeNotSatisfiable();

        $this->assertEquals('Range Not Satisfiable', $rangeNotSatisfiable->getReasonPhrase());
    }
}
