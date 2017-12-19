<?php

namespace PCPayClient\Utils;

/**
 * This is a Simple Dependency Injection Container for PchomePay
 * (Using [] for empty array definition, please install php version greater than 5.4)
 *
 * @author Eric G. Huang <justericgg@pchomepay.com.tw>
 */
class PPDIC
{
    protected static $instances = [];
    protected static $instancesCallCounts = [];

    /**
     * Setting an object instance into PPDIC
     *
     * @param object $classInstance
     * @param string $className
     *
     */
    public static function set($classInstance, $className)
    {
        static::checkNamespace($className);

        static::$instances[$className] = $classInstance;
    }

    /**
     *  Getting an object from PPDIC
     *
     * @param string $className
     * @param null $constructs
     * @return object
     * @throws \Exception
     */
    public static function get($className, $constructs = null)
    {

        static::checkNamespace($className);

        if (array_key_exists($className, static::$instances)) {
            $result = static::$instances[$className];

            static::addInstanceCount($className);

            return $result;
        } else {
            if (class_exists($className)) {

                if ($constructs == null) {
                    $result = new $className();
                } else {
                    $reflection = new \ReflectionClass($className);
                    $result = $reflection->newInstanceArgs($constructs);


                    //$result = new $className(...$constructs);
                }

                static::$instances[$className] = $result;
                static::addInstanceCount($className);

                return $result;
            } else {
                throw new \Exception("Class:{$className} does not exist");
            }
        }
    }

    /**
     * Check the first character of namespace is "\"
     *
     * @param string $namespace
     * @return void
     */
    private static function checkNamespace(&$namespace)
    {
        $firstCharacter = substr($namespace, 0, 1);
        if ($firstCharacter !== "\\") {
            $namespace = '\\' . $namespace;
        }
    }

    /**
     * @param sting $className
     * @return void
     */
    private static function addInstanceCount($className)
    {
        if (array_key_exists($className, static::$instancesCallCounts)) {
            static::$instancesCallCounts[$className]++;
        } else {
            static::$instancesCallCounts[$className] = 1;
        }
    }

    /**
     * Return count of initiated class via PPDIC
     *
     * @param string $className
     * @return int | array
     */
    public static function showObjectCall($className = null)
    {
        if (!is_null($className)) {
            if (isset(static::$instancesCallCount[$className])) {
                return static::$instancesCallCount[$className];
            } else {
                return "Class does not exist.";
            }
        } else {
            $result = static::$instancesCallCounts;
            return $result;
        }
    }

    public static function flush()
    {
        static::$instances = [];
        static::$instancesCallCounts = [];
    }

}
