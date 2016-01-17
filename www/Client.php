<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/1/2016
 * Time: 9:58 AM
 */
include_once '..\vendor\autoload.php';

use Lockf0rc\Bitwords\BitFactory;
use Lockf0rc\Bitwords\Tester;
use Lockf0rc\Bitwords\BitArray;
$A=new BitArray();
$fac=new BitFactory();
$TEST=new Tester();

$fac->createBits('../W.csv');
$TEST->addList($fac->getBits());

$TEST->intitTestOptions($TEST);





#

