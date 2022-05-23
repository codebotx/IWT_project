import numpy as np
import matplotlib.pyplot as plt
import pandas as pd

X = pd.read_csv('./Training Data/Linear_X_Train.csv')
y = pd.read_csv('./Training Data/Linear_Y_Train.csv')

# Convert X,Y to Numpy arrays
X = X.values
y = y.values

# Normalisation
u = X.mean()
std = X.std()
X = (X-u)/std

def hypothesis(x,theta):
    y_ = theta[0] + theta[1]*x
    return y_

def gradient(X,Y,theta):
    m = X.shape[0]
    grad = np.zeros((2,))
    for i in range(m):
        x = X[i]
        y_ = hypothesis(x,theta)
        y = Y[i]
        grad[0] += (y_ - y)
        grad[1] += (y_ - y)*x
    return grad/m

def error(X,Y,theta):
    m = X.shape[0]
    total_error = 0.0
    for i in range(m):
        y_ = hypothesis(X[i],theta)
        total_error += (y_ - Y[i])**2
        
    return (total_error/m)
    

def gradientDescent(X,Y,max_steps=100,learning_rate =0.1):
    
    theta = np.zeros((2,))
    error_list = []
    theta_list = []
    
   
    for i in range(max_steps):
        
        # Compute grad
        grad = gradient(X,Y,theta)
        e = error(X,Y,theta)[0]
        
        
        #Update theta
        theta[0] = theta[0] - learning_rate*grad[0]
        theta[1] = theta[1] - learning_rate*grad[1]
        # Storing the theta values during updates
        theta_list.append((theta[0],theta[1]))
        error_list.append(e)
        
    return theta,error_list,theta_list

theta,error_list,theta_list = gradientDescent(X,y)
y_ = hypothesis(X,theta)


c = open('c.txt', 'r')
content = c.readlines()
hr=int(content[0])

mn1=np.min(X)
mx1=np.max(X)
# print(mx1, mn1)
# print(hr)

xmin=0
xmax=8
#Denormalizing

predx =(hr-xmin)*(mx1-mn1)/(xmax-xmin) + mn1 

# print(predx) # denormalized input x

predy=hypothesis(predx,theta)

# print(predy) # denormalized input x

mx=np.max(y)
mn=np.min(y)
# print(mx, mn)
tmin=0
tmax=100

sc= ((predy-mn)/(mx-mn) )*(tmax-tmin) + tmin 

sc=str(sc)
print(sc)


file=open('output.txt','w')
file.write(sc)
file.close()