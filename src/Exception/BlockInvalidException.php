<?php
declare(strict_types=1);

namespace Widi\BlockChain\Exception;

use Widi\BlockChain\Block;

/**
 * Class BlockInvalidException
 * @package Widi\BlockChain\Exception
 */
class BlockInvalidException extends \Exception implements BlockChainExceptionInterface
{

    /**
     * BlockInvalidException constructor.
     * @param Block $block
     * @param null|\Throwable $previous
     */
    public function __construct(Block $block, ?\Throwable $previous = null)
    {
        parent::__construct('Bock invalid: ' . $block->getHash(), 0, $previous);
    }
}