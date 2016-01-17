<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/16/2016
 * Time: 5:08 PM
 */

require '../vendor/autoload.php';

use Lockf0rc\Bitwords\BitFactory;
use Lockf0rc\Bitwords\BitWord;
use Lockf0rc\Bitwords\BitArray;
use Lockf0rc\Bitwords\Tester;
class TestTest0 extends PHPUnit_Framework_TestCase{

    public function testBitWord()
    {
        #sample array
         $ArraySample= array('one','two','three');

         $bitObj=new BitWord();
         $bitObj->setWord('WORD');
         $bitObj->setDefinition("DEFINITION OF WORD");
         $bitObj->setSynonym("ANOTHER");
         $bitObj->setKey(0);
         $bitObj->setBitArray($ArraySample);

        #TEST
         $this->assertEquals('WORD',$bitObj->getWord());
         $this->assertEquals("DEFINITION OF WORD",$bitObj->getDefinition());
         $this->assertEquals("ANOTHER",$bitObj->getSynonym());
         $this->assertEquals("0",$bitObj->getKey());
         $this->assertEquals(0,$bitObj->getKey());
         $this->assertEquals('one',$bitObj->getBitArray()[0]);
         $this->assertEquals('two',$bitObj->getBitArray()[1]);
         $this->assertEquals('three',$bitObj->getBitArray()[2]);
        return $bitObj;

    }

    public function testFactory(){
        $fac=new BitFactory();
        $fac->createBits('../W.csv');
        #TEST
        $this->assertEquals(11,count($fac->getBits()));
        $this->assertNotEmpty($fac->getBits());

    }

    public function testBitArrayGetBitList(){
        #init BitWord object from previous test of bit.
        $bitword=$this->testBitWord();
        $bitArray=new BitArray();
        $this->assertEmpty($bitArray->getBitList());
        #TEST BitArray add()
        $bitArray->add($bitword);
        $this->assertNotEmpty($bitArray->getBitList());

        #TEST BitArray getBitList()
        $this->assertEquals('WORD',$bitArray->getBitList()[0]->getWord());
        $this->assertEquals('DEFINITION OF WORD',$bitArray->getBitList()[0]->getDefinition());
        $this->assertEquals('ANOTHER',$bitArray->getBitList()[0]->getSynonym());


        $this->assertEquals('one',$bitArray->getBitList()[0]->getBitArray()[0]);
        $this->assertEquals('two',$bitArray->getBitList()[0]->getBitArray()[1]);
        $this->assertEquals('three',$bitArray->getBitList()[0]->getBitArray()[2]);
        return $bitArray;
    }
    public function testBitArrayItterator(){
        #init BitWord object from previous test of bit.
        $bitword=$this->testBitWord();
        $bitArray=new BitArray();
        $bitArray->add($bitword);
        $this->assertEquals($bitArray->current(),$bitArray->bitList[0]);

        #Clone bit word and change prop for testing.
        $C=clone $bitword;
        $C->setWord("WORD2");
        $this->assertEquals('WORD2',$C->getWord());

        #Test BitArray add()
        $bitArray->add($C);
        $this->assertEquals(2,count($bitArray->getBitList()));

        #Test retreval of object property
        $this->assertEquals('WORD2',$bitArray->getBitList()[1]->getWord());
        $this->assertEquals($bitArray->bitList[1]->getWord(),$bitArray->current()->getWord());

        #Test retrival of object
        $this->assertEquals($bitArray->getBitList()[1],$bitArray->current());
        #TEST Rewind and NEXT
        $bitArray->rewind();
        $this->assertEquals('WORD',$bitArray->current()->getWord());
        $bitArray->next();
        $this->assertEquals('WORD2',$bitArray->current()->getWord());

    }

    public function testTesterClass(){
        $bitArray=new BitArray();
        $fac=new BitFactory();
        $TEST=new Tester();
        $fac->createBits('../W.csv');
        $TEST->addList($fac->getBits());

        $TEST->intitTestOptions($TEST);

    }

}
