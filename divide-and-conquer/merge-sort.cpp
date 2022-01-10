#include "merge-sort.hpp"


void MergeSort::Sort(std::vector<int>& data)
{
	MergeSort::RecursiveSort(data, 0, data.size());
}

void MergeSort::RecursiveSort(std::vector<int>& data, int start, int end)
{
	if (start >= end)
	{
		return;
	}
	int middle = (start+end)/2;
	MergeSort::RecursiveSort(data, start, middle);
	MergeSort::RecursiveSort(data, middle+1, end);
	MergeSort::Merge(data, start, end);
}

void MergeSort::Merge(std::vector<int>& data, int start, int end)
{
	std::vector<int> input = data;
	int middle = (start+end)/2;
	int leftIndex = start;
	int rightIndex = middle + 1;

	while (leftIndex <= middle && rightIndex <= end)
	// both sides still have have to merge
	{
		if (input[leftIndex] < input[rightIndex])
		{
			data[start++] = input[leftIndex++];
		}
		else
		{
			data[start++] = input[rightIndex++];
		}
	}
	while (rightIndex <= end)
	{
		data[start++] = input[rightIndex++];
	}
	while (leftIndex <= middle)
	{
		data[start++] = input[leftIndex++];
	}
}
