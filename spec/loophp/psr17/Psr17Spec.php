<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\psr17;

use loophp\psr17\Psr17;
use Nyholm\Psr7\Stream;
use PhpSpec\ObjectBehavior;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

class Psr17Spec extends ObjectBehavior
{
    public function it_can_create_a_request(RequestFactoryInterface $requestFactory, ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory, UploadedFileFactoryInterface $uploadedFileFactory, UriFactoryInterface $uriFactory, ServerRequestFactoryInterface $serverRequestFactory)
    {
        $this->beConstructedWith($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);

        $parameters = ['GET', 'https://github.com'];

        $requestFactory
            ->createRequest(...$parameters)
            ->shouldBeCalledOnce();

        $this
            ->createRequest(...$parameters);
    }

    public function it_can_create_a_response(RequestFactoryInterface $requestFactory, ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory, UploadedFileFactoryInterface $uploadedFileFactory, UriFactoryInterface $uriFactory, ServerRequestFactoryInterface $serverRequestFactory)
    {
        $this->beConstructedWith($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);

        $parameters = [200, 'reason'];

        $responseFactory
            ->createResponse(...$parameters)
            ->shouldBeCalledOnce();

        $this
            ->createResponse(...$parameters);

        $responseFactory
            ->createResponse(200, '')
            ->shouldBeCalledOnce();

        $this
            ->createResponse();
    }

    public function it_can_create_a_server_request(RequestFactoryInterface $requestFactory, ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory, UploadedFileFactoryInterface $uploadedFileFactory, UriFactoryInterface $uriFactory, ServerRequestFactoryInterface $serverRequestFactory)
    {
        $this->beConstructedWith($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);

        $parameters = ['GET', 'https://github.com', []];

        $serverRequestFactory
            ->createServerRequest(...$parameters)
            ->shouldBeCalledOnce();

        $this
            ->createServerRequest(...$parameters);
    }

    public function it_can_create_a_stream(RequestFactoryInterface $requestFactory, ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory, UploadedFileFactoryInterface $uploadedFileFactory, UriFactoryInterface $uriFactory, ServerRequestFactoryInterface $serverRequestFactory)
    {
        $this->beConstructedWith($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);

        $parameters = ['stream'];

        $streamFactory
            ->createStream(...$parameters)
            ->shouldBeCalledOnce();

        $this
            ->createStream(...$parameters);

        $streamFactory
            ->createStream('')
            ->shouldBeCalledOnce();

        $this
            ->createStream();
    }

    public function it_can_create_a_stream_from_file(RequestFactoryInterface $requestFactory, ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory, UploadedFileFactoryInterface $uploadedFileFactory, UriFactoryInterface $uriFactory, ServerRequestFactoryInterface $serverRequestFactory)
    {
        $this->beConstructedWith($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);

        $parameters = ['__FILE__', 'r'];

        $streamFactory
            ->createStreamFromFile(...$parameters)
            ->shouldBeCalledOnce();

        $this
            ->createStreamFromFile(...$parameters);
    }

    public function it_can_create_a_stream_from_resource(RequestFactoryInterface $requestFactory, ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory, UploadedFileFactoryInterface $uploadedFileFactory, UriFactoryInterface $uriFactory, ServerRequestFactoryInterface $serverRequestFactory)
    {
        $this->beConstructedWith($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);

        $parameters = [fopen(__FILE__, 'rb')];

        $streamFactory
            ->createStreamFromResource(...$parameters)
            ->shouldBeCalledOnce();

        $this
            ->createStreamFromResource(...$parameters);
    }

    public function it_can_create_an_uploaded_file(RequestFactoryInterface $requestFactory, ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory, UploadedFileFactoryInterface $uploadedFileFactory, UriFactoryInterface $uriFactory, ServerRequestFactoryInterface $serverRequestFactory)
    {
        $this->beConstructedWith($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);

        $stream = Stream::create('content');

        $parameters = [$stream, null, 0, 'x', 'y'];

        $uploadedFileFactory
            ->createUploadedFile(...$parameters)
            ->shouldBeCalledOnce();

        $this
            ->createUploadedFile(...$parameters);
    }

    public function it_can_create_an_uri(RequestFactoryInterface $requestFactory, ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory, UploadedFileFactoryInterface $uploadedFileFactory, UriFactoryInterface $uriFactory, ServerRequestFactoryInterface $serverRequestFactory)
    {
        $this->beConstructedWith($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);

        $parameters = ['https://github.com'];

        $uriFactory
            ->createUri(...$parameters)
            ->shouldBeCalledOnce();

        $this
            ->createUri(...$parameters);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Psr17::class);
    }

    public function let(RequestFactoryInterface $requestFactory, ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory, UploadedFileFactoryInterface $uploadedFileFactory, UriFactoryInterface $uriFactory, ServerRequestFactoryInterface $serverRequestFactory)
    {
        $this->beConstructedWith($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);
    }
}
