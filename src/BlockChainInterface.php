<?php
declare(strict_types=1);

namespace Widi\BlockChain;

use Widi\BlockChain\Exception\BlockInvalidException;
use Widi\BlockChain\Exception\BlockNotFoundException;

/**
 * Class BlockChain
 *
 * @package Widi\BlockChain
 */
interface BlockChainInterface
{
    /**
     * @param string $data
     *
     * @return BlockChain
     * @throws BlockInvalidException
     */
    public function addBlock(string $data): Block;

    /**
     * @param int $id
     *
     * @return Block
     * @throws BlockNotFoundException
     */
    public function getBlock(int $id): Block;

    /**
     * @return int
     */
    public function getBlockCount(): int;
}