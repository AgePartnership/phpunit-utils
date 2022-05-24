<?php

namespace AgePartnership\PHPUnitUtils;

use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;

/**
 * Helpers to create reflections
 *
 * @package   AgePartnership/phpunit-utils
 * @author    Kieran Phillips <kieran.phillips@agepartnership.com>
 * @copyright 2022 Age Partnership Ltd.
 * @license   Private Software
 * @link      [https://agepartnership.atlassian.net/wiki/spaces/WTD/pages/2362114055/phg-routing]
 * @since     1.0.0
 * @version   1.0.0
 */
class ReflectionHelper
{
    /**
     * Returns a reflection of a method on which to call invokeArgs().
     *
     * @param string|object $class  Name or instance of class containing method
     * @param string $methodName    Name of method
     * 
     * @return ReflectionMethod
     */
    public static function getPrivateMethod(string|object $class, string $methodName): ReflectionMethod
    {
        $reflector = new ReflectionClass($class);
        $method = $reflector->getMethod($methodName);
        $method->setAccessible(true);

        return $method;
    }

    /**
     * Returns a property from a reflection
     *
     * @param string|object $class  Name or instance class containing property
     * @param string $propertyName  Name of member property
     * 
     * @return ReflectionProperty
     */
    public static function getPrivateProperty(string|object $class, string $propertyName): ReflectionProperty
    {
        $reflector = new ReflectionClass($class);
        $property = $reflector->getProperty($propertyName);
        $property->setAccessible(true);

        return $property;
    }

    /**
     * Returns a property value from a reflection
     *
     * @param object $class         Instance class containing property
     * @param string $propertyName  Name of member property
     * 
     * @return mixed
     */
    public static function getPrivatePropertyValue(object $class, string $propertyName): mixed
    {
        $property = self::getPrivateProperty($class, $propertyName)->getValue($class);

        return $property;
    }
}
