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
        $proxyAuthenticationRequired = new ProxyAuthenticationRequired('Basic realm="MeekFramework"');

        $this->assertInstanceOf(ClientError::class, $proxyAuthenticationRequired);
    }

    /**
     * @covers \Meek\Http\ClientError\ProxyAuthenticationRequired::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $proxyAuthenticationRequired = new ProxyAuthenticationRequired('Basic realm="MeekFramework"');

        $this->assertEquals(407, $proxyAuthenticationRequired->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\ProxyAuthenticationRequired::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $proxyAuthenticationRequired = new ProxyAuthenticationRequired('Basic realm="MeekFramework"');

        $this->assertEquals('Proxy Authentication Required', $proxyAuthenticationRequired->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\ClientError\ProxyAuthenticationRequired::__construct
     */
    public function testAddsProxyAuthenticateHeader()
    {
        $challenge = 'Basic realm="MeekFramework"';

        $proxyAuthenticationRequired = new ProxyAuthenticationRequired($challenge);
        $headers = $proxyAuthenticationRequired->getHeaders();

        $this->assertArrayHasKey('proxy-authenticate', $headers);
        $this->assertContains($challenge, $headers['proxy-authenticate']);
    }

    /**
     * @covers \Meek\Http\ClientError\ProxyAuthenticationRequired::__construct
     */
    public function testHeadersAreMergedCorrectly()
    {
        $challenge = 'Basic realm="MeekFramework"';
        $proxyAuthenticationRequired = new ProxyAuthenticationRequired($challenge, ['connection' => ['close']]);
        $headers = $proxyAuthenticationRequired->getHeaders();

        $this->assertArrayHasKey('proxy-authenticate', $headers);
        $this->assertArrayHasKey('connection', $headers);
    }
}
