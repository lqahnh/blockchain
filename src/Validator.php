<?php
declare(strict_types=1);

namespace Widi\BlockChain;

use Widi\BlockChain\Mine\Criteria;
use Widi\BlockChain\Mine\Miner;
use Widi\BlockChain\Mine\MinerInterface;
use Widi\BlockChain\Mine\Procedure;

/**
 * Class Validator
 * @package Widi\BlockChain
 */
class Validator implements ValidatorInterface
{
    /**
     * @var MinerInterface
     */
    private $miner;

    /**
     * Validator constructor.
     *
     * @param Miner $miner
     */
    public function __construct(MinerInterface $miner)
    {
        $this->miner = $miner;
    }

    /**
     * @param BlockInterface $block
     *
     * @return bool
     */
    public function validate(BlockInterface $block): bool
    {
        if (
            !$this->miner->hashMeetsCriteria($block->getHash())
        ) {
            return false;
        }

        return $this->miner->getBlockHashWithNonce($block, $block->getNonce()) === $block->getHash();
    }
}