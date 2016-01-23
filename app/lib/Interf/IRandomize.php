<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/19/2016
 * Time: 6:14 PM
 *
 * 1.return a subset of an object
 * 2.Verify it is a unique list
 */

namespace Lockf0rc\Bitwords\Interf;


abstract class IRandomize implements IListLogic
{
    public abstract function scramble(IteratorPlus $ArrayTypeOBJ);

}