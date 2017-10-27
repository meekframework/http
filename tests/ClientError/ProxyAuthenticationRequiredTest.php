<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class ProxyAuthenticationRequiredTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $proxyAuthenticationRequired = new ProxyAuthenticationRequired();

        $this->assertInstanceOf(ClientError::class, $proxyAuthenticationRequired);
    }

    /**
     * @covers \Meek\Http\ClientError\ProxyAuthenticationRequired::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $proxyAuthenticationRequired = new ProxyAuthenticationRequired();

        $this->assertEquals(407, $proxyAuthenticationRequired->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\ProxyAuthenticationRequired::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $proxyAuthenticationRequired = new ProxyAuthenticationRequired();

        $this->assertEquals('Proxy Authentication Required', $proxyAuthenticationRequired->getReasonPhrase());
    }
}
