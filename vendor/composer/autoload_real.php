<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitec5dc8a78e9c276455127bb59f0567dc
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

        spl_autoload_register(array('ComposerAutoloaderInitec5dc8a78e9c276455127bb59f0567dc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitec5dc8a78e9c276455127bb59f0567dc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitec5dc8a78e9c276455127bb59f0567dc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
