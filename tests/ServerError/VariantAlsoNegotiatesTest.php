<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ServerError;

class VariantAlsoNegotiatesTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAServerError()
    {
        $variantAlsoNegotiates = new VariantAlsoNegotiates();

        $this->assertInstanceOf(ServerError::class, $variantAlsoNegotiates);
    }

    /**
     * @covers \Meek\Http\ServerError\VariantAlsoNegotiates::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $variantAlsoNegotiates = new VariantAlsoNegotiates();

        $this->assertEquals(506, $variantAlsoNegotiates->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ServerError\VariantAlsoNegotiates::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $variantAlsoNegotiates = new VariantAlsoNegotiates();

        $this->assertEquals('Variant Also Negotiates', $variantAlsoNegotiates->getReasonPhrase());
    }
}
