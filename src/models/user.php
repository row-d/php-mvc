<?php
declare(strict_types=1);
include_once MODELS_DIR . '/model.php';
class UserModel extends Model
{
  public string $firstname = '';
  public string $lastname = '';
  public string $email = '';
  public string $password = '';
  public string $password_confirmation = '';

  public function __construct(array $data)
  {
    parent::__construct($data);
  }
  public function rules(): array
  {
    return [
      'firstname' => [ModelRule::REQUIRED, [ModelRule::MIN, 3]],
      'lastname' => [ModelRule::REQUIRED, [ModelRule::MIN, 3]],
      'email' => [ModelRule::REQUIRED, ModelRule::EMAIL],
      'password' => [ModelRule::REQUIRED, [ModelRule::MIN, 8], [ModelRule::MAX, 24]],
      'password_confirmation' => [ModelRule::REQUIRED, [ModelRule::MATCH ,'password']],
    ];
  }

  public function verifyUnique(string $attr): bool
  {
    return true;
  }
}