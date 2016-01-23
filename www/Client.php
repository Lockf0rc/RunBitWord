<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/1/2016
 * Time: 9:58 AM
 */
include_once '..\vendor\autoload.php';

use Lockf0rc\Bitwords\BitFactory;
use Lockf0rc\Bitwords\BitListRender;
use Lockf0rc\Bitwords\Tester;
use Lockf0rc\Bitwords\TestSettings;

$fac = new BitFactory();
$fac->createBits('../W.csv');
$bitArray = $fac->createBitArrayObj();
$options = new TestSettings(4, 10);
$render = new BitListRender();
$TEST = new Tester($options, $bitArray, $render);

$TEST->display();
#

