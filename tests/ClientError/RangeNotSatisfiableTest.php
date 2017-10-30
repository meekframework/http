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
        $rangeNotSatisfiable = new RangeNotSatisfiable('bytes */47022');

        $this->assertInstanceOf(ClientError::class, $rangeNotSatisfiable);
    }

    /**
     * @covers \Meek\Http\ClientError\RangeNotSatisfiable::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $rangeNotSatisfiable = new RangeNotSatisfiable('bytes */47022');

        $this->assertEquals(416, $rangeNotSatisfiable->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\RangeNotSatisfiable::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $rangeNotSatisfiable = new RangeNotSatisfiable('bytes */47022');

        $this->assertEquals('Range Not Satisfiable', $rangeNotSatisfiable->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\ClientError\RangeNotSatisfiable::__construct
     */
    public function testAddsContentRangeHeader()
    {
        $contentRange = 'bytes */47022';
        $rangeNotSatisfiable = new RangeNotSatisfiable($contentRange);
        $headers = $rangeNotSatisfiable->getHeaders();

        $this->assertArrayHasKey('content-range', $headers);
        $this->assertContains($contentRange, $headers['content-range']);
    }

    /**
     * @covers \Meek\Http\ClientError\RangeNotSatisfiable::__construct
     */
    public function testHeadersAreMergedCorrectly()
    {
        $contentRange = 'bytes */47022';
        $rangeNotSatisfiable = new RangeNotSatisfiable($contentRange, ['connection' => ['close']]);
        $headers = $rangeNotSatisfiable->getHeaders();

        $this->assertArrayHasKey('content-range', $headers);
        $this->assertArrayHasKey('connection', $headers);
    }
}
