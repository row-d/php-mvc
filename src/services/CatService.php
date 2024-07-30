<?php

class CatService
{
  static private $cats = [
    ['name' => 'Bella', 'age' => 2, 'breed' => 'Siamese'],
    ['name' => 'Luna', 'age' => 1, 'breed' => 'Tabby'],
    ['name' => 'Simba', 'age' => 3, 'breed' => 'Persian'],
  ];

  static function getCats()
  {
    return self::$cats;
  }

  static function addCat($cat)
  {
    self::$cats[] = $cat;
    return self::$cats;
  }

  static function getCat($name)
  {
    foreach (self::$cats as $cat) {
      if ($cat['name'] === $name) {
        return $cat;
      }
    }
    return null;
  }
}