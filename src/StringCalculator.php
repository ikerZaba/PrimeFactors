<?php

namespace Deg540\PHPTestingBoilerplate;

use mysql_xdevapi\Exception;

class StringCalculator
{
    function add(String $numbers): int
    {
        if(empty($numbers)){

            return 0;
        }
        else{

            if(str_starts_with($numbers,"//")){
                $numbers = str_replace("//","",$numbers);
                $delimiter = substr($numbers,0,1);
                $numbers = substr($numbers,3);
                $numbers = str_replace($delimiter,",",$numbers);

            }
            else{
                $numbers = str_replace('\n',',',$numbers);
            }

            $numbersArray = explode(',',$numbers);

            $sum = 0;

            for($iter = 0;$iter<count($numbersArray);$iter++){
                if($numbersArray[$iter]<0){
                    throw new \PHPUnit\Util\Exception('negativos no soportados (' . $numbersArray[$iter] . ')',333);
                }
                $sum = $sum + intval($numbersArray[$iter]);
            }

            return $sum;

        }
    }

}