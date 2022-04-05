import numpy
import random
import matplotlib.pyplot as pyplot

numberOfNumbersToChooseFrom = 10
numberOfSamples = numberOfNumbersToChooseFrom * 1000


def streaming_select(values):
    n = 1
    seelcted = values[0]
    # BEGIN SAMPLING
    for x in values:
        randomValue = numpy.random.rand(1,1)
        if randomValue < 1/n:
            selected = values[n-1]
        n += 1
    # END SAMPLING
    return selected



# @@@ MAIN

values = numpy.arange(1, numberOfNumbersToChooseFrom +1) # [1, numberOfNumbersToChooseFrom+1)
# 1,2,3,...,10

bins = [0] * numberOfNumbersToChooseFrom

for i in range(numberOfSamples):
    selected = streaming_select(values)
    bins[selected-1] += 1

pyplot.bar(range(1, numberOfNumbersToChooseFrom + 1), bins)
pyplot.show()
