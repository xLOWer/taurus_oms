<?php
namespace Core\Misc
{
    enum HttpCode : int
    {
        /*
        https://developer.mozilla.org/ru/docs/Web/HTTP/Status
        Информационные ответы (100 – 199)
        Успешные ответы (200 – 299)
        Сообщения о перенаправлении (300 – 399)
        Ошибки клиента (400 – 499)
        Ошибки сервера (500 – 599)
        */
        case _100_CONTINUE = 100;

        case _200_OK = 200;
        case _201_CREATED = 201;
        case _202_ACCEPTED = 202;
        case _203_NON_AUTHORITATIVE_INFORMATION = 203;
        case _204_NO_CONTENT = 204;
        case _205_RESET_CONTENT = 205;
        case _206_PARTIAL_CONTENT = 206;

        case _300_MULTIPLE_CHOICES = 300;
        case _304_NOT_MODIFIED = 304;
        case _305_USE_PROXY = 305;
        case _307_TEMPORARY_REDIRECT = 307;
        case _308_PERMANENT_REDIRECT = 308;

        case _400_BAD_REQUEST = 400;
        case _401_UNAUTHORIZED = 401;
        case _402_PAYMENT_REQUIRED = 402;
        case _403_FORBIDDEN = 403;
        case _404_NOT_FOUND = 404;
        case _405_METHOD_NOT_ALLOWED = 405;
        case _406_NOT_ACCEPTABLE = 406;
        case _423_LOCKED = 423;
        case _429_TOO_MANY_REQUESTS = 429;
        
        case _500_INTERNAL_SERVER_ERROR = 500;
        case _501_NOT_IMPLEMENTED = 501;
        case _502_BAD_GATEWAY = 502;
        case _503_SERVICE_UNAVAILABLE = 503;

    }
}
?>