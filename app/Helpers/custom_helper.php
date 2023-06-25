<?php

if (!function_exists('random_string')) {
    /**
     * Generate a random string
     *
     * @param int    $length
     * @param string $type
     *
     * @return string
     */
    function random_string($length = 8, $type = 'alnum')
    {
        $characters = '';

        switch ($type) {
            case 'alnum':
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'alpha':
                $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'numeric':
                $characters = '0123456789';
                break;
            case 'nozero':
                $characters = '123456789';
                break;
            default:
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
        }

        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $string;
    }
}