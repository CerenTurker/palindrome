<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb1a5e088a22d40b30bc4547767e90e45
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Operation\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Operation\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Operation\\Palindrome\\PalindromeFinder' => __DIR__ . '/../..' . '/src/Palindrome/PalindromeFinder.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb1a5e088a22d40b30bc4547767e90e45::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb1a5e088a22d40b30bc4547767e90e45::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb1a5e088a22d40b30bc4547767e90e45::$classMap;

        }, null, ClassLoader::class);
    }
}
