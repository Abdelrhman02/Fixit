<?php

namespace App\Core;

// this file will manage the request methods and will return the uri of page and
// will return also the type of method

class Request
{
    // uri will return the uri of website
    /**
     * @return string
     */
    public static function uri(): string
    {
        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $uri = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $uri;
        $uri = str_replace(home(), "", $uri);

        return trim($uri, "/");
    }

    // this function will return the value that post of get hold

    /**
     * @param string $key
     * @param string|null $default
     * @return string
     */
    public static function get(string $key, ?string $default = null): string
    {
        return $_GET[$key] ?? $_POST[$key] ?? $default;
    }

    // this function will return the type of method

    /**
     * @return string
     */
    public static function method(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
}
