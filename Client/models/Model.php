<?php class Model {

public static function isIdValid($id) 
{
    if(!is_numeric($id) || $id < 1)
    {
        return FALSE;
    } 
    else {
        return TRUE;
    }
}

} ?>