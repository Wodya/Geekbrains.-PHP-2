<?php


namespace app\services;
interface IRender
{
    function render($template, $params = []);
}