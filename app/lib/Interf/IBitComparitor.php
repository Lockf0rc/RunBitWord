<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/23/2016
 * Time: 11:49 AM
 */

namespace Lockf0rc\Bitwords\Interf;

use Lockf0rc\Bitwords\BitWord;

abstract class IBitComparitor implements IListLogic
{
    protected $comparitor = array();



    public function getComparitor()
    {
        return $this->comparitor;
    }

    public function addComparitor(BitWord $item)
    {
        $this->comparitor[] = $item;
    }

    public function resetComparitor()
    {
        $this->comparitor = array();
    }

}