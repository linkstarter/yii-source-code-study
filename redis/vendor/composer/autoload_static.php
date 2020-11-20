<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd7cde0a58e0d8e392830c3f74650c8df
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
    );

    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yii\\redis\\' => 10,
            'yii\\composer\\' => 13,
            'yii\\' => 4,
        ),
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yii\\redis\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-redis/src',
        ),
        'yii\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-composer',
        ),
        'yii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2',
        ),
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd7cde0a58e0d8e392830c3f74650c8df::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd7cde0a58e0d8e392830c3f74650c8df::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd7cde0a58e0d8e392830c3f74650c8df::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd7cde0a58e0d8e392830c3f74650c8df::$classMap;

        }, null, ClassLoader::class);
    }
}
