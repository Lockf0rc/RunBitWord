<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/2/2016
 * Time: 9:32 AM
 */

namespace Lockf0rc\Bitwords;


use Lockf0rc\Bitwords\Interf\IBitArray;
use Lockf0rc\Bitwords\Interf\ITestSettings;

/**
 * Class Tester
 * @package Lockf0rc\Bitwords
 */
class Tester # extends
{

    protected $arrangebits;

    protected $render;

    //TODO create a proper interface for injection instead of Arrangebit Class

    public function __construct(ITestSettings $options, IBitArray $bitArray, BitListRender $render)
    {
        $this->arrangebits = new ArrangeBits($options, $bitArray);
        $this->render = $render;
        $render->setBitArray($bitArray);
    }

    public function display()
    {
        $this->render->display();
    }

    public function getArrangebits()
    {
        return $this->arrangebits;
    }


    public function __clone()
    {
        // Force a copy of this->object, otherwise
        // it will point to same object.
    }


    public function getSampleSizeCount()
    {

    }

    public function html(){
        $doc = <<<mtext
        <h1>HTML START NOW</h1>
        <h1>HTML START NOW</h1>
mtext;
        return $doc;

    }
}

