<?php

require_once("node.php");

class SkipList
{
	private $head = NULL;
	private $height = 0;

	public function __construct ()
	{
		$this->head = new Node(-INF);
	}

	public function insert ($value)
	{
		$newNode = new Node($value);

		$currentLevel = 0;

		// insert at level 0
		$this->insertAtLevel($newNode, $currentLevel++);

		while (rand() % 2) // coin flip is heads
		{
			// insert at next higher level
			$this->insertAtLevel($newNode, $currentLevel++);
			if ($currentLevel > $this->height)
			{
				$this->height++;
			}
		}
	}

	private function insertAtLevel ($node, $level)
	{
		$nodeToInsertAfter = $this->head;

		// get to the right position in the list at level
		while (!is_null($nodeToInsertAfter->getNext($level))
			&& $nodeToInsertAfter->getNext($level)->getData() < $node->getData())
		{
			$nodeToInsertAfter = $nodeToInsertAfter->getNext($level);
		}

		$nodeToInsertAfter->setNext(['node' => $node, 'level' => $level]);
	}

	public function getPath ($searchKey): string
	{
		ob_start(); // Buffer all echo statements
		$currentLevel = $this->height;
		$currentNode = $this->head;

		$lastStop = $this->head;

		while ($currentNode->getData() != $searchKey && $currentLevel >= 0)
		{
			if (is_null($currentNode->getNext($currentLevel))
				|| $currentNode->getNext($currentLevel)->getData() > $searchKey)
			{
				if ($lastStop != $currentNode)
				{
					echo "Take level $currentLevel until ".$currentNode->getData().PHP_EOL;
				}
				$lastStop = $currentNode;
				--$currentLevel;
			}
			else
			{
				//echo "Going to next node on level $currentLevel\n";
				$currentNode = $currentNode->getNext($currentLevel);
			}
		}

		if ($currentNode->getData() != $searchKey)
		{
			echo "Unable to find $searchKey";
		}
		else
		{
			echo "Reach destination $searchKey on level $currentLevel";
		}

		return ob_get_clean(); // purge the buffer
	}

	public function showAll ()
	{
		$currentLevel = $this->height;

		while ($currentLevel >= 0)
		{
			$currentNode = $this->head;

			while (!is_null($currentNode))
			{
				echo $currentNode->getData();
				if (!is_null($currentNode->getNext($currentLevel)))
				{
					echo '->';
				}
				$currentNode = $currentNode->getNext($currentLevel);
			}

			$currentLevel--;

			echo PHP_EOL;
		}
	}
}
