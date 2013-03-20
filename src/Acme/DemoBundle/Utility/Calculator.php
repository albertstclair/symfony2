<?php
// src/Acme/DemoBundle/Utility/Calculator.php
namespace Acme\DemoBundle\Utility;

class Calculator{
	private $first;
	private $file_array;

	function __construct(){
		$this->first = 0;
		$this->file_array = array();
	}

	/**
	*  return the results of multiplying 2 numbers
	*
	* @param type integer $first, $second
	* @return type interger $result 
	*/
	public function multiply( $first,  $second){
		$first = intval($first);
		$second = intval($second);
		$result = $first * $second;
		return $result;
	}

	/**
	*  return the results of adding 2 numbers
	*
	* @param type integer $first, $second
	* @return type interger $result 
	*/

	public function add($first, $second){
		$first = intval($first);
		$second = intval($second);
		$result = $first + $second;
		return $result;
	}

	/**
	*  return the results of substracting 2 numbers
	*
	* @param type integer $first, $second
	* @return type interger $result 
	*/

	public function substract($first, $second){
		$first = intval($first);
		$second = intval($second);
		$result = $first - $second;
		return $result;
	}

	/**
	*  return the results of dividing 2 numbers
	*
	* @param type integer $first, $second
	* @return type interger $result 
	*/
	public function divide($first, $second){
		$first = intval($first);
		$second = intval($second);
		$result = $first / $second;
		return $result;
	}

	/**
	*  Converts lines of files into an array.
	*
	* Opens a file (each line contains 2 variables 
	* first word second integer seperated by a space)
	* first word is used as array key second variable 'integer' used as array value.
	* 
	* 
	*/

	public function fileToArray(){
		$operator_array = array('multiply','add','divide','substract');
		$endParameter = 'apply';
		$file_handle = fopen("/Users/albertstclair/Sites/symfony2-tutorial/src/Acme/DemoBundle/Tests/Utility/inputFile.txt", "r");
		$i = 0;
		while (!feof($file_handle)) {
			$line_of_text = fgets($file_handle);
			$line_array = explode(' ',$line_of_text);
			if(in_array($line_array[0], $operator_array)){
				$this->file_array[$i++] = array($line_array[0]=>trim($line_array[1])); 
			}elseif($line_array[0] == $endParameter){
				$this->first = trim($line_array[1]);
				break;	
			}
		}
		fclose($file_handle);				
	}

	/**
	*  loops through an array, performs mathematical operations 
	* using privately defined operations in current class between $first variable
	* and value of array $a[key[$a]], saves results in $this->first
	*
	* 
	*/

	public function calculateResults(){
		foreach($this->file_array as $a){
			$op = key($a);
			$value = $a[$op];
			switch($op){
				case "add":
					$this->first = $this->add($this->first,$value);
					break;
				case "multiply":
					$this->first = $this->multiply($this->first,$value);
					break;
				case "divide":
					$this->first = $this->divide($this->first,$value);
					break;
			    case "substract":
			    	$this->first = $this->substract($this->first,$value);
			        break;
			    default:
			}
		}
	}


	/**
	*  return the results of a variable $this->first.
	*
	* @return type integer $first. 
	*/
	public function displayResult(){
		return $this->first;
	}
	
	public function getFirst(){
		return $this->first;
	}
	
	public function getFile_array(){
		return $this->file_array;
	}
}
