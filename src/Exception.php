<?php declare(strict_types=1);

namespace Meek\Http;

use Exception as PhpException;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

/**
 * Exception base class for handling HTTP errors.
 *
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
abstract class Exception extends PhpException
{
    /**
     * @var integer The status code.
     */
    private $statusCode;

    /**
     * @var string The reason phrase.
     */
    private $reasonPhrase;

    /**
     * @var string[][] The headers.
     */
    private $headers;

    /**
     * Creates a new HTTP client error exception.
     *
     * @param integer $statusCode A client error status code.
     * @param string $reasonPhrase A reason phrase for the status code.
     * @param string[][] $headers Headers to be sent along when preparing the exception's response.
     * @throws InvalidArgumentException If a client error status code was not provided.
     * @throws InvalidArgumentException If the reason phrase is empty.
     */
    public function __construct(int $statusCode, string $reasonPhrase, array $headers = [])
    {
        $this->assertStatusCodeIsInRange($statusCode);

        if (empty($reasonPhrase)) {
            throw new InvalidArgumentException('The reason phrase cannot be empty');
        }

        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
        $this->headers = $headers;

        parent::__construct($this->reasonPhrase, $this->statusCode);
    }

    /**
     * Retrieve the status code.
     *
     * @return integer The status code.
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Retrieve the reason phrase.
     *
     * @return string The reason phrase.
     */
    public function getReasonPhrase(): string
    {
        return $this->reasonPhrase;
    }

    /**
     * Retrieve the headers that should be sent along with the HTTP exception response.
     *
     * @return string[][] Headers to be sent, in a PSR7 compatible format.
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Prepares a response to send, from the HTTP exception, with things like status code, reason phrase and headers.
     *
     * @param ResponseInterface $response The response to prepare.
     * @return ResponseInterface The prepared response.
     */
    public function prepare(ResponseInterface $response): ResponseInterface
    {
        $response = $response->withStatus($this->getStatusCode(), $this->getReasonPhrase());

        foreach ($this->getHeaders() as $name => $value) {
            $response = $response->withAddedHeader($name, $value);
        }

        return $response;
    }

    /**
     * Magic method to allow the exception to be cast to a string.
     *
     * @return string The status code and reason phrase on one line.
     */
    public function __toString(): string
    {
        return sprintf('%d %s', $this->getStatusCode(), $this->getReasonPhrase());
    }

    /**
     * Validate status code is in range of sub class.
     *
     * @param integer $statusCode The status code to check against.
     * @throws InvalidArgumentException If the status code is too low or too high.
     */
    abstract protected function assertStatusCodeIsInRange(int $statusCode): void;
}
