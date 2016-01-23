<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/19/2016
 * Time: 7:33 PM
 */

namespace Lockf0rc\Bitwords;


use Lockf0rc\Bitwords\Interf\IRandomize;
use Lockf0rc\Bitwords\Interf\IteratorPlus;
use Lockf0rc\Bitwords\Interf\ITestSettings;

class ArrangeBits extends IRandomize
{
    protected $settings;
    protected $bitArray;
    protected $comp;


    public function __construct(ITestSettings $settings, BitArray $bitArray)
    {
        $this->settings = $settings;
        $this->bitArray = $bitArray;
        $this->comp = new BitKeys();
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function setSettings(ITestSettings $Settings)
    {
        $this->Settings = $Settings;
    }

    public function scramble(IteratorPlus $ArrayTypeOBJ)
    {
        $cloneoF = clone $ArrayTypeOBJ;
        $cloneoF->reset();
        while ($cloneoF->valid()) {
            for ($N = 0; $N < $this->settings->getOptionNumber(); $N++) {
                do {
                    $rand = $this->randKey();
                } while (!($this->isUnique($cloneoF->current(), $rand)));

            }
        }
    }

    public function randKey()
    {
        $rand = rand(0, count($this->bitArray->count()) - 1);
        return $this->getBitArray()->getBitList()[$rand];
    }

    public function getBitArray()
    {
        return $this->bitArray;
    }

    public function setBitArray(BitArray $bitArray)
    {
        $this->bitArray = $bitArray;
    }

    public function isUnique($value, $rand)
    {
        if (!($value === $rand)) {
            #THIS CHECK INSURES THAT WE DO NOT HAVE MORE THAN ONE TRUE ANSWER IN OUR OPTION INDEX BITARRAY
            return true;
        } else {
            return false;
        }

    }
}
