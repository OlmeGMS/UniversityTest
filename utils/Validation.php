<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 18/09/2016
 * Time: 15:47
 */
class Validation
{
    function validateDate($initialDate,$endDate){
        try{
            $initialDate = explode("/", $initialDate);
            $endDate = explode("/", $endDate);
            if (checkdate($initialDate[0], $initialDate[1], $initialDate[2])){
                $initialDateGregorian = gregoriantojd($initialDate[0], $initialDate[1], $initialDate[2]);
            }else{
                return false;
            }
            if(checkdate($endDate[0], $endDate[1], $endDate[2])) {
                $endDateGregorian = gregoriantojd($endDate[0], $endDate[1], $endDate[2]);
            }else{
                return false;
            }
            return $initialDateGregorian - $endDateGregorian;
        }
        catch (Exception $exception){
            return false;
        }
    }

    function validateHora($initialHora,$endHora){
        try{
            $dateInitialHora = date_create($initialHora);
            $dateEndHora = date_create($endHora);
            $diff = date_diff($dateInitialHora,$dateEndHora,false);
            $total = ((($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i)*60 + $diff->s;
            return $total;
        }
        catch (Exception $exception){
            return "error";
        }
    }
}