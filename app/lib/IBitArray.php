<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/2/2016
 * Time: 8:34 PM
 */

namespace Lockf0rc\Bitwords;

abstract class IBitArray implements \Iterator
{
    var $bitList;
    abstract function store(BitWord $bit,$bitArray);
    abstract function display($n=null);
    abstract function add(BitWord $word);
    abstract function addList(BitFactory $bits);
    abstract public function getBitList();

}