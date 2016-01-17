<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/2/2016
 * Time: 9:32 AM
 */

namespace Lockf0rc\Bitwords;


class Tester extends BitArray
{
    protected $mapArray;
    public $optionDisplay;
    const OptionNumber=4;
    const DisplayPerTest=3;
    protected $SampleSize;

    public function intitTestOptions(IBitArray $bitsSample){
        $this->mapArray=$this->bitList;
        $this->SampleSize=count($bitsSample->getBitList());

        $this->loadBits($bitsSample);
        $this->addSaltKeys($bitsSample);
        $this->html();
       # $this->display();


    }
    public function loadBits(IBitArray $bits)
    {
        $container=$bits->getBitList();
        $rand_keys=array_rand($container,Tester::DisplayPerTest);
        for($dispN=0;$dispN<Tester::DisplayPerTest;$dispN++) {

            $this->optionDisplay[] = $container[$rand_keys[$dispN]];
        }
    }


    protected function addSaltKeys(IBitArray $bits){
        $ubits=clone $bits;
        $ubits->rewind();
        $container=$ubits->getBitList();


        //ITTERATE FOR ALL SAMPLE WORDS LOADED
        while ($ubits->valid()){
            $key=$ubits->key();
                    //GENERATE RANDOME $OPTION KEY INDEX
            for($opN=0;$opN<Tester::OptionNumber;$opN++){

                  #TEST
                //Add self
                do{
                    $rand= rand(0,($this->SampleSize -1));
                    $is_inBitList=(in_array($rand,$ubits->current()->getBitArray()))?true:false;
                    $PickingRandNumber=(($rand==$key)or($is_inBitList))?true:false;
                    $debug=function()use($key,$opN,$rand,$is_inBitList){ echo '   '.$key." optionNumber=$opN"."(key{$key}==rand{$rand})?:{($key==$rand)}"." is_inBitList=$is_inBitList"."\n";};
                   // Ouput results inside of the do loop
                    //   $debug();
                }while(($PickingRandNumber===true));

                //output results after loop
                #$debug();

                if(!($rand===$key)){
                 #THIS CHECK INSURES THAT WE DO NOT HAVE MORE THAN ONE TRUE ANSWER IN OUR OPTION INDEX BITARRAY
                    $ubits->store($container[$key],$rand);
                }


            }
            $ubits->next();


        }

    }
    public function __clone()
    {

        // Force a copy of this->object, otherwise
        // it will point to same object.


    }

    public function getOptionDisplay()
    {
        return $this->optionDisplay;
    }

    public function getSampleSize()
    {
        return $this->SampleSize;
    }

    public function setOptionDisplay($optionDisplay)
    {
        $this->optionDisplay = $optionDisplay;
    }

    public function html(){
        #print_r($this->optionDisplay);
        print_r($this->mapArray);

    }
}

