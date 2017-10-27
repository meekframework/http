<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class UnavailableForLegalReasonsTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $unavailableForLegalReasons = new UnavailableForLegalReasons();

        $this->assertInstanceOf(ClientError::class, $unavailableForLegalReasons);
    }

    /**
     * @covers \Meek\Http\ClientError\UnavailableForLegalReasons::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $unavailableForLegalReasons = new UnavailableForLegalReasons();

        $this->assertEquals(451, $unavailableForLegalReasons->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\UnavailableForLegalReasons::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $unavailableForLegalReasons = new UnavailableForLegalReasons();

        $this->assertEquals('Unavailable For Legal Reasons', $unavailableForLegalReasons->getReasonPhrase());
    }
}
