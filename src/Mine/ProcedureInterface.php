<?php
declare(strict_types=1);

namespace Widi\BlockChain\Mine;

/**
 * Class Procedure
 *
 * @package Widi\BlockChain\Mine
 */
interface ProcedureInterface
{
    /**
     * @param string   $data
     * @param int      $timestamp
     * @param CriteriaInterface $criteria
     *
     * @return Model
     */
    public function findHash(string $data, int $timestamp, CriteriaInterface $criteria): Model;

    /**
     * @param string $data
     * @param int    $nonce
     *
     * @return string
     */
    public function createHashWithNonce(string $data, int $nonce): string;
}