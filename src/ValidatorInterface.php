<?php
declare(strict_types=1);

namespace Widi\BlockChain;

/**
 * Class Validator
 *
 * @package Widi\BlockChain
 */
interface ValidatorInterface
{
    /**
     * @param BlockInterface $block
     *
     * @return bool
     */
    public function validate(BlockInterface $block): bool;
}