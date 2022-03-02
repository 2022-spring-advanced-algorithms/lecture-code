package main

import (
	"fmt"
	"math")

func main () {
	vertexCount := 5
	shortestPathUpToNodeK := make([][]int, vertexCount)
	for i:= range shortestPathUpToNodeK {
		shortestPathUpToNodeK[i] = make([]int, vertexCount)
	}
	// now have a matrix

	shortestPathUpToNodeKMinus1 := [][]int {
		{0, 3, 8, math.MaxInt16, -4},
		{math.MaxInt16, 0, math.MaxInt16, 1, 7},
		{math.MaxInt16, 4, 0, math.MaxInt16, math.MaxInt16},
		{2, math.MaxInt16, -5, 0, math.MaxInt16},
		{math.MaxInt16, math.MaxInt16, math.MaxInt16, 6, 0},
	}

	for k := 0; k < vertexCount; k++ {
		for pathStart := 0; pathStart < vertexCount; pathStart++ {
			for pathEnd := 0; pathEnd < vertexCount; pathEnd++ {
				if shortestPathUpToNodeKMinus1[pathStart][pathEnd] <= shortestPathUpToNodeKMinus1[pathStart][k] + shortestPathUpToNodeKMinus1[k][pathEnd] {
					shortestPathUpToNodeK[pathStart][pathEnd] = shortestPathUpToNodeKMinus1[pathStart][pathEnd]
				} else {
					shortestPathUpToNodeK[pathStart][pathEnd] = shortestPathUpToNodeKMinus1[pathStart][k] + shortestPathUpToNodeKMinus1[k][pathEnd]
				}
			}
		}
		
		for i := range shortestPathUpToNodeK {
			for j := range shortestPathUpToNodeK {
				shortestPathUpToNodeKMinus1[i][j] = shortestPathUpToNodeK[i][j]
			}
		}

	}
	for i:= range shortestPathUpToNodeK {
		fmt.Println(shortestPathUpToNodeK[i])
	}
}