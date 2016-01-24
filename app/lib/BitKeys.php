<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/23/2016
 * Time: 12:01 PM
 */

namespace Lockf0rc\Bitwords;


use Lockf0rc\Bitwords\Interf\IBitComparitor;

class BitKeys extends IBitComparitor
{
    protected $testKeys = array();

    public function isUnique(BitWord $word)
    {
        $bool = !(in_array($word->getKey(), $this->getObjKeys()));
        return $bool;
    }

    protected function getObjKeys()
    {
        $n = array();
        foreach ($this->comparitor as $item) {
            $n[] = $item->getKey();

        }
        return $n;
    }

    public function getTestKeys()
    {
        return $this->testKeys;
    }

    public function setTestKeys($item)
    {
        $inputArray = $this->getComparitor();
        shuffle($inputArray);
        $this->testKeys[] = array($inputArray, $this->appendAnswer($item));
    }

    protected function appendAnswer($key)
    {
        $testKeys = array();
        return $testKeys['answer'] = $key;
    }

    public function resetTestkeys()
    {
        $this->testKeys = array();
    }

    public function count()
    {
        return count($this->comparitor);
    }

}