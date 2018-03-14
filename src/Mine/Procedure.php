<?php
declare(strict_types=1);

namespace Widi\BlockChain\Mine;

/**
 * Class Procedure
 * @package Widi\BlockChain\Mine
 */
/**
 * Class Procedure
 * @package Widi\BlockChain\Mine
 */
class Procedure implements ProcedureInterface
{
    /**
     * @param string $data
     * @param int $timestamp
     * @param CriteriaInterface $criteria
     * @return Model
     */
    public function findHash(string $data, int $timestamp, CriteriaInterface $criteria): Model
    {
        $nonce = 0;

        while (!$criteria->meetsHash($this->createHashWithNonce($data, $nonce))) {
            $nonce++;
        }
        return new Model($this->createHashWithNonce($data, $nonce), $nonce, $timestamp);
    }

    /**
     * @param string $data
     * @param int $nonce
     * @return string
     */
    public function createHashWithNonce(string $data, int $nonce): string
    {
        return $this->hash($data . $nonce);
    }

    /**
     * @param string $data
     * @return string
     */
    private function hash(string $data): string
    {
        return hash('sha256', $data);
    }
}