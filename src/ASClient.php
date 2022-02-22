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
namespace KY\ASClient;

use GuzzleHttp\Client;

class ASClient
{
    public function keys(): array
    {
        $client = new Client([
            'base_uri' => 'https://appleid.apple.com/',
        ]);

        $body = (string) $client->get('auth/keys')->getBody();
        return json_decode($body, true, flags: JSON_THROW_ON_ERROR);
    }
}
