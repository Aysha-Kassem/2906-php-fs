<?php
namespace App;

trait Str
{
    public static function camelize(string $string)
    {
        // ahmed zakaria => ahmedZakaria
    }
    public static function underscore(string $string)
    {
        // ahmed zakaria => ahmed_zakaria
    }
    public static function humanize(string $string)
    {
        // ahmed zakaria => Ahmed Zakaria
    }
    public static function humanizePlural(string $string)
    {
    }
    public static function underscorePlural(string $string)
    {
    }
    public static function upper(string $string)
    {
        return strtoupper($string);
    }
    public static function lower(string $string)
    {
    }
    public static function lowerPlural(string $string)
    {
    }
    public static function upperPlural(string $string)
    {
    }
    public static function randomStr(int $length): string
    {

        $string = "";

        return substr(str_shuffle(str_repeat($string, $length)), 0, $length);

        // edfsdh39
        // 34234dsfs

    }


}