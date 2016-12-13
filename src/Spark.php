<?php

namespace Sparkline;


class Spark
{
    public static function getString(array $items, $min = null, $max = null)
    {
        if (null === $min) {
            $min = min($items);
        }
        if (null === $max) {
            $max = max($items);
        }
        $delta = $max - $min;

        if (!$delta) {
            return str_repeat('▅', count($items));
        }

        $ticks = array('▁', '▂', '▃', '▄', '▅', '▆', '▇', '█');

        $result = '';
        foreach ($items as $item) {
            $index = (int)(7 * ($item - $min) / $delta);
            $result .= $ticks[$index];
        }

        return $result;
    }
}