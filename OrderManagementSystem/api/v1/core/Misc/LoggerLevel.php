<?php
namespace Core\Misc
{
    enum LoggerLevel : int
    {
        case INFO = 0;
        case WARN = 1;
        case ERROR = 2;
        case FATAL = 3;
        case DEBUG = 4;
        case TRACE = 5;
    }
}
?>