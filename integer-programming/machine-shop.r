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
f.obj <- c(100, 150)
 
# Set matrix corresponding to coefficients of constraints by rows
# Do not consider the non-negative constraint; it is automatically assumed
f.con <- matrix(c(8000, 4000,
                  15, 30), nrow = 2, byrow = TRUE)

# Set unequality signs
f.dir <- c("<=",
           "<=")

# Set right hand side coefficients
f.rhs <- c(40000,
           200)

# Final value (z)
z = lp("max", f.obj, f.con, f.dir, f.rhs, int.vec = 1:2)
z

# Variables final values
values = lp("max", f.obj, f.con, f.dir, f.rhs, int.vec = 1:2)$solution
values
