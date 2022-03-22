<?php

require_once("node.php");

class Test extends \PHPUnit\Framework\TestCase
{
	public function testNodeLevel0 ()
	{
		$node1 = new Node(1);
		$this->assertEquals(1, $node1->getData());
		$node2 = new Node(2);
		$node3 = new Node(3);
	}
}
