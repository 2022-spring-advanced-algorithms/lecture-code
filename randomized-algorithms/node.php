<?php

class Node
{
	private $data;

	function __construct ($inData)
	{
		$this->data = $inData;
	}

	public function getData()
	{
		return $this->data;
	}
}
