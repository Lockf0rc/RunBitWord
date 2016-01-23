<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 1/19/2016
 * Time: 6:24 PM
 */

namespace Lockf0rc\Bitwords\Interf;


interface IListLogic
{

    /**
     * @return bool
     */
    public function isUnique($value, $rand);


}