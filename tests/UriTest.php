<?php

declare(strict_types=1);

/**
 * @project Castor Uri
 * @link https://github.com/castor-labs/uri
 * @package castor/uri
 * @author Matias Navarro-Carter mnavarrocarter@gmail.com
 * @license MIT
 * @copyright 2021 CastorLabs Ltd
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Castor\Net;

use PHPUnit\Framework\TestCase;

/**
 * Class UriTest.
 *
 * @internal
 * @coversNothing
 */
class UriTest extends TestCase
{
    /**
     * @dataProvider getUris
     *
     * @throws InvalidUri
     */
    public function testItParsesUris(string $uri, string $parsed): void
    {
        self::assertSame($parsed, Uri::parse($uri)->toStr());
    }

    public function getUris(): array
    {
        return [
            ['https://example.com', 'https://example.com'],
            ['http://example.com/', 'http://example.com/'],
            ['ftp://user:pass@some.host/file.txt', 'ftp://user:pass@some.host/file.txt'],
            ['tel:+1-816-555-1212', 'tel:+1-816-555-1212'],
            ['mailto:John.Doe@example.com', 'mailto:John.Doe@example.com'],
        ];
    }
}
