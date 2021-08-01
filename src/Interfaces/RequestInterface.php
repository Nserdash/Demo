<?php

namespace Nik\Htdocs\Interfaces;

interface RequestInterface
{
    public static function all();
    public static function one($exceptions);
}