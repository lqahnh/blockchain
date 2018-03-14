<?php
declare(strict_types=1);

namespace Widi\BlockChain\Mine;

use Widi\BlockChain\Block;
use Widi\BlockChain\BlockInterface;

/**
 * Class Miner
 *
 * @package Widi\BlockChain\Mine
 */
interface MinerInterface
{
    /**
     * @param int    $id
     * @param string $data
     * @param string $previousHash
     *
     * @return Block
     */
    public function createBlock(int $id, string $data, ?string $previousHash = null): Block;

    /**
     * @param string $hash
     *
     * @return bool
     */
    public function hashMeetsCriteria(string $hash): bool;

    /**
     * @param BlockInterface $block
     * @param int            $nonce
     *
     * @return string
     */
    public function getBlockHashWithNonce(BlockInterface $block, int $nonce): string;
}