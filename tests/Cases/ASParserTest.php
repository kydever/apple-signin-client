<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace HyperfTest\Cases;

use KY\ASClient\ASClient;
use KY\ASClient\ASParser;

/**
 * @internal
 * @coversNothing
 */
class ASParserTest extends AbstractTestCase
{
    public function testDecode()
    {
        $parser = new ASParser(new ASClient());

        $res = $parser->decode('eyJraWQiOiJXNldjT0tCIiwiYWxnIjoiUlMyNTYifQ.eyJpc3MiOiJodHRwczovL2FwcGxlaWQuYXBwbGUuY29tIiwiYXVkIjoiY2Mua25vd3lvdXJzZWxmLmt5aU9TIiwiZXhwIjoxNjQ1NzYxMzc5LCJpYXQiOjE2NDU2NzQ5NzksInN1YiI6IjAwMTkyNi41NDBiYzhlOTc3ZGQ0NWMyYmVlOWU5ZjlmMGMyNmFiMy4wMzExIiwiY19oYXNoIjoiUDlsQzB0OUN4bDlJbGlBQkxuemYydyIsImF1dGhfdGltZSI6MTY0NTY3NDk3OSwibm9uY2Vfc3VwcG9ydGVkIjp0cnVlfQ.P3ZoIyET9feOKQLKW5aKnRDMtVGkpEe8_kPfEAT1vGslnAgDOIw6VgQQEQD1emqpabKKsM01nysaTTgqvfEfCVo0Y77desP70md47zrSr6mhdkiD49gyNOH9Rjov-aZW4bkLzbloQmGi44zKwHWeiahZFSM9wRGXOGEZXarZSsNLotyuB9f3ovl-cUwgYIhc8TjKnv_inAAMvGlxE-bHqMvGdxDvhpMtYVeR-E6sIbI79WVmAlE1gLE1eaWPc3ZITM7PEyuP8kPf3sao-nmtFkauBPu60Bmgo6fGy4rTzimq6aCqJQ076pEA7nr2rFm5Sc6NWRMO2XcINRJo1m0HKA');

        $this->assertNotEmpty($res->sub);
        $this->assertIsInt($res->exp);
    }
}
