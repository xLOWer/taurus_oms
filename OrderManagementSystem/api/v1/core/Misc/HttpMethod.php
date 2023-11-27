<?php
namespace Core\Misc
{
    enum HttpMethod
    {
                        // safe     idempotent  cacheable
        case GET;       // yes      yes         yes
        case HEAD;      // yes      yes         yes
        case OPTIONS;   // yes      yes         no
        case TRACE;     // yes      yes         no
        case DELETE;    //          yes         no
        case PUT;       //          yes         no
        case POST;      //                      no
        case PATCH;     //                      no
        case CONNECT;   //                      no
    }
}
?>