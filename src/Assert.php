<?php

declare(strict_types=1);

namespace Yii\Support;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionObject;
use RuntimeException;
use Yiisoft\Files\FileHelper;

use function closedir;
use function is_dir;
use function opendir;
use function readdir;
use function str_replace;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class Assert extends TestCase
{
    /**
     * Asserting two strings equality ignoring line endings.
     *
     * @param string $expected The expected string.
     * @param string $actual The actual string.
     * @param string $message The message to display if the assertion fails.
     */
    public static function equalsWithoutLE(string $expected, string $actual, string $message = ''): void
    {
        $expected = str_replace("\r\n", "\n", $expected);
        $actual = str_replace("\r\n", "\n", $actual);

        self::assertEquals($expected, $actual, $message);
    }

    /**
     * Gets an inaccessible object property.
     *
     * @param object $object The object to get the property from.
     * @param string $propertyName The name of the property to get.
     */
    public static function inaccessibleProperty(object $object, string $propertyName): mixed
    {
        $class = new ReflectionClass($object);

        $result = null;

        if ($propertyName !== '') {
            $property = $class->getProperty($propertyName);

            /** @psalm-var mixed $result */
            $result = $property->getValue($object);
        }

        return $result;
    }

    /**
     * Invokes an inaccessible method.
     *
     * @param object $object The object to invoke the method on.
     * @param string $method The name of the method to invoke.
     * @param array $args The arguments to pass to the method.
     */
    public static function invokeMethod(object $object, string $method, array $args = []): mixed
    {
        $reflection = new ReflectionObject($object);

        $result = null;

        if ($method !== '') {
            $method = $reflection->getMethod($method);

            /** @psalm-var mixed $result */
            $result = $method->invokeArgs($object, $args);
        }

        return $result;
    }

    /**
     * Remove files from the directory.
     *
     * @param string $basePath The directory to remove files from.
     *
     * @throws RuntimeException
     */
    public static function removeFilesFromDirectory(string $basePath): void
    {
        $handle = opendir($basePath);

        if ($handle === false) {
            throw new RuntimeException("Unable to open directory: $basePath");
        }

        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..' || $file === '.gitignore' || $file === '.gitkeep') {
                continue;
            }

            $path = $basePath . DIRECTORY_SEPARATOR . $file;

            if (is_dir($path)) {
                FileHelper::removeDirectory($path);
            } else {
                FileHelper::unlink($path);
            }
        }

        closedir($handle);
    }
}
