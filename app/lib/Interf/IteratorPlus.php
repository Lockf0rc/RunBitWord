<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/19/2016
 * Time: 9:46 PM
 */

namespace Lockf0rc\Bitwords\Interf;


abstract class IteratorPlus implements \Iterator
{
    abstract public function count();

    abstract public function reset();
}