<?php

class Http //redirection des pages
{

    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit();
    }
}
