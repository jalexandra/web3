<?php


namespace App\Utils;


class Preg
{
    public static function anyKeyMatches(string $pattern, array $haystack): bool{
        $keys = array_keys($haystack);
        foreach ($keys as $key){
            if(preg_match($pattern, $key)){
                return true;
            }
        }

        return false;
    }

    public static function whereMatch(string $pattern, array $haystack): array
    {
        $result = [];
        foreach ($haystack as $key => $value){
            if(preg_match($pattern, $key)){
                $result[$key] = $value;
            }
        }
        return $result;
    }
}
