<?php
declare(strict_types=1);

namespace Widi\BlockChain\Mine;

/**
 * Class Criteria
 * @package Widi\BlockChain\Mine
 */
class Criteria implements CriteriaInterface
{
    /**
     * @param string $hash
     * @return bool
     */
    public function meetsHash(string $hash): bool
    {
        return
            substr($hash, 0,3) === '000'
//            && substr($hash, -1,2) === '0'
        ;
    }
}