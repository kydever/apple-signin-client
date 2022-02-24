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

use Firebase\JWT\JWK;
use Firebase\JWT\JWT;

class ASParser
{
    protected array $keys = [];

    protected int $refreshTime = 0;

    public function __construct(private ASClient $client)
    {
    }

    public function decode(string $token): ASObject
    {
        $keys = JWK::parseKeySet($this->keys());

        $object = JWT::decode($token, $keys);

        return new ASObject($object);
    }

    protected function keys(): array
    {
        return $this->load()->keys;
    }

    protected function load(): static
    {
        if (empty($this->keys)) {
            $this->keys = $this->client->keys();
        }

        $expired = 3600 * 4 + rand(0, 3600);
        if ($this->refreshTime + $expired < time()) {
            $this->refreshTime = time();
            $this->keys = $this->client->keys();
        }

        return $this;
    }
}
