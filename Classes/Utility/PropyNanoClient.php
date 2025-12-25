<?php

namespace Propy\CoreBundle\Classes\Utility;

use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;

class PropyNanoClient extends Client
{
    public const SAFE_SYMBOLS = '_-0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public const CLEAN_SYMBOLS = '0123456789abcdefghijklmnopqrstuvwxyz';

    public function __construct($size = 21, ?GeneratorInterface $generator = null)
    {
        parent::__construct($size, $generator);
    }

    public function getId(int $size = 21): string
    {
        if ($size < 10) {
            $size = 10;
        }

        $this->alphabet = self::SAFE_SYMBOLS;

        do {
            $nanoId = $this->generateId($size, Client::MODE_DYNAMIC);
        } while (!preg_match('/^[a-zA-Z].*[a-zA-Z0-9]$/i', $nanoId));

        return $nanoId;
    }

    public function getCleanId(int $size = 21): string
    {
        if ($size < 10) {
            $size = 10;
        }

        $this->alphabet = self::CLEAN_SYMBOLS;

        return $this->generateId($size, Client::MODE_DYNAMIC);
    }
}
