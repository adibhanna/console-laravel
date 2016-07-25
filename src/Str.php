<?php

/*
 * This file is part of the lucid-console project.
 *
 * (c) Vinelab <dev@vinelab.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lucid\Console;

/**
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class Str
{
    /**
     * Determine the real name of the given name,
     * excluding the given pattern.
     * 	i.e. the name: "CreateArticleFeature.php" with pattern '/Feature.php'
     * 		will result in "Create Article"
     *
     * @param  string $name
     * @param  string $pattern
     *
     * @return string
     */
    public static function realName($name, $pattern = '//')
    {
        $name = preg_replace($pattern, '', $name);

        return implode(' ', preg_split('/(?=[A-Z])/', $name, -1, PREG_SPLIT_NO_EMPTY));
    }

    /**
     * Get the given name formatted as a feature.
     *
     * 	i.e. "Create Post Feature", "CreatePostFeature.php", "createPost", "createe"
     * 	and many other forms will be transformed to "CreatePostFeature" which is
     * 	the standard feature class name.
     *
     * @param  string $name
     *
     * @return string
     */
    public static function feature($name)
    {
        return studly_case(preg_replace('/Feature(\.php)?$/', '', $name).'Feature');
    }

    /**
     * Get the given name formatted as a job.
     *
     * 	i.e. "Create Post Feature", "CreatePostJob.php", "createPost",
     * 	and many other forms will be transformed to "CreatePostJob" which is
     * 	the standard job class name.
     *
     * @param  string $name
     *
     * @return string
     */
    public static function job($name)
    {
        return studly_case(preg_replace('/Feature(\.php)?$/', '', $name).'Job');
    }

    /**
     * Get the given name formatted as a domain.
     *
     * Domain names are just CamelCase
     *
     * @param  string $name
     *
     * @return string
     */
    public static function domain($name)
    {
        return studly_case($name);
    }

    /**
     * Get the given name formatted as a service name.
     *
     * @param  string $name
     *
     * @return string
     */
    public static function service($name)
    {
        return studly_case($name);
    }
}