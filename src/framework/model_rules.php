<?php
enum ModelRule: string
{
  case REQUIRED = 'required';
  case EMAIL = 'email';
  case MIN = 'min';
  case MAX = 'max';
  case MATCH = 'match';
  case UNIQUE = 'unique';
  case STRING = 'string';

  case NUMBER = 'number';

  case INTEGER = 'integer';

  case ARRAY = 'array';

  case FLOAT = 'float';

  case BOOLEAN = 'boolean';


  public function message(mixed $ruleValue, string $attr): string
  {
    return match ($this) {
      ModelRule::REQUIRED => "The $attr field is required",
      ModelRule::EMAIL => "The $attr field must be a valid email",
      ModelRule::MIN => "The $attr field must be at least $ruleValue characters",
      ModelRule::MAX => "The $attr field must be at most $ruleValue characters",
      ModelRule::MATCH => "The $attr field must match with $ruleValue",
      ModelRule::UNIQUE => "The $attr field must be unique",
      ModelRule::STRING => "The $attr field must be a string",
      ModelRule::NUMBER => "The $attr field must be a number",
      ModelRule::INTEGER => "The $attr field must be an integer",
      ModelRule::ARRAY => "The $attr field must be an array",
      ModelRule::FLOAT => "The $attr field must be a float",
      ModelRule::BOOLEAN => "The $attr field must be a boolean",
      default => "The $attr field is invalid"
    };
  }
}