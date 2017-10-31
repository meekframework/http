<?php declare(strict_types=1);

namespace Meek\Http;

use InvalidArgumentException;

/**
 * Value-object modeling the status-code and reason-phrase part of a status line.
 *
 * @see https://tools.ietf.org/html/rfc7230#section-3.1.2
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2017 Nathan Bishop
 * @license The MIT license.
 */
final class Status
{
    /**
     * @var integer The code that describes the response.
     */
    private $statusCode;

    /**
     * @var string The phrase describing the status code.
     */
    private $reasonPhrase;

    /**
     * @var string[] Default reason phrases for selected status codes.
     */
    private static $defaultReasonPhrases = [
        // Informational 1xx
        100 => 'Continue',
        101 => 'Switching Protocols',

        // Successful 2xx
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',

        // Redirection 3xx
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',

        // Client Error 4xx
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',

        // Server Error 5xx
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    ];

    /**
     * Regex to match for valid characters in the reason phrase.
     *
     * Allowed characters are: horizontal tabs, spaces and any
     * printable character from the USASCII character set.
     */
    const REASON_PHRASE_VALID_CHAR_REGEX = '/^[\t\x20-\x7E]*$/';

    /**
     * Construct a new status object.
     *
     * @param integer $statusCode A 3 digit code describing the response.
     * @param string $reasonPhrase A short phrase describing the status code, can be empty.
     */
    public function __construct(int $statusCode, string $reasonPhrase = '')
    {
        if ($statusCode < 100 || $statusCode > 599) {
            throw new InvalidArgumentException('The status code must be in the range 1xx-5xx');
        }

        if (!preg_match(self::REASON_PHRASE_VALID_CHAR_REGEX, $reasonPhrase)) {
            throw new InvalidArgumentException('The reason phrase contains invalid characters');
        }

        // attempt to find a reason phrase for the status code
        if (empty($reasonPhrase)) {
            $reasonPhrase = $this->getDefaultReasonPhrase($statusCode);
        }

        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;    // according to RFC reason phrase can be empty
    }

    /**
     * Retrieve the status code.
     *
     * @return integer The 3 digit code describing the response.
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;;
    }

    /**
     * Retrieve the reason phrase.
     *
     * @return string The phrase describing the status code.
     */
    public function getReasonPhrase(): string
    {
        return $this->reasonPhrase;
    }

    /**
     * Check if is informational status.
     *
     * @return boolean True, if informational, otherwise false.
     */
    public function isInformational(): bool
    {
        return $this->statusCode > 99 && $this->statusCode < 200;
    }

    /**
     * Check if is successful status.
     *
     * @return boolean True, if successful, otherwise false.
     */
    public function isSuccessful(): bool
    {
        return $this->statusCode > 199 && $this->statusCode < 300;
    }

    /**
     * Check if is redirection status.
     *
     * @return boolean True, if redirection, otherwise false.
     */
    public function isRedirection(): bool
    {
        return $this->statusCode > 299 && $this->statusCode < 400;
    }

    /**
     * Check is is client error status.
     *
     * @return boolean True, if client error, otherwise false.
     */
    public function isClientError(): bool
    {
        return $this->statusCode > 399 && $this->statusCode < 500;
    }

    /**
     * Check if is server error status.
     *
     * @return boolean True, if server error, otherwise false.
     */
    public function isServerError(): bool
    {
        return $this->statusCode > 499 && $this->statusCode < 600;
    }

    /**
     * Return the status code and reason phrase formatted as a
     * status-line, but without the HTTP version.
     *
     * @return string The status line without the HTTP version.
     */
    public function getStatusLine(): string
    {
        return sprintf('%d %s', $this->statusCode, $this->reasonPhrase);
    }

    /**
     * Return the status code and reason phrase formatted as a
     * status-line, but without the HTTP version.
     *
     * @return string The status line without the HTTP version.
     */
    public function __toString(): string
    {
        return $this->getStatusLine();
    }

    /**
     * Attempt to find a default reason phrase for the status code.
     *
     * @param integer $statusCode The 3 digit status code describing the response.
     * @return string The default reason phrase associated with the status code, or nothing if not found.
     */
    private function getDefaultReasonPhrase(int $statusCode): string
    {
        return array_key_exists($statusCode, static::$defaultReasonPhrases) ? static::$defaultReasonPhrases[$statusCode] : '';
    }
}
