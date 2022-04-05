import numpy
import random

def infinite_sequence(limit):
    num = 1
    while num <= limit:
        yield num
        num += 1

def random_sample(new, n, old):
    randomValue = numpy.random.rand(1,1)
    if randomValue <= 1/n:
        return new
    else:
        return old


# @@@@ MAIN

limit = input("Enter the stopping point for the 'infinite' stream: ")
limit = int(limit)

n = 1
selected = 1

for i in infinite_sequence(limit):
    selected = random_sample(i, n, selected)
    n += 1

print(selected)
