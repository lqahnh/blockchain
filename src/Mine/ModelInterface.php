<?php
declare(strict_types=1);

namespace Widi\BlockChain\Mine;

/**
 * Class Model
 *
 * @package Widi\BlockChain\Mine
 */
interface ModelInterface
{
    /**
     * @return string
     */
    public function getHash(): string;

    /**
     * @return int
     */
    public function getNonce(): int;

    /**
     * @return int
     */
    public function getTimestamp(): int;
}