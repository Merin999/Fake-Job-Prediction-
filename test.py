
# coding: utf-8

# In[1]:


import numpy as np
import pandas as pd
import pickle


# In[2]:


df=pd.read_csv('test.csv')
df=df.iloc[0:1,1:]
df


# In[3]:


import math
df['text_length']=df.apply(lambda x: math.log(len(x['text'])+1), axis=1) 
df


# In[4]:


df.drop(['text'],axis=1,inplace=True)


# In[5]:


file=open("function.txt",'r')
function=file.read()
file.close()
function=eval(function)
type(function)


# In[6]:


file=open("industry.txt",'r')
industry=file.read()
file.close()
industry=eval(industry)
type(industry)


# In[7]:


file=open("location.txt",'r')
location=file.read()
file.close()
location=eval(location)
type(location)


# In[8]:


file=open("required_education.txt",'r')
required_education=file.read()
file.close()
required_education=eval(required_education)
type(required_education)


# In[9]:


file=open("required_experience.txt",'r')
required_experience=file.read()
file.close()
required_experience=eval(required_experience)
type(required_experience)


# In[10]:


file=open("employment_type.txt",'r')
employment_type=file.read()
file.close()
employment_type=eval(employment_type)
type(employment_type)


# In[11]:


df['function_new'].replace(function,inplace=True)
df['industry_new'].replace(industry,inplace=True)
df['location_new'].replace(location,inplace=True)
df['required_education_new'].replace(required_education,inplace=True)
df['required_experience_new'].replace(required_experience,inplace=True)
df['employment_type_new'].replace(employment_type,inplace=True)


# In[12]:


df


# In[13]:


filename = 'model.sav'
filename1 = 'model_rf.sav'
filename2 = 'model_dt.sav'
clf_svm = pickle.load(open(filename, 'rb'))
clf_rf = pickle.load(open(filename1, 'rb'))
clf_dt = pickle.load(open(filename2, 'rb'))

# In[14]:


y_pred_svm=clf_svm.predict(df)
y_pred_rf=clf_rf.predict(df)
y_pred_dt=clf_dt.predict(df)



# In[15]:

##print(y_pred_svm)
#print(y_pred_rf)
acc_svm=0.831543624161
acc_dt=0.94138170022371364654
acc_rf=0.859770246085011
#print(y_pred_dt)

output_svm=np.max(y_pred_svm)
output_rf=np.max(y_pred_rf)
output_dt=np.max(y_pred_dt)

analysis=""

#print("SVM output:")
if output_svm == 0:
    res_svm="real job"
elif output_svm==1:
    res_svm="fake job"

accuracy_svm="\nAccuracy: "+str(acc_svm*100)
#print("Accuracy:",acc_svm*100)
	
#print("\nRandom Forest output:")
if output_rf == 0:
    res_rf="real job"
elif output_rf==1:
    res_rf="fake job"
accuracy_rf="\nAccuracy: "+str(acc_rf*100)
#print("Accuracy:",acc_rf*100)

#print("\noutput:")
if output_dt == 0:
    res_dt="real job"
elif output_dt==1:
    res_dt="fake job"
accuracy_dt="\nAccuracy: "+str(acc_dt*100)
#print("Accuracy:",acc_dt*100)

analysis+="\nSVM output:"
analysis+=str(res_svm)
analysis+=accuracy_svm
analysis+="\n\nRandom Forest output:"
analysis+=str(res_rf)
analysis+=accuracy_rf
analysis+="\n\nDecision Tree output:"
analysis+=str(res_dt)
analysis+=accuracy_dt

out=""
#out+="\nOUTPUT:"
out+=str(res_dt)
#out+=accuracy_dt

file=open("analysis.txt","w")
file.write(analysis)
file.close()
file=open("out.txt","w")
file.write(out)
file.close()
print(analysis)
print(out)

x=["svm","Random forest","Decision Tree"]
y=[acc_svm*100,acc_rf*100,acc_dt*100]

import matplotlib.pyplot as plt

plt.bar(x,y,width=0.5,color=["red","green","blue"])
plt.xlabel("Algorithms")
plt.ylabel("Accuracy")
plt.title("Algorithm comparison")
plt.savefig("accuracy.png")
plt.close()
