<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/1/2016
 * Time: 9:18 AM
 */
namespace Lockf0rc\Bitwords;
include_once "csv_to_array-php.php";
use Lockf0rc\Bitwords\BitWord;
class BitArray extends IBitArray
{
    #FIELDS
    public $bitList;
    ########################################################
    //\ITerator http://php.net/manual/en/class.iterator.php
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
    function next() {
        //var_dump(__METHOD__);
        ++$this->iteratorPosition;
    }
    function valid() {
        //var_dump(__METHOD__);
        return isset($this->bitList[$this->iteratorPosition]);
    }
####################################################

    //END OF \ITERATOR Interface

   public function store(BitWord $bit,$items){
     $bit->setBitArray($items);
    }

    function display($n=null){
        if($n===null){
                #debug
                print_r($this->bitList);

            #throw new \Exception('NO INT(index) Supplied');
        }
        elseif(is_int($n)){
            print_r($this->bitList[$n]);
        }

    }
    function add(BitWord $bitWord)
    {
        $bitWord->setKey($this->key());
        $this->bitList[]=$bitWord;
        $this->next();
    }

   function addList(BitFactory $fac){
       $bitlist=$fac->getBits();
        foreach($bitlist as $bit){
            $this->add($bit);
        }
    }
    public function getBitList()
    {
        return $this->bitList;
    }
}