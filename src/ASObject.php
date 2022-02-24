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

/**
 * @property int $exp
 * @property string $sub
 */
class ASObject
{
    public function __construct(private object $object)
    {
    }

    public function __get(string $name)
    {
        return $this->object?->{$name} ?? null;
    }
}
