<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08fb7dc51bbdda1764b8e6e815429b28
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'sskaje\\converter\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'sskaje\\converter\\' => 
        array (
            0 => __DIR__ . '/../..' . '/converter',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit08fb7dc51bbdda1764b8e6e815429b28::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08fb7dc51bbdda1764b8e6e815429b28::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
