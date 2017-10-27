<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class MethodNotAllowedTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $methodNotAllowed = new MethodNotAllowed(['GET']);

        $this->assertInstanceOf(ClientError::class, $methodNotAllowed);
    }

    /**
     * @covers \Meek\Http\ClientError\MethodNotAllowed::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $methodNotAllowed = new MethodNotAllowed(['GET']);

        $this->assertEquals(405, $methodNotAllowed->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\MethodNotAllowed::__construct
     */
    public function testAddsAllowHeader()
    {
        // The response MUST include an Allow header containing a list of valid methods for the requested resource.
        $allowedMethods = ['GET', 'POST', 'HEAD'];
        $expectedHeaders = ['allow' => $allowedMethods];
        $methodNotAllowed = new MethodNotAllowed($allowedMethods);

        $this->assertEquals($expectedHeaders, $methodNotAllowed->getHeaders());
    }

    /**
     * @covers \Meek\Http\ClientError\MethodNotAllowed::__construct
     */
    public function testAllowedMethodsAreNormalisedToUpperCase()
    {
        $methodNotAllowed = new MethodNotAllowed(['get', 'post', 'head']);

        $allowedMethods = $methodNotAllowed->getHeaders()['allow'];

        $this->assertEquals(['GET', 'POST', 'HEAD'], $allowedMethods);
    }

    /**
     * @covers \Meek\Http\ClientError\MethodNotAllowed::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $methodNotAllowed = new MethodNotAllowed(['GET']);

        $this->assertEquals('Method Not Allowed', $methodNotAllowed->getReasonPhrase());
    }
}
