<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/1/2016
 * Time: 9:18 AM
 */
namespace Lockf0rc\Bitwords;

use Lockf0rc\Bitwords\Interf\IBitArray;

include_once "csv_to_array-php.php";

class BitArray extends IBitArray
{
    #FIELDS


    private $iteratorPosition = 0;
    public function __construct() {
        $this->iteratorPosition = 0;
    }
    function rewind() {
       // var_dump(__METHOD__);
        $this->iteratorPosition--;
    }
    function reset() {
        // var_dump(__METHOD__);
        $this->iteratorPosition = 0;
    }
    function current() {
        //var_dump(__METHOD__);
        //return the current item in bitlist -NOTE The itterator position is incremented only after add($bit)
        // to make sure that we decrement the result of the iterator position to get the bit that we added.
        #$k=(0<$this->key()-1)?$this->iteratorPosition--:0;
        return $this->bitList[$this->key()-1];
    }
    function key() {
       // var_dump(__METHOD__);
        return $this->iteratorPosition;
    }

    function valid() {
        //var_dump(__METHOD__);
        return isset($this->bitList[$this->iteratorPosition]);
    }

    public function count()
    {
        return count($this->getBitList());
    }
####################################################

    //END OF \ITERATOR Interface

    public function getBitList()
    {
        return $this->bitList;
    }

   public function store(BitWord $bit,$items){
       $bit->setTestKeys($items);
    }

    function addList(BitFactory $fac)
    {
        $bitlist = $fac->getBits();
        foreach ($bitlist as $bit) {
            $this->add($bit);
        }
    }

    function add(BitWord $bitWord)
    {
        $bitWord->setKey($this->key());
        $this->bitList[]=$bitWord;
        $this->next();
    }

    function next()
    {
        //var_dump(__METHOD__);
        ++$this->iteratorPosition;
    }
}