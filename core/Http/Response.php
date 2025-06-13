<?php

namespace Core\Http;

use JetBrains\PhpStorm\NoReturn;

class Response
{
    #[NoReturn] public function setResponseCode(int $code = 404): void
    {
        http_response_code($code);
        die;
    }
}