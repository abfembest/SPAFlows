#!C:/Users/AB-RAYTECT/AppData/Local/Programs/Python/Python38-32/python.exe
import matplotlib.pyplot as plt
x=[1,2,3,4,5]
x1=[2,4,6,8,9]
y = [1,2,3,4,5]
plt.plot(x,y,x1, linestyle ="dashed", label = "line 1", marker = "o", markerfacecolor = "black",markersize = 12)
#Giving x- axis name
plt.plot(x,x1 ,label = "Line 2", marker = "o", markerfacecolor = "red", markersize = 12)
plt.xlabel("Horisontal axis")
#Giving y- axis name
plt.ylabel("Vertical axis")
plt.title("Graph of boys versus girls")
plt.legend()
plt.fill_between(x,y, facecolor = "orange",color = "black", alpha = 0.2)
plt.fill_between(x,x1, facecolor = "green", alpha = 0.6)

#function to show the plot
plt.savefig('outputgraph.png')
plt.show()
