<?php
// Boolean
$booleanVar = true;

// Integer
$integerVar = 1;

// Float
$floatVar = 1.5;

// String
$stringVar = "Ini Teks";

// Array
$arrayVar = ["nama" => "Irsal", "umur" => 20];

// Class & Object
class Mobil
{
  // Properties
  public $name;
  public $tahun;

  // Constructor
  function __construct($name, $tahun)
  {
    $this->name = $name;
    $this->tahun = $tahun;
  }

  // Methods
  // Setter
  function set_name($name)
  {
    $this->name = $name;
  }

  // Getter
  function get_name()
  {
    return $this->name;
  }
}

// Object
$mobilObj = new Mobil("Toyota", 2022);

// Resource
$file = fopen('text.txt', 'r');

// NULL
$nullVar = null;

// Constant
define("PHI", 3.14);
