package main

import (
	"fmt"
	"math")

type Edge struct {
	source int
	destination int
	weight int
}

func main () {
	var vertexCount = 6
	distanceFromSource := make([]int, vertexCount)
	for i:= 0; i < vertexCount; i++ {
		distanceFromSource[i] = math.MaxInt16
	}
	// pick source to be node 6 (index 5)
	distanceFromSource[5] = 0

	var edges = []Edge {
		{1, 0, 1},
		{2, 1, 2},
		{3, 0, -4},
		{3, 4, 3},
		{0, 4, -1},
		{1, 3, 2},
		{4, 1, 7},
		{5, 1, 5},
		{5, 2, 10},
		{2, 5, -8},
	}

	for i := 0; i < vertexCount; i++ {
		for j := range edges {
			if distanceFromSource[edges[j].destination] > distanceFromSource[edges[j].source] + edges[j].weight {
				distanceFromSource[edges[j].destination] = distanceFromSource[edges[j].source] + edges[j].weight
			}
		}
	}

	fmt.Println(distanceFromSource)
}