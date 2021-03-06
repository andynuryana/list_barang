<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9cbf24c7401d436da7925fb8d3cff28d
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9cbf24c7401d436da7925fb8d3cff28d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9cbf24c7401d436da7925fb8d3cff28d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9cbf24c7401d436da7925fb8d3cff28d::$classMap;

        }, null, ClassLoader::class);
    }
}
