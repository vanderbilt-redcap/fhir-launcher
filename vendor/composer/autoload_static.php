<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd13b50be2f26378b12a76e28bcefa3c2
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'REDCap\\FhirLauncher\\App\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'REDCap\\FhirLauncher\\App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd13b50be2f26378b12a76e28bcefa3c2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd13b50be2f26378b12a76e28bcefa3c2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
