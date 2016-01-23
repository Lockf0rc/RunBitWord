<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/16/2016
 * Time: 5:08 PM
 */

require '../vendor/autoload.php';

use Lockf0rc\Bitwords\ArrangeBits;
use Lockf0rc\Bitwords\BitArray;
use Lockf0rc\Bitwords\BitFactory;
use Lockf0rc\Bitwords\BitListRender;
use Lockf0rc\Bitwords\BitWord;
use Lockf0rc\Bitwords\Tester;
use Lockf0rc\Bitwords\TestSettings;

class TestTest0 extends PHPUnit_Framework_TestCase{

    public function testFactory()
    {
        $fac = new BitFactory();
        $fac->createBits('../W.csv');
        #TEST
        $this->assertEquals(11, count($fac->getBits()));
        $this->assertNotEmpty($fac->getBits());
        $this->assertInstanceOf('\Lockf0rc\Bitwords\BitArray', $fac->createBitArrayObj());

    }

    public function testBitArrayGetBitList(){
        #init BitWord object from previous test of bit.
        $bitword=$this->testBitWord();
        $bitArray=new BitArray();
        $this->assertEmpty($bitArray->getBitList());
        #TEST BitArray add();
        $bitArray->add($bitword);
        $this->assertNotEmpty($bitArray->getBitList());

        #TEST BitArray getBitList()
        $this->assertEquals('WORD',$bitArray->getBitList()[0]->getWord());
        $this->assertEquals('DEFINITION OF WORD',$bitArray->getBitList()[0]->getDefinition());
        $this->assertEquals('ANOTHER',$bitArray->getBitList()[0]->getSynonym());


        return $bitArray;
    }

    public function testBitWord()
    {
        #sample array
        $ArraySample = array('one', 'two', 'three');

        $bitObj = new BitWord();
        $bitObj->setWord('WORD');
        $bitObj->setDefinition("DEFINITION OF WORD");
        $bitObj->setSynonym("ANOTHER");
        $bitObj->setKey(0);


        #TEST
        $this->assertEquals('WORD', $bitObj->getWord());
        $this->assertEquals("DEFINITION OF WORD", $bitObj->getDefinition());
        $this->assertEquals("ANOTHER", $bitObj->getSynonym());
        $this->assertEquals("0", $bitObj->getKey());
        $this->assertEquals(0, $bitObj->getKey());

        return $bitObj;

    }

    public function testBitArrayItterator(){
        #init BitWord object from previous test of bit.
        $bitword=$this->testBitWord();
        $bitArray=new BitArray();
        $bitArray->add($bitword);
        $this->assertEquals($bitArray->current(), $bitArray->getBitList()[0]);

        #Clone bit word and change prop for testing.
        $C=clone $bitword;
        $C->setWord("WORD2");

        $this->assertEquals('WORD2',$C->getWord());

        #Test BitArray add()
        $bitArray->add($C);
        $this->assertEquals(2,count($bitArray->getBitList()));

        #Test retreval of object property
        $this->assertEquals('WORD2',$bitArray->getBitList()[1]->getWord());
        $this->assertEquals($bitArray->getBitList()[1]->getWord(), $bitArray->current()->getWord());

        #Test retrival of object
        $this->assertEquals($bitArray->getBitList()[1],$bitArray->current());
        #TEST Rewind and NEXT
        $bitArray->rewind();
        $this->assertEquals('WORD',$bitArray->current()->getWord());
        $bitArray->next();
        $this->assertEquals('WORD2',$bitArray->current()->getWord());

    }

    public function testTestsettings()
    {
        $TestOpt = new TestSettings(0, 0);
        $TestOpt->setTestSize(10);
        $TestOpt->setOptionNumber(5);
        $this->assertEquals(10, $TestOpt->getTestSize());
        $this->assertEquals(5, $TestOpt->getOptionNumber());
    }

    public function testArrangeBits()
    {
        $fac = new BitFactory();
        $fac->createBits('../W.csv');
        $bitA = $fac->createBitArrayObj();
        $Options = new TestSettings(4, 10);

        $Arranger = new ArrangeBits($Options, $bitA);
        $this->assertInstanceOf('\Lockf0rc\Bitwords\TestSettings', $Arranger->getSettings());
        $this->assertInstanceOf('\Lockf0rc\Bitwords\BitArray', $Arranger->getBitArray());
        $this->assertNotEmpty($Arranger->getBitArray()->getBitList());
        #test getting a random bitword;

        $this->assertInstanceOf('\Lockf0rc\Bitwords\BitWord', $Arranger->randKey());

    }

    public function testTesterClass()
    {

        $fac = new BitFactory();
        $fac->createBits('../W.csv');
        $bitArray = $fac->createBitArrayObj();
        $options = new TestSettings(4, 10);
        $render = new BitListRender();
        $TEST = new Tester($options, $bitArray, $render);

        //
        $this->assertNotEmpty($TEST);
        $this->assertEquals(11, count($TEST->getArrangebits()->getBitArray()->getBitList()));
        $this->assertInstanceOf('\Lockf0rc\Bitwords\Bitword', $TEST->getArrangebits()->randKey());


    }


}
