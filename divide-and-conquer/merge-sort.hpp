#ifndef MERGE_SORT_HPP
#define MERGE_SORT_HPP
#include<vector>

class MergeSort
{
	private:
		static void RecursiveSort(std::vector<int>& data, int start, int end);
		static void Merge(std::vector<int>& data, int start, int end);

	public:
		static void Sort(std::vector<int>& data);
};

#endif /*MERGE_SORT_HPP*/
