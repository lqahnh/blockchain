<?php
declare(strict_types=1);

namespace Widi\BlockChain;

use Widi\BlockChain\Exception\BlockInvalidException;
use Widi\BlockChain\Exception\BlockNotFoundException;
use Widi\BlockChain\Mine\Miner;

/**
 * Class BlockChain
 * @package Widi\BlockChain
 */
class BlockChain implements BlockChainInterface
{
    /**
     * @var Block[]
     */
    private $blocks = [];

    /**
     * @var Miner
     */
    private $miner;

    /**
     * @var Validator
     */
    public $validator;

    /**
     * BlockChain constructor.
     *
     * @param Block[]   $blocks
     * @param Miner     $miner
     * @param Validator $validator
     */
    public function __construct(Miner $miner, Validator $validator)
    {
        $this->miner     = $miner;
        $this->validator = $validator;
    }

    /**
     * @param string $data
     * @return BlockChain
     * @throws BlockInvalidException
     */
    public function addBlock(string $data): Block
    {
        $id                = count($this->blocks);
        $previousBlockHash = $this->createPreviousBlockHash($id);

        $block = $this->miner->createBlock($id, $data, $previousBlockHash);

        if (!$this->validator->validate($block)) {
            throw new BlockInvalidException($block);
        }

        $this->blocks[] = $block;

        return $block;
    }

    /**
     * @param int $id
     * @return Block
     * @throws BlockNotFoundException
     */
    public function getBlock(int $id): Block
    {
        if (!isset($this->blocks[$id])) {
            throw new BlockNotFoundException($id);
        }

        return $this->blocks[$id];
    }
    
    /**
     * 
     * @return array
     */
    public function getBlocks(): array
    {
        return $this->blocks;
    }

    /**
     * @return int
     */
    public function getBlockCount(): int
    {
        return count($this->blocks);
    }

    /**
     * @param $id
     * @return string
     */
    private function createPreviousBlockHash(int $id): ?string
    {
        if ($id !== 0) {
            $previousBlockHash = $this->blocks[$id - 1]->getHash();
        } else {
            $previousBlockHash = null;
        }

        return $previousBlockHash;
    }
}