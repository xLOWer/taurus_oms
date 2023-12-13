<?php namespace Core\Misc
{
    use Core\Misc\HttpCode;

    class HttpHeaderCode
    {
        public HttpCode $HttpCode;
        public string $HeaderText;
        public int $Code;
        private static array $data = [];

        public function __construct(HttpCode $code, string $header) 
        {
            $this->HttpCode = $code;
            $this->Code = $code->value;
            $this->HeaderText = $header;
        }

        public static function set(HttpCode $code, string $header)
        {
            HttpHeaderCode::$data []= new HttpHeaderCode($code, $header);
        }

        public static function registerData()
        {        
            HttpHeaderCode::set(HttpCode::_100_CONTINUE, "HTTP/1.1 100 Continue");
            HttpHeaderCode::set(HttpCode::_200_OK, "HTTP/1.1 200 OK");
            HttpHeaderCode::set(HttpCode::_201_CREATED, "HTTP/1.1 201 Created");
            HttpHeaderCode::set(HttpCode::_202_ACCEPTED, "HTTP/1.1 202 Accepted");
            HttpHeaderCode::set(HttpCode::_203_NON_AUTHORITATIVE_INFORMATION, "HTTP/1.1 203 Non Authoritative Information");
            HttpHeaderCode::set(HttpCode::_204_NO_CONTENT, "HTTP/1.1 204 No Content");
            HttpHeaderCode::set(HttpCode::_205_RESET_CONTENT, "HTTP/1.1 205 Reset Content");
            HttpHeaderCode::set(HttpCode::_206_PARTIAL_CONTENT, "HTTP/1.1 206 Partial Content");
            HttpHeaderCode::set(HttpCode::_300_MULTIPLE_CHOICES, "HTTP/1.1 300 Multiple Choices");
            HttpHeaderCode::set(HttpCode::_304_NOT_MODIFIED, "HTTP/1.1 304 Not Modified");
            HttpHeaderCode::set(HttpCode::_305_USE_PROXY, "HTTP/1.1 305 Use Proxy");
            HttpHeaderCode::set(HttpCode::_307_TEMPORARY_REDIRECT, "HTTP/1.1 307 Temporary Redirect");
            HttpHeaderCode::set(HttpCode::_308_PERMANENT_REDIRECT, "HTTP/1.1 308 Permanent Redirect");
            HttpHeaderCode::set(HttpCode::_400_BAD_REQUEST, "HTTP/1.1 400 Bad Request");
            HttpHeaderCode::set(HttpCode::_401_UNAUTHORIZED, "HTTP/1.1 401 Unauthorized");
            HttpHeaderCode::set(HttpCode::_402_PAYMENT_REQUIRED, "HTTP/1.1 402 Payment Required");
            HttpHeaderCode::set(HttpCode::_403_FORBIDDEN, "HTTP/1.1 403 Forbidden");
            HttpHeaderCode::set(HttpCode::_404_NOT_FOUND, "HTTP/1.1 404 Not Found");
            HttpHeaderCode::set(HttpCode::_405_METHOD_NOT_ALLOWED, "HTTP/1.1 405 Method Not Allowed");
            HttpHeaderCode::set(HttpCode::_406_NOT_ACCEPTABLE, "HTTP/1.1 406 Not Acceptable");
            HttpHeaderCode::set(HttpCode::_423_LOCKED, "HTTP/1.1 423 Locked");
            HttpHeaderCode::set(HttpCode::_429_TOO_MANY_REQUESTS, "HTTP/1.1 429 Too Many Requests");
            HttpHeaderCode::set(HttpCode::_500_INTERNAL_SERVER_ERROR, "HTTP/1.1 500 Internal Server Error");
            HttpHeaderCode::set(HttpCode::_501_NOT_IMPLEMENTED, "HTTP/1.1 501 Not Implemented");
            HttpHeaderCode::set(HttpCode::_502_BAD_GATEWAY, "HTTP/1.1 502 Bad Gateway");
            HttpHeaderCode::set(HttpCode::_503_SERVICE_UNAVAILABLE, "HTTP/1.1 503 Service Unavailable");
        }

        public static function getHeader(int $code)
        {
            foreach (HttpHeaderCode::$data as $x) 
            {
                if($x->Code == $code) 
                {   
                    return $x->HeaderText;

                }
            }
        }



    }
}

?>