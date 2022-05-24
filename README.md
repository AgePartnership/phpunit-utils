# Age Partnership PHP Unit Utils
A set of handy helpers for PHP unit testing

## Helpers
### Reflection Helper
The ReflectionHelper has tools and utilities for creating reflections.

#### ReflectionHelper::getPrivateMethod(string|object $class, string $methodName): ReflectionMethod
Takes an instance of a class and method name and returns a `ReflectionMethod` on which to call `invokeArgs([])`

Example: Creates and calls a reflection of `Page->findTemplate($mercuryRoute)`
```
$pageRouter = new Page($routeConfig);

$findTemplateReflection = ReflectionHelper::getPrivateMethod($pageRouter, "findTemplate");

$templatePath = $findTemplateReflection->invokeArgs($pageRouter, [$mercuryRoute]);
```

#### ReflectionHelper::getPrivatePropertyValue(object $class, string $propertyName): mixed
Takes an instance of a class and property name and returns the value of the property.

Example: Gets a value of the private property `MercuryRouter->routerType`
```
$mercuryRouter = new MercuryRouter();

$routerType = ReflectionHelper::getPrivatePropertyValue($mercuryRouter, 'routerType');
```


#### ReflectionHelper::getPrivateProperty(string|object $class, string $propertyName): ReflectionProperty
Takes an instance of a class and property name and returns a `ReflectionProperty`.