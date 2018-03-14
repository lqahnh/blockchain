<?php
declare(strict_types=1);

namespace Widi\BlockChain\Demo;

use Widi\BlockChain\BlockChain;
use Widi\BlockChain\Exception\BlockChainExceptionInterface;
use Widi\BlockChain\Mine\Criteria;
use Widi\BlockChain\Mine\Miner;
use Widi\BlockChain\Mine\Procedure;
use Widi\BlockChain\Validator;

include 'Loader.php'; // 引入加载器
spl_autoload_register('Loader::autoload'); // 注册自动加载


$procedure  = new Procedure();
$criteria   = new Criteria();
$miner      = new Miner($procedure, $criteria);
$validator  = new Validator($miner);
$blockChain = new BlockChain($miner, $validator);

try {
    for ($id = 0; $id <3; $id++) {
        $blockChain->addBlock('block: ' . $id);
        echo 'created ' . $id . ' with ' . $blockChain->getBlock($id)->getPreviousHash() . '/' . $blockChain->getBlock($id)->getHash().'/'. $blockChain->getBlock($id)->getNonce() . PHP_EOL;
    }
} catch (BlockChainExceptionInterface $blockChainException) {
    echo 'block chain exception';
}

//$blockChain->addBlock('block: 0' );
//$block = $blockChain->addBlock('block: 1' );
//print_r($block);

