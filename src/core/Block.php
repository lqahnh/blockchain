<?php
declare(strict_types=1);
namespace bc\core;

/**
 * 区块的定义
 * @author LC
 *
 */
class Block implements BlockInterface
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $nonce;
    /**
     * @var string
     */
    private $data;
    /**
     * @var ?string
     */
    private $previousHash;
    /**
     * @var string
     */
    private $hash;
    /**
     * @var int
     */
    private $timestamp;
    /**
     * Block constructor.
     * @param int $id
     * @param int $nonce
     * @param string $data
     * @param string $previousHash
     * @param string $hash
     * @param int $timestamp
     */
    public function __construct(
        int $id,
        int $nonce,
        string $data,
        string $previousHash,
        string $hash,
        int $timestamp
    ) {
        $this->id           = $id;
        $this->nonce        = $nonce;
        $this->data         = $data;
        $this->previousHash = $previousHash;
        $this->hash         = $hash;
        $this->timestamp    = $timestamp;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @return int
     */
    public function getNonce(): int
    {
        return $this->nonce;
    }
    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }
    /**
     * @return string
     */
    public function getPreviousHash(): string
    {
        return $this->previousHash;
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
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }
}

?>