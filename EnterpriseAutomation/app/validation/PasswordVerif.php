<?php

namespace App\Validation;
use InvalidArgumentException;

class PasswordVerif {
    public function check_strong_password($str) : bool {
        if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
            return true;
        }
            return false;
        }
}