<?php
declare(strict_types=1);

namespace Widi\BlockChain\Mine;

/**
 * Class Criteria
 *
 * @package Widi\BlockChain\Mine
 */
interface CriteriaInterface
{
    /**
     * @param string $hash
     *
     * @return bool
     */
    public function meetsHash(string $hash): bool;
}