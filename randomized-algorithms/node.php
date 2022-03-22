<?php

class Node
{
	private $data;
	private $nexts = [];

	function __construct ($inData)
	{
		$this->data = $inData;
	}

	public function setNext ($inData)
	{
		if (!is_null($this->nexts[$inData['level']]))
		{
			$inData['node']->setNext(['level' => $inData['level'], 'node' => $this->nexts[$inData['level']]]);
		}

		$this->nexts[$inData['level']] = $inData['node'];
	}

	public function getData ()
	{
		return $this->data;
	}

	public function getNext ($level)
	{
		return $this->nexts[$level];
	}
}
