<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/2/2016
 * Time: 8:34 PM
 */

namespace Lockf0rc\Bitwords\Interf;

use Lockf0rc\Bitwords\BitFactory;
use Lockf0rc\Bitwords\BitWord;

abstract class IBitArray extends IteratorPlus
{
    protected $bitList;

    abstract function store(BitWord $bit, $TestKeys);
    abstract function add(BitWord $word);
    abstract function addList(BitFactory $bits);
    abstract public function getBitList();


}