import sys
import os
import easyocr
import numpy as np
import imutils
from matplotlib import pyplot as plt
import cv2
import requests
url='https://310cj.github.io/OCRtext/readr/templates/index.html'

from flask import Flask,render_template,request

app=Flask(__name__)
@app.route('https://310cj.github.io/OCRtext/readr/templates/index.html',methods=["GET","POST"])

def net(self):
    if request.method =="POST":
        img_path = request.form.get("file_u")
        return "Your Number Plate Is::"+img_show(det)
    return render_template("index.html")

if(__name__=='__main__'):
    app.run()

    
# img_path = './c.jpg'
img=cv2.imread(img_path)
gray=cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)
plt.imshow(cv2.cvtColor(gray,cv2.COLOR_BGR2RGB))

bfilter=cv2.bilateralFilter(gray,11,17,17)
edged=cv2.Canny(bfilter,30,200)
plt.imshow(cv2.cvtColor(edged,cv2.COLOR_BG2RGB))

keypoints=cv2.findContours(edged.copy(),cv2.RETR_TREE,cv2.CHAIN_APPROX_SIMPLE)
contours=imutils.grab_contours(keypoints)
contours=sorted(contours,key=cv2.contourArea, reverse=True)

location=None
for contour in contours:
    approx=cv2.approxPolyDP(contour,10,True)
    if len(approx)==4:
        location=approx
        break
    

mask=np.zeros(gray.shape,np.uint8)
new_image=cv2.drawContours(mask, [location],0,255,-1)
new_image=cv2.bitwise_and(img, img, mask=mask)
plt.imshow(cv2.cvtColor(new_image,cv2.COLOR_BGR2RGB))


(x,y)=np.where(mask==255)
(x1,y1)=(np.min(x),np.max(y))
(x2,y2)=(np.max(x),np.max(y))
cropped_image=gray[x1:x2+1,y1:y2+1]
plt.imshow(cv2.cvtColor(cropped_image,cv2.COLOR_BGR2RGB))


reader=easyocr.Reader(['en'])
result=reader.readtext(cropped_image)



text=result[0][-2]
font=cv2.FONT_HERSHEY_COMPLEX
res=cv2.putText(img,text=text, org=(approx[0][0][0], approx[1][0][1]+60),fontFace=font,fontScale=1,color=(0,255,0),thickness=2,lineType=cv2.LINE_AA)
res=cv2.rectangle(img, tuple(approx[0][0]),tuple(approx[2][0]),(0,255,0),3)

det=plt.imshow(cv2.cvtColor(res,cv2.COLOR_BGR2RGB))

def img_show(self,net):
    return det
