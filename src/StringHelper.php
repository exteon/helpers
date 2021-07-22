<?php
    namespace Exteon\Helpers;

    abstract class StringHelper
    {
        /**
         * Splits a string based on the separator character, using backslash as
         * an escape character
         *
         * @param string $string
         * @param string $splitChar
         * @return string[]
         */
        public static function escapedSplit(string $string,string $splitChar): array{
            $len=strlen($string);
            $state=0;
            $result=array();
            $now='';
            for($i=0;$i<$len;$i++){
                $char=$string[$i];
                if($state==1){
                    $now.=$char;
                    $state=0;
                } else {
                    switch($char){
                        case $splitChar:
                            $result[]=$now;
                            $now='';
                            break;
                        case '\\';
                            $state=1;
                            break;
                        default:
                            $now.=$char;
                    }
                }
            }
            $result[]=$now;
            return $result;
        }
    }