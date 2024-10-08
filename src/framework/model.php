<?php

include_once __DIR__ . '/model_rules.php';

abstract class Model
{
  public array $errors = [];
  public function __construct(array $data)
  {
    foreach ($this->rules() as $attr => $rules) {
      $this->errors[$attr] = [];
    }

    foreach ($data as $key => $value) {
      if (property_exists($this, $key)) {
        $this->{$key} = match (gettype($this->{$key})) {
          'integer' => (int) $value,
          'boolean' => (bool) $value,
          'double' => (float) $value,
          default => $value
        };
      } else {
        $this->errors[$key] = "The $key field is invalid";
      }
    }
  }

  /**
   * Este metodo debe retornar un array con las reglas de validacion
   * Ejemplo:
   * <code>
   * <?php
   *  return [
   *  'email' => [EntityRule::REQUIRED, EntityRule::EMAIL],
   *  'password' => [EntityRule::REQUIRED, [EntityRule::MIN,8]],
   *  'password_confirmation' => [[EntityRule::MATCH, 'password']],
   * ];
   * ?>
   * </code>
   */
  abstract function rules(): array;
  /**
   * Este metodo debe retornar un booleano indicando si el atributo es unico en la base de datos
   * @param string $attr
   * @return bool
   */
  abstract function verifyUnique(string $attr): bool;
  /**
   * Verifica si el atributo cumple con la regla
   * @param ModelRule $rule
   * @param mixed $ruleValue
   * @param string $attr
   * @return bool
   */
  private function verifyRule(ModelRule $rule, mixed $ruleValue, string $attr): bool
  {
    return match ($rule) {
      ModelRule::MIN => match (true) {
          is_string($this->{$attr}) => strlen($this->{$attr}) >= $ruleValue,
          is_numeric($this->{$attr}) => $this->{$attr} >= $ruleValue,
          default => false
        },
      ModelRule::MAX => match (true) {
          is_string($this->{$attr}) => strlen($this->{$attr}) <= $ruleValue,
          is_numeric($this->{$attr}) => $this->{$attr} <= $ruleValue,
          default => false
        },
      ModelRule::REQUIRED => !empty($this->{$attr}),
      ModelRule::EMAIL => filter_var($this->{$attr}, FILTER_VALIDATE_EMAIL),
      ModelRule::MATCH => $this->{$attr} === $this->{$ruleValue},
      ModelRule::UNIQUE => $this->verifyUnique($attr),
      ModelRule::STRING => is_string($this->{$attr}),
      ModelRule::NUMBER => is_numeric($this->{$attr}),
      ModelRule::INTEGER => is_int($this->{$attr}),
      ModelRule::ARRAY => is_array($this->{$attr}),
      ModelRule::FLOAT => is_float($this->{$attr}),
      ModelRule::BOOLEAN => is_bool($this->{$attr}),
      default => false
    };
  }

  public function hasErrors()
  {
    return empty(array_filter($this->errors, fn($attr) => !empty ($attr)));
  }
  public function validate(): bool
  {

    foreach ($this->rules() as $attr => $rules) {
      foreach ($rules as $rule) {
        $is_rule = $rule instanceof ModelRule;
        $ruleName = $is_rule ? $rule : $rule[0];
        $ruleValue = $is_rule ? null : $rule[1];
        if (!$this->verifyRule($ruleName, $ruleValue, $attr)) {
          $this->errors[$attr][] = $ruleName->message($ruleValue, $attr);
        }
      }
    }

    return $this->hasErrors();

  }

  public static function create_input($name, $placeholder, $autocomplete, $type = 'text'): string
  {
    $are_errors = !empty($_SESSION[SESSION_ERRORS_KEY][$name]);
    $has_autocomplete = !empty($_SESSION[SESSION_AUTOCOMPLETE][$name]);
    $is_invalid = match (true) {
      $are_errors => 'true',
      $has_autocomplete => 'false',
      !$are_errors && !$has_autocomplete => '',
    };
    $errors = implode('<br>', $_SESSION[SESSION_ERRORS_KEY][$name] ?? []);
    $value = $_SESSION[SESSION_AUTOCOMPLETE][$name] ?? '';
    return <<<HTML
    <input name="$name" type="$type" placeholder="$placeholder" autocomplete="$autocomplete" aria-invalid="$is_invalid"
    aria-describedby="$name-helper"  value="$value" />
    <small id="$name-helper" >$errors</small>
  HTML;
  }

}