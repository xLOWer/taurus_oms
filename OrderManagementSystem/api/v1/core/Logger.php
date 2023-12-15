<?php
namespace Core
{
    use Api\Api;
    use Core\Misc\LoggerLevel;

    class Logger
    {
        public static LoggerLevel $Level = LoggerLevel::DEBUG;
        public static Array $ExcludedClasses = [];
        public const __SEP1__ = ":\t";
        public const __SEP2__ = ":=>";


        public static function changeMode(LoggerLevel $lvl)
        {
            Logger::$Level = $lvl;
        }

        public static function trace($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::TRACE->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::TRACE->name.Logger::__SEP1__.$class.Logger::__SEP2__.$text);
        }

        public static function debug($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::DEBUG->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::DEBUG->name.Logger::__SEP1__.$class.Logger::__SEP2__.$text);
        }

        public static function info($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::INFO->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::INFO->name.Logger::__SEP1__.$class.Logger::__SEP2__.$text);
        }

        public static function warn($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::WARN->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::WARN->name.Logger::__SEP1__.$class.Logger::__SEP2__.$text);
        }

        public static function error($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::ERROR->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::ERROR->name.Logger::__SEP1__.$class.Logger::__SEP2__.$text);
        }

        public static function fatal($class, $text)
        {
            if(Logger::$Level->value < LoggerLevel::FATAL->value) return;
            if(in_array($class, Logger::$ExcludedClasses)) return;
            Logger::log(LoggerLevel::FATAL->name.Logger::__SEP1__.$class.Logger::__SEP2__.$text);
        }

        private static function log($text)
        {            
            $log = date('Y-m-d H:i:s') . ' ' . $text;
            file_put_contents(__DIR__.Api::$Configuration->log_file, $log . PHP_EOL, FILE_APPEND);
        }


        

        public static function trace_json($class, $obj)
        {
            if(Logger::$Level->value < LoggerLevel::TRACE->value) return;
            Logger::log(LoggerLevel::TRACE->name.Logger::__SEP1__.$class.Logger::__SEP2__.json_encode($obj,JSON_UNESCAPED_UNICODE));
        }

        public static function debug_json($class, $obj)
        {
            if(Logger::$Level->value < LoggerLevel::DEBUG->value) return;
            Logger::log(LoggerLevel::DEBUG->name.Logger::__SEP1__.$class.Logger::__SEP2__.json_encode($obj,JSON_UNESCAPED_UNICODE));
        }

        public static function info_json($class, $obj)
        {
            if(Logger::$Level->value < LoggerLevel::INFO->value) return;
            Logger::log(LoggerLevel::INFO->name.Logger::__SEP1__.$class.Logger::__SEP2__.json_encode($obj,JSON_UNESCAPED_UNICODE));
        }

        public static function warn_json($class, $obj)
        {
            if(Logger::$Level->value < LoggerLevel::WARN->value) return;
            Logger::log(LoggerLevel::WARN->name.Logger::__SEP1__.$class.Logger::__SEP2__.json_encode($obj,JSON_UNESCAPED_UNICODE));
        }

        public static function error_json($class, $obj)
        {
            if(Logger::$Level->value < LoggerLevel::ERROR->value) return;
            Logger::log(LoggerLevel::ERROR->name.Logger::__SEP1__.$class.Logger::__SEP2__.json_encode($obj,JSON_UNESCAPED_UNICODE));
        }

        public static function fatal_json($class, $obj)
        {
            if(Logger::$Level->value < LoggerLevel::FATAL->value) return;
            Logger::log(LoggerLevel::FATAL->name.Logger::__SEP1__.$class.Logger::__SEP2__.json_encode($obj,JSON_UNESCAPED_UNICODE));
        }


    }
}
?>