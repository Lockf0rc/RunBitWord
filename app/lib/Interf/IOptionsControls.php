<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/19/2016
 * Time: 5:54 PM
 */

namespace Lockf0rc\Bitwords;
/**
 * 1. Controls Test Size $var
 * 2.Controls Choices/Options to Display $var
 **/
abstract class IOptionsControls extends ITestSettings
{

    public function initOptions($ChoiceN, $TestSize)
    {
        self::setOptionNumber($ChoiceN);
        self::setTestSize($TestSize);
    }

}