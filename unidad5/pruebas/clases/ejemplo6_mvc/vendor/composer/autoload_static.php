<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd9896419ef55d9463d2db2ac3741b211
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd9896419ef55d9463d2db2ac3741b211::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd9896419ef55d9463d2db2ac3741b211::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd9896419ef55d9463d2db2ac3741b211::$classMap;

        }, null, ClassLoader::class);
    }
}
