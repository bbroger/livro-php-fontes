<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9705cd7ba9e40bcef65b77934b22745c
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mvc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9705cd7ba9e40bcef65b77934b22745c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9705cd7ba9e40bcef65b77934b22745c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
