<?php
# class_asp.php

class Asp{
		
	protected $asp;
	protected $opt1;
	protected $opt2;
	protected $opt3;
	protected $opt4;
	protected $opt5;
	protected $opt6;
	protected $opt7;
	protected $opt8;
	protected $buch = array(1=>'A',2=>'B',3=>'C',4=>'D',5=>'E',6=>'F',7=>'G',8=>'H');
	
	public function __construct(){}
	
	public function setAsp($asp){
		$this->asp = $asp;
	}
	
	public function getAsp(){
		return $this->asp;
	}
	
	protected function getFirstChar(){
		//Example: C5 => C
		$firstChar = substr($this->asp, 0, 1);
		//C => 2 aus Array
		$firstChar = array_search($firstChar, $this->buch); 
		return $firstChar;
	}
	
	protected function getSecChar(){	
		//Example: C5 => 5
		$secChar = substr($this->asp, 1, 1);
		return $secChar;
	}
	
	protected function imBrett($wert){
		if($wert >= 1 && $wert <= 8 ){
			return $wert;
		}else{
			return false;
		}
	}
			
	public function setOptions(){
		//Hier ausrechnen
		$this->opt1 = $this->getFirstChar() + 1;
		$this->opt2 = $this->getFirstChar() - 1 ;
		$this->opt3 = $this->getFirstChar() + 2;
		$this->opt4 = $this->getFirstChar() - 2;
		$this->opt5 = $this->getSecChar() + 1;
		$this->opt6 = $this->getSecChar() - 1;
		$this->opt7 = $this->getSecChar() + 2;
		$this->opt8 = $this->getSecChar() - 2;	

		//Die Optionen ueberschreiben
		$this->opt1 = $this->imBrett($this->opt1);
		$this->opt2 = $this->imBrett($this->opt2);
		$this->opt3 = $this->imBrett($this->opt3);
		$this->opt4 = $this->imBrett($this->opt4);
		$this->opt5 = $this->imBrett($this->opt5);
		$this->opt6 = $this->imBrett($this->opt6);
		$this->opt7 = $this->imBrett($this->opt7);
		$this->opt8 = $this->imBrett($this->opt8);
	}	
	
	public function getOption1(){
		if( $this->opt3 != "" && $this->opt6 != ""){
			$w = $this->buch[$this->opt3].''.$this->opt6;
			return $w;	
		}
	}	
	
	public function getOption2(){
		if( $this->opt4 != "" && $this->opt6 != ""){
			$w = $this->buch[$this->opt4].''.$this->opt6;
			return $w;	
		}	
	}
	
	public function getOption3(){
		if( $this->opt3 != "" && $this->opt5 != ""){
			$w = $this->buch[$this->opt3].''.$this->opt5;
			return $w;	
		}			
	}
	
	public function getOption4(){
		if( $this->opt4 != "" && $this->opt5 != ""){
			$w = $this->buch[$this->opt4].''.$this->opt5;
			return $w;	
		}	
	}
	
	public function getOption5(){
		if( $this->opt1 != "" && $this->opt7 != ""){
			$w = $this->buch[$this->opt1].''.$this->opt7;
			return $w;	
		}		
	}	
	
	public function getOption6(){
		if( $this->opt2 != "" && $this->opt7 != ""){
			$w = $this->buch[$this->opt2].''.$this->opt7;
			return $w;	
		}		
	}
	
	public function getOption7(){
		if( $this->opt1 != "" && $this->opt8 != ""){
			$w = $this->buch[$this->opt1].''.$this->opt8;
			return $w;	
		}	
	}
	
	public function getOption8(){
		if( $this->opt2 != "" && $this->opt8 != ""){
			$w = $this->buch[$this->opt2].''.$this->opt8;
			return $w;	
		}		
	}	
}
?>

