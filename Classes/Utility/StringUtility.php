<?php

namespace Propy\CoreBundle\Classes\Utility;

use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;
use Symfony\Component\String\Slugger\AsciiSlugger;

class StringUtility
{
    public static ?AsciiSlugger $slugger = null;

    public static function getRandomKeys(): array
    {
        try {
            $randomByte = random_bytes(100);
            $randomString = bin2hex($randomByte);
        } catch (\Random\RandomException $e) {
            $randomString = self::randomString(300, false);
        }

        $key = hash('sha256', $randomString);
        $key = strtolower($key);

        do {
            $secret = password_hash($randomString, PASSWORD_BCRYPT);
            $secret = strtolower(base64_encode($secret));
            $secret = implode('.', str_split(str_shuffle($secret), rand(20, 30)));
            $secret = implode('-', str_split(str_shuffle($secret), rand(20, 30)));
            $secret = implode('_', str_split(str_shuffle($secret), rand(20, 30)));
            $secret = implode(':', str_split(str_shuffle($secret), rand(20, 30)));
            $secret = implode('@', str_split(str_shuffle($secret), rand(20, 30)));
            $secret = substr($secret, 0, 80);
        } while (!self::isValidEdgeCharacters($secret));

        return [
            'key' => $key,
            'secret' => $secret,
        ];
    }

    public static function randomString($length = 10, $lower = true): string
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = []; // remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; // put the length -1 in cache
        for ($i = 0; $i < $length; ++$i) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $randomString = implode($pass); // turn the array into a string
        if ($lower) {
            return strtolower($randomString);
        }

        return $randomString;
    }

    public static function generatePassword(int $length = 15): string
    {
        $generator = new ComputerPasswordGenerator();
        $generator->setLength($length);
        $generator->setUppercase();
        $generator->setLowercase();
        $generator->setNumbers();
        $generator->setSymbols();
        $generator->setAvoidSimilar();

        return $generator->generatePassword();
    }

    public static function sanitizeTitle(string $string, bool $snakeCase = false): string
    {
        if (null === self::$slugger) {
            self::$slugger = new AsciiSlugger();
        }

        if ($snakeCase) {
            return self::$slugger->slug($string)->snake()->lower();
        }

        return self::$slugger->slug($string)->lower();
    }

    public static function isValidEdgeCharacters(string $input): bool
    {
        // Return true if it starts and ends with only a-z or 0-9
        return 1 === preg_match('/^[a-z0-9].*[a-z0-9]$/i', $input);
    }

    public static function isStrongPassword(string $password): bool
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            return false;
        }

        return true;
    }

    public static function humanReadableFileSize(int $bytes, int $decimals = 1): string
    {
        if ($bytes < 0) {
            return '0 B'; // or throw an exception if negative sizes are invalid
        }

        if (0 === $bytes) {
            return '0 B';
        }

        $units = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        $factor = (int) floor(log($bytes, 1024));
        $factor = min($factor, count($units) - 1);

        $size = $bytes / pow(1024, $factor);

        return sprintf("%.{$decimals}f %s", $size, $units[$factor]);
    }

    public static function isValidUuid7(string $uuid): bool
    {
        // Remove hyphens and convert to lowercase for easier validation
        $cleanUuid = strtolower(str_replace('-', '', $uuid));

        // Check if it's exactly 32 hexadecimal characters
        if (32 !== strlen($cleanUuid) || !ctype_xdigit($cleanUuid)) {
            return false;
        }

        // Check version: 13th character (index 12) should be '7'
        if ('7' !== $cleanUuid[12]) {
            return false;
        }

        // Check variant: 17th character (index 16) should be 8, 9, a, or b
        $variantChar = $cleanUuid[16];
        if (!in_array($variantChar, ['8', '9', 'a', 'b'])) {
            return false;
        }

        // Extract timestamp (first 12 hex characters = 48 bits)
        $timestampHex = substr($cleanUuid, 0, 12);
        $timestamp = hexdec($timestampHex);

        // Validate timestamp is reasonable (not too far in future or past)
        $currentTime = time() * 1000; // Current time in milliseconds
        $oneYearMs = 365 * 24 * 60 * 60 * 1000; // One year in milliseconds

        // Allow timestamps from 1970 to ~100 years in the future
        if ($timestamp < 0 || $timestamp > ($currentTime + (100 * $oneYearMs))) {
            return false;
        }

        return true;
    }
}
