<?php
declare(strict_types=1);

namespace Widi\BlockChain\Mine;

use Widi\BlockChain\Block;
use Widi\BlockChain\BlockInterface;

/**
 * Class Miner
 * @package Widi\BlockChain\Mine
 */
class Miner implements MinerInterface
{
    /**
     * @var ProcedureInterface
     */
    private $procedure;

    /**
     * @var CriteriaInterface
     */
    private $criteria;

    /**
     * Miner constructor.
     *
     * @param ProcedureInterface $procedure
     * @param CriteriaInterface  $criteria
     */
    public function __construct(ProcedureInterface $procedure, CriteriaInterface $criteria)
    {
        $this->procedure = $procedure;
        $this->criteria  = $criteria;
    }

    /**
     * @param int $id
     * @param string $data
     * @param string $previousHash
     * @return Block
     */
    public function createBlock(
        int $id,
        string $data,
        ?string $previousHash = null
    ): Block {
        $timestamp = time();
        $model     = $this->mine($id, $data, $previousHash, $timestamp);
        return new Block($id, $model->getNonce(), $data, $previousHash, $model->getHash(), $model->getTimestamp());
    }

    /**
     * @param string $hash
     * @return bool
     */
    public function hashMeetsCriteria(string $hash): bool
    {
        return $this->criteria->meetsHash($hash);
    }

    /**
     * @param BlockInterface $block
     * @param int            $nonce
     *
     * @return string
     */
    public function getBlockHashWithNonce(BlockInterface $block, int $nonce): string
    {
        return $this->procedure->createHashWithNonce(
            $block->getId()
            . $block->getData()
            . $block->getPreviousHash()
            . $block->getTimestamp(),
            $nonce
        );
    }

    /**
     * @param int $id
     * @param string $data
     * @param string $previousHash
     * @param int $timestamp
     * @return Model
     */
    private function mine(
        int $id,
        string $data,
        ?string $previousHash,
        int $timestamp
    ): Model {

        return $this->procedure->findHash(
            $id
            . $data
            . $previousHash
            . $timestamp,
            $timestamp,
            $this->criteria
        );
    }
}