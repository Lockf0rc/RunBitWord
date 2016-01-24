<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/23/2016
 * Time: 10:06 AM
 */

namespace Lockf0rc\Bitwords;


use Lockf0rc\Bitwords\Interf\IBitArray;

class BitListRender extends Tester
{


    public function display()
    {
        print_r($this->renderObject->getBitList());
    }

    public function getBitArray()
    {
        return $this->renderObject;
    }

    public function setBitArray(IBitArray $bitArray)
    {
        $this->renderObject = $bitArray;
    }

}