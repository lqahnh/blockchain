<?php
declare(strict_types=1);
namespace bc\core;
/**
 * Class Block
 *
 * @package bc\core
 */
interface BlockInterface
{
    /**
     * @return int
     */
    public function getId(): int;
    /**
     * @return int
     */
    public function getNonce(): int;
    /**
     * @return string
     */
    public function getData(): string;
    /**
     * @return string
     */
    public function getPreviousHash(): string;
    /**
     * @return string
     */
    public function getHash(): string;
    /**
     * @return int
     */
    public function getTimestamp(): int;
}