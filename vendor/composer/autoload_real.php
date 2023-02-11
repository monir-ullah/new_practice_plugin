<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit51b523f56e298134d109fbc73bbc4aba
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit51b523f56e298134d109fbc73bbc4aba', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit51b523f56e298134d109fbc73bbc4aba', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit51b523f56e298134d109fbc73bbc4aba::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}