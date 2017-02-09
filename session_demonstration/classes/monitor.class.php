<?php

/**
	O nome da classe é MONITOR. Seus atributos são _LARGURA_PX, _ALTURA_PX, _COR e _MARCA

*/


class MONITOR{

	private $_MARCA;
	private $_COR;
	private $_LARGURA_PX;
	private $_ALTURA_PX;
	private $_DATA_INSERIDO;
	private $_HORA_INSERIDO;
   
   
	public function set($_PROPRIEDADE, $_VALOR){
		$this->$_PROPRIEDADE = $_VALOR;
	}

	public function get($_PROPRIEDADE){
		return $this->$_PROPRIEDADE;
	}
	
	function MONITOR($_VALOR_MARCA, $_COR, $_LARGURA_PX, $_ALTURA_PX, $_DATA_INSERIDO,$_HORA_INSERIDO){
		$this->_MARCA = $_VALOR_MARCA;
		$this->_COR = $_COR;
		$this->_LARGURA_PX = $_LARGURA_PX;
		$this->_ALTURA_PX = $_ALTURA_PX;
		$this->_DATA_INSERIDO = $_DATA_INSERIDO;
		$this->_HORA_INSERIDO = $_HORA_INSERIDO;
	}
   
   
}


/**
	O método MONITOR que detém o mesmo nome da classe, é o método construtor. 
	
	É executado no momento do instanciamento do objeto.
*/
