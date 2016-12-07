<?php

namespace Bolt\Twig\Extension;

use Bolt\Twig\Runtime;
use Twig_Extension as Extension;

/**
 * General-purpose utility functionality Twig extension.
 *
 * @internal
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class UtilsExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        $safe = ['is_safe' => ['html']];
        $deprecated = ['deprecated' => true];

        return [
            // @codingStandardsIgnoreStart
            new \Twig_SimpleFunction('backtrace',   [Runtime\UtilsRuntime::class, 'printBacktrace']),
            new \Twig_SimpleFunction('dump',        [Runtime\UtilsRuntime::class, 'printDump']),
            new \Twig_SimpleFunction('file_exists', [Runtime\UtilsRuntime::class, 'fileExists'], $deprecated),
            new \Twig_SimpleFunction('firebug',     [Runtime\UtilsRuntime::class, 'printFirebug']),
            new \Twig_SimpleFunction('print',       [Runtime\UtilsRuntime::class, 'printDump'], $deprecated + ['alternative' => 'dump']),
            new \Twig_SimpleFunction('redirect',    [Runtime\UtilsRuntime::class, 'redirect'], $safe),
            new \Twig_SimpleFunction('request',     [Runtime\UtilsRuntime::class, 'request']),
            // @codingStandardsIgnoreEnd
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [];
    }
}