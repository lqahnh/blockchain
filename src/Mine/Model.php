<?php
declare(strict_types=1);

namespace Widi\BlockChain\Mine;

/**
 * Class Model
 * @package Widi\BlockChain\Mine
 */
class Model implements ModelInterface
{
    /**
     * @var string
     */
    private $hash;

    /**
     * @var int
     */
    private $nonce;

    /**
     * @var int
     */
    private $timestamp;

    /**
     * Model constructor.
     * @param string $hash
     * @param int $nonce
     * @param int $timestamp
     */
    public function __construct(string $hash, int $nonce, int $timestamp)
    {
        $this->hash      = $hash;
        $this->nonce     = $nonce;
        $this->timestamp = $timestamp;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return int
     */
    public function getNonce(): int
    {
        return $this->nonce;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }
}