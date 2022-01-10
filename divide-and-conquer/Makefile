CXX = g++
CXXFLAGS = -g -std=c++11 -Wall -Werror=return-type  -Werror=uninitialized # --coverage
# Do not allow compiling if a non-void function is missing a return statement
# Do not allow compiling if a variable is used without being initialized

TESTS = merge-sort-test
CATCH = ../test-framework/catch/catch.o

clean:
	rm -rf *.dSYM
	$(RM) *.o *.gc* *.dSYM $(TESTS) core main $(CATCH)

merge-sort-test: merge-sort-test.cpp merge-sort.o

$(TESTS): $(CATCH)
	$(CXX) $(CXXFLAGS) -o $@ $^
	./$@ --success
