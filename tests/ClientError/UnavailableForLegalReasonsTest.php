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
        $unavailableForLegalReasons = new UnavailableForLegalReasons('https://example.com/legislation');

        $this->assertInstanceOf(ClientError::class, $unavailableForLegalReasons);
    }

    /**
     * @covers \Meek\Http\ClientError\UnavailableForLegalReasons::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $unavailableForLegalReasons = new UnavailableForLegalReasons('https://example.com/legislation');

        $this->assertEquals(451, $unavailableForLegalReasons->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\UnavailableForLegalReasons::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $unavailableForLegalReasons = new UnavailableForLegalReasons('https://example.com/legislation');

        $this->assertEquals('Unavailable For Legal Reasons', $unavailableForLegalReasons->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\ClientError\UnavailableForLegalReasons::__construct
     */
    public function testAddsBlockedByLinkHeader()
    {
        $link = 'https://example.com/legislation';
        $expected = '<' . $link . '>; rel="blocked-by"';
        $unavailableForLegalReasons = new UnavailableForLegalReasons($link);
        $headers = $unavailableForLegalReasons->getHeaders();

        $this->assertArrayHasKey('link', $headers);
        $this->assertContains($expected, $headers['link']);
    }

    /**
     * @covers \Meek\Http\ClientError\UnavailableForLegalReasons::__construct
     */
    public function testHeadersAreMergedCorrectly()
    {
        $link = 'https://example.com/legislation';
        $unavailableForLegalReasons = new UnavailableForLegalReasons($link, ['connection' => ['close']]);
        $headers = $unavailableForLegalReasons->getHeaders();

        $this->assertArrayHasKey('link', $headers);
        $this->assertArrayHasKey('connection', $headers);
    }
}
