<?php

namespace App\Models;

use App\Core\Model;

/**
 * @author  Muhammed Sami
 * @package App\Models
 */
class RegisterModel extends Model
{
    public string $firstname;

    public string $lastname;

    public string $password;

    public string $confirmPassword;

    public function register()
    {
    }

    public function rules(): array
    {
        return [
            'firstname'       => [self::RULE_REQUIRED],
            'lastname'        => [self::RULE_REQUIRED],
            'email'           => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password'        => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'confirmPassword' => [self::RULE_REQUIREDİ, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }
}
