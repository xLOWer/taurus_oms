<?php
namespace Core
{
    class Logger
    {
        public static bool $DebugMode = true;

        public static function offDebug()
        {
            Logger::$DebugMode = false;
        }

        public static function onDebug()
        {
            Logger::$DebugMode = false;
        }

        public static function debug($text, $val = null)
        {
            if(Logger::$DebugMode)
            {
                print_r($text);
                if($val != null)
                {
                    echo("=");
                    print_r($val);
                }
                echo("</br>\r\n");                
            }
        }
        
        public static function dump($val)
        {
            if(Logger::$DebugMode)
            {
                var_dump($val);
                echo("</br>\r\n");   
            }             
        }

        public static function log($text, $val = null)
        {
            print_r($text);
            if($val != null)
            {
                echo("=");
                print_r($val);
            }
            echo("</br>\r\n");                
        }


    }
}
?>