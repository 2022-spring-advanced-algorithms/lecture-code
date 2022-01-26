# Install function for packages    
packages<-function(x){
  x<-as.character(match.call()[[2]])
  if (!require(x,character.only=TRUE)){
    install.packages(pkgs=x,repos="http://cran.r-project.org")
    require(x,character.only=TRUE)
  }
}

packages(lpSolve)

# Set coefficients of the objective function
f.objective <- c(80, 100)
 
# Set matrix corresponding to coefficients of constraints by rows
# Do not consider the non-negative constraint; it is automatically assumed
f.constraints <- matrix(c(1,1,
                  20,40,
                  4, 16), nrow = 3, byrow = TRUE)

# Set inequality signs
f.comparison <- c("<=",
                  "<=",
                  "<=")

# Set right hand side coefficients
f.bounds <- c(100,
              2400,
              800)

# Final value (z)
z = lp("max", f.objective, f.constraints, f.comparison, f.bounds)
z

# Variables final values
values = lp("max", f.objective, f.constraints, f.comparison, f.bounds)$solution
values