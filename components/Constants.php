<?php

namespace app\components;
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/5/2017
 * Time: 02:44
 */
class Constants
{
    //Account Status
    const NOT_ACTIVATED = 'NOT ACTIVATED';
    const ACTIVATED = 'ACTIVATED';
    const SUSPENDED = 'SUSPENDED';
    const CLOSED = 'CLOSED';

    //Files privacy
    /**
     * Indicates if a file is private or public
     */
    const FILE_IS_PRIVATE = 1;
    const FILE_IS_NOT_PRIVATE = 0;

    //Model SCenarios
    const SCENARIO_SIGNUP = 'signup';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_AJAX_UPLOAD = 'ajax';
}