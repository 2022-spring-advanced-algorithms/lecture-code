<?php

require_once("node.php");
require_once("skip-list.php");

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

	public function testList ()
	{
		srand(0);
		$subway = new SkipList();

		//$subway->showAll();

		$numberOfRandomElementsToInsert = 50;
		for ($i = 0; $i < $numberOfRandomElementsToInsert; ++$i)
		{
			$subway->insert(rand() % 2500);
		}

		$subway->insert(2022);

		// $subway->showAll();
		// echo $subway->getPath(2022);

		$result = <<<RESULT
Take level 7 until 1616
Take level 5 until 1663
Take level 4 until 1880
Take level 1 until 1889
Reach destination 2022 on level 0
RESULT;

		$this->assertEquals($result,$subway->getPath(2022));
	}
}
