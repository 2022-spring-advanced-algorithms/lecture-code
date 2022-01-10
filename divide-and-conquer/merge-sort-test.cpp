#include "../test-framework/catch/catch.hpp"
#include "merge-sort.hpp"
#include <vector>

TEST_CASE("Simple sort verification")
{
	std::vector<int> numbers = {12, -3, 33, 12, 199, 999};
	std::vector<int> sortedNumbers = {-3, 12, 12, 33, 199, 999};

	// call the sort
	MergeSort::Sort(numbers);

	REQUIRE(sortedNumbers == numbers);
}
