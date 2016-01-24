<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/19/2016
 * Time: 7:33 PM
 */

namespace Lockf0rc\Bitwords;


use Lockf0rc\Bitwords\Interf\ITestSettings;

class ArrangeBits
{
    protected $settings;
    protected $bitArray;
    /**
     * @var BitKeys
     */
    protected $comp;


    public function __construct(ITestSettings $settings, BitArray $bitArray)
    {
        $this->settings = $settings;
        $this->bitArray = $bitArray;
        $this->comp = new BitKeys();

        for ($N = 0; $N < $this->settings->getTestSize(); $N++) {
            $this->scramble();
        }

    }

    public function scramble()
    {
        if ($this->settings->getOptionNumber() > ($this->bitArray->count())) {
            throw new \Exception('Out of Range Option Number setting: ');
        }
        $cloneoF = clone $this->bitArray;
        $cloneoF->reset();

        do {
            $rand = $this->randKey();

            if ($this->comp->isUnique($rand)) {
                $this->comp->addComparitor($rand);
            }

        } while ($this->comp->count() <= ($this->settings->getOptionNumber() - 1));

        $this->comp->setTestKeys($this->comp->getComparitor()[0]);
        $this->comp->resetComparitor();

    }

    public function randKey()
    {
        $rand = rand(0, $this->bitArray->count() - 1);
        $bitword = $this->getBitArray()->getBitList()[$rand];
        return $bitword;
    }

    public function getBitArray()
    {
        return $this->bitArray;
    }

    public function setBitArray(BitArray $bitArray)
    {
        $this->bitArray = $bitArray;
    }

    public function getComp()
    {
        return $this->comp;
    }

    public function setComp($comp)
    {
        $this->comp = $comp;
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function setSettings(ITestSettings $settings)
    {
        $this->settings = $settings;
    }


}
