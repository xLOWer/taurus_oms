<?php
namespace Core
{
    use Api\Api;
    use Core\Misc\LoggerLevel;

    class Logger
    {
        public static LoggerLevel $Level = LoggerLevel::DEBUG;
        public static Array $ExcludedClasses = [];

        public static function changeMode(LoggerLevel $lvl)
        {
            Logger::$Level = $lvl;
        }

        public static function trace_json($class, $obj)
        {
            if(Logger::$Level->value < LoggerLevel::TRACE->value) return;
            Logger::log(LoggerLevel::TRACE->name.": ".$class."=>".json_encode($obj,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
        }

        public static function trace($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::TRACE->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::TRACE->name.": ".$class."=>".$text);
        }

        public static function debug($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::DEBUG->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::DEBUG->name.": ".$class."=>".$text);
        }

        public static function info($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::INFO->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::INFO->name.": ".$class."=>".$text);
        }

        public static function warn($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::WARN->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::WARN->name.": ".$class."=>".$text);
        }

        public static function error($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::ERROR->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::ERROR->name.": ".$class."=>".$text);
        }

        public static function fatal($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::FATAL->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::FATAL->name.": ".$class."=>".$text);
        }

        private static function log($text)
        {            
            $log = date('Y-m-d H:i:s') . ' ' . $text;
            file_put_contents(__DIR__.Api::$Configuration->log_file, $log . PHP_EOL, FILE_APPEND);

            //print_r($text);
        }


    }
}
?>