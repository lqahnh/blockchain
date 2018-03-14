<?php
declare(strict_types=1);

namespace Widi\BlockChain\Exception;

/**
 * Class BlockNotFoundException
 * @package Widi\BlockChain\Exception
 */
class BlockNotFoundException extends \Exception implements BlockChainExceptionInterface
{

    /**
     * BlockNotFoundException constructor.
     * @param int $id
     * @param null|\Throwable $previous
     */
    public function __construct(int $id, ?\Throwable $previous = null)
    {
        parent::__construct('Bock not found: ' . $id, 0, $previous);
    }
}