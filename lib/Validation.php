<?php

class Validation
{
    public const ERROR_WRONG_CONTROLLER = 'Wrong controller path';
    public const ERROR_INCOMPLETE_DATA = 'Incomplete data';
    public const ERROR_USERNAME = 'Must only contain letters';
    public const ERROR_PHONE = 'It must have the following format: a "+" followed by 9 numbers';
    public const ERROR_EMAIL = 'Must be a valid email, e.g., username@example.com';
    public const ERROR_PASSWORD =
        '<ul><li>Length of 6 characters</li>'.
        '<li>One letter must be Uppercased</li>'.
        '<li>It must contain one of these special characters:'.
            '<ol><li>*</li><li>-</li><li>.</li></ol>'.
        '</li></ul>';

    /**
     * @param $email
     * @return bool
     */
    public static function isEmail($email): bool
    {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (preg_match($regex, $email)) {
            return true;
        }
        return false;
    }

    /**
     * @param $username
     * @return bool
     */
    public static function isUsername($username): bool
    {
        if (preg_match("/^[0-9a-zA-Z]*$/", $username)) {
            return true;
        }
        return false;
    }

    /**
     * @param $phone
     * @return bool
     */
    public static function isPhoneNumber($phone): bool
    {
        if (preg_match("/^\+[0-9]{9}$/", $phone)) {
            return true;
        }
        return false;
    }

    /**
     * @param $password
     * @return bool
     */
    public static function isValidPassword($password): bool
    {
        if (preg_match("/[a-zA-Z0-9]{6}/", $password)) {
            return true;
        }
        return false;
    }
}