<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\psr17;

// phpcs:disable Generic.Files.LineLength.TooLong
use Psr\Http\Message\{RequestFactoryInterface, ResponseFactoryInterface, ServerRequestFactoryInterface,  StreamFactoryInterface,  UploadedFileFactoryInterface, UriFactoryInterface};

interface Psr17Interface extends RequestFactoryInterface, ResponseFactoryInterface, ServerRequestFactoryInterface, StreamFactoryInterface, UploadedFileFactoryInterface, UriFactoryInterface
{
}
