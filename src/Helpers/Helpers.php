<?php

namespace Helpers;

class Helpers{


    //удалить значения из массива
    public static function removeElementFromArray(array $arr, $value = ''):array{
        $newArray = [];
        foreach($arr as $part){ 
            if($part == $value){
                continue;
            }
            $newArray[] = $part;
        }
        return $newArray;
    }

    //Проверка на использование символа/строк в строке
    public static function checkCharacterInString(string $str, string $search) : bool{
        if(strpos($str, $search) !== false){
            return true;
        }
        return false;
    }
}