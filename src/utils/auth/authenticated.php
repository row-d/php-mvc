<?php

function is_authenticated(): bool
{
  return isset($_SESSION['user']);
}