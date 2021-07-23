<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\psr17;

// phpcs:disable Generic.Files.LineLength.TooLong
use Psr\Http\Message\{RequestFactoryInterface, RequestInterface, ResponseFactoryInterface, ResponseInterface, ServerRequestFactoryInterface, ServerRequestInterface, StreamFactoryInterface, StreamInterface, UploadedFileFactoryInterface, UploadedFileInterface, UriFactoryInterface, UriInterface};

use const UPLOAD_ERR_OK;

final class Psr17 implements Psr17Interface
{
    private RequestFactoryInterface $requestFactory;

    private ResponseFactoryInterface $responseFactory;

    private ServerRequestFactoryInterface $serverRequestFactory;

    private StreamFactoryInterface $streamFactory;

    private UploadedFileFactoryInterface $uploadedFileFactory;

    private UriFactoryInterface $uriFactory;

    public function __construct(RequestFactoryInterface $requestFactory, ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory, UploadedFileFactoryInterface $uploadedFileFactory, UriFactoryInterface $uriFactory, ServerRequestFactoryInterface $serverRequestFactory)
    {
        $this->requestFactory = $requestFactory;
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
        $this->uploadedFileFactory = $uploadedFileFactory;
        $this->uriFactory = $uriFactory;
        $this->serverRequestFactory = $serverRequestFactory;
    }

    public function createRequest(string $method, $uri): RequestInterface
    {
        return $this->requestFactory->createRequest($method, $uri);
    }

    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        return $this->responseFactory->createResponse($code, $reasonPhrase);
    }

    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface
    {
        return $this->serverRequestFactory->createServerRequest($method, $uri, $serverParams);
    }

    public function createStream(string $content = ''): StreamInterface
    {
        return $this->streamFactory->createStream($content);
    }

    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        return $this->streamFactory->createStreamFromFile($filename, $mode);
    }

    public function createStreamFromResource($resource): StreamInterface
    {
        return $this->streamFactory->createStreamFromResource($resource);
    }

    public function createUploadedFile(StreamInterface $stream, ?int $size = null, int $error = UPLOAD_ERR_OK, ?string $clientFilename = null, ?string $clientMediaType = null): UploadedFileInterface
    {
        return $this->uploadedFileFactory->createUploadedFile($stream, $size, $error, $clientFilename, $clientMediaType);
    }

    public function createUri(string $uri = ''): UriInterface
    {
        return $this->uriFactory->createUri($uri);
    }
}
