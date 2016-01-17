<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/1/2016
 * Time: 9:06 AM
 */

namespace Lockf0rc\Bitwords;



class BitWord
{
    //@type string
    public $word;
    public $definition ;
    public $synonym;
    public $key;
    public $bitArray;

    public function getWord()
    {
        return $this->word;
    }

    public function getDefinition()
    {
        return $this->definition;
    }

    public function getSynonym()
    {
        return $this->synonym;
    }

    public function getBitArray()
    {
        return $this->bitArray;
    }

    public function setWord($word)
    {
        $this->word = $word;
    }

    public function setDefinition($definition)
    {
        $this->definition = $definition;
    }

    public function setSynonym($synonym)
    {
        $this->synonym = $synonym;
    }

    public function setBitArray($bit)
    {
        $this->bitArray= $bit;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

}