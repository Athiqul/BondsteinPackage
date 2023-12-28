<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit866e3eec659c67adb0b2089865f56b4e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Athiq\\Bondsteinscrud\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Athiq\\Bondsteinscrud\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit866e3eec659c67adb0b2089865f56b4e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit866e3eec659c67adb0b2089865f56b4e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit866e3eec659c67adb0b2089865f56b4e::$classMap;

        }, null, ClassLoader::class);
    }
}