<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/23/2016
 * Time: 7:11 AM
 */

namespace Lockf0rc\Bitwords;


use Lockf0rc\Bitwords\Interf\ITestSettings;

class TestSettings extends ITestSettings
{
    public function __construct($Display, $QuizSize)
    {
        $this->setOptionNumber($Display);
        $this->setTestSize($QuizSize);
    }
}