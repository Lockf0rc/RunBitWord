<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/19/2016
 * Time: 7:55 PM
 */

namespace Lockf0rc\Bitwords\Interf;


abstract class ITestSettings
{
    public $OptionNumber;
    public $TestSize;

    public function getOptionNumber()
    {
        return $this->OptionNumber;
    }

    public function setOptionNumber($OptionNumber)
    {
        $this->OptionNumber = $OptionNumber;
    }

    public function getTestSize()
    {
        return $this->TestSize;
    }

    public function setTestSize($TestSize)
    {
        $this->TestSize = $TestSize;
    }
}