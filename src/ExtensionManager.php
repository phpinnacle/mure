<?php

declare(strict_types=1);

namespace PHPinnacle\Mure;

use ZEngine\Core;
use ZEngine\Reflection\ReflectionClass;

class ExtensionManager
{
    public static function init(string ...$extensions): void
    {
        Core::init();

        foreach ($extensions as $extension) {
            self::install($extension);
        }
    }

    public static function install(string $extensionName): void
    {
        $extension = new ReflectionClass($extensionName);

        foreach ($extension->getMethods() as $source) {
            if (
                $source->isStatic() === false ||
                $source->isAbstract() === true ||
                $source->getNumberOfParameters() === 0
            ) {
                continue;
            }

            $parameter = current($source->getParameters());

            if (!$parameterClass = $parameter->getClass()) {
                continue;
            }

            $extend = new ReflectionClass($parameterClass->getName());
            $target = $extend->addMethod($source->getName(), function (...$args) use ($source) {
                return $source->invoke(null, $this, ...$args);
            });

            $target->setFinal($source->isFinal());
            $target->setDeprecated($source->isDeprecated());
        }
    }
}
