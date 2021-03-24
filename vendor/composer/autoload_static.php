<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitacd43afbf2bb582c7841fcb817cbbeeb
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitacd43afbf2bb582c7841fcb817cbbeeb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitacd43afbf2bb582c7841fcb817cbbeeb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitacd43afbf2bb582c7841fcb817cbbeeb::$classMap;

        }, null, ClassLoader::class);
    }
}
