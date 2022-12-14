<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaf3afa3b8ecd94548aeb6a9dbb8fe104
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mazhar\\UrlShortner\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mazhar\\UrlShortner\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaf3afa3b8ecd94548aeb6a9dbb8fe104::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaf3afa3b8ecd94548aeb6a9dbb8fe104::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaf3afa3b8ecd94548aeb6a9dbb8fe104::$classMap;

        }, null, ClassLoader::class);
    }
}
