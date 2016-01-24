<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/23/2016
 * Time: 7:11 AM
 */

namespace Lockf0rc\Bitwords;


class TestSettings extends Tester
{
    public function __construct($Display, $QuizSize)
    {
        $this->setOptionNumber($Display);
        $this->setTestSize($QuizSize);
    }
}