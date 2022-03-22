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

		$node1->setNext(['node' => $node2, 'level' => 0]);

		$this->assertEquals($node2, $node1->getNext(0));
	}

	public function testOtherLevels ()
	{
		$node1 = new Node(1);
		$node2 = new Node(2);
		$node3 = new Node(3);
		$node1->setNext(['node' => $node2, 'level' => 0]);
		$node2->setNext(['node' => $node3, 'level' => 0]);
		$node1->setNext(['node' => $node3, 'level' => 1]);

		$this->assertEquals($node2, $node1->getNext(0));
		$this->assertEquals($node3, $node1->getNext(1));
		$this->assertEquals($node3, $node2->getNext(0));

		$node4 = new Node(4);
		$node2->setNext(['node' => $node4, 'level' => 0]);

		$this->assertEquals($node4, $node2->getNext(0));
		$this->assertEquals($node3, $node4->getNext(0));

	}
}
