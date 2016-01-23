<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/23/2016
 * Time: 11:49 AM
 */

namespace Lockf0rc\Bitwords\Interf;

abstract class IBitComparitor implements IListLogic
{
    protected $comparitor;

    public function isUnique($value, $rand)
    {
        $this->setComparitor($value);
        $bool = (!(in_array($this->getComparitor(), $rand)));
        return $bool;
    }

    public function getComparitor()
    {
        return $this->comparitor;
    }

    public function setComparitor($comparitor)
    {
        $this->comparitor = $comparitor;
    }

}