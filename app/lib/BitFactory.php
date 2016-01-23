<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/1/2016
 * Time: 9:44 AM
 *
 * Use Factory to create multiple Bitword objects.
 */

namespace Lockf0rc\Bitwords;
include_once "csv_to_array-php.php";

class BitFactory
{
public $bits;
 public function createBits($csv){
     #load csv to an array
     $local=csv_to_array($csv);
         foreach($local as $singleBit ){
             $container=array_values($singleBit);
            $T=new BitWord();
            $T->setWord(trim($container[0]));
            $T->setDefinition(trim($container[1]));
            $T->setSynonym(trim($container[2]));
             #ADD INITIALIZED BIT TO bit property array
            $this->bits[]=$T;
            unset($T);
         }
 }
    public function getBits()
    {
        #return BitWord array
        return $this->bits;
    }

    public function createBitArrayObj()
    {
        $self = $this;
        $Bitarray = new BitArray();
        $Bitarray->addList($self);
        return $Bitarray;

    }
}
