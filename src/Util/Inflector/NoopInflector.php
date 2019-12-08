<?php

namespace App\Util\Inflector;

use FOS\RestBundle\Inflector\InflectorInterface;

/**
 * Inflector class
 */
class NoopInflector implements InflectorInterface
{
    /**
     * @param  string $word
     * @return string
     */
    public function pluralize($word)
    {
        // Don't pluralize
        return $word;
    }
}