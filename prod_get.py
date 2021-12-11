import json
file = open('products.list', 'r')
lines = file.readlines()
array = []

count = 0
for line in lines:
    data = line.split(' > ')
    arr = {}
    arr['image'] = 'images/'+data[0]+'.jpg'
    arr['description'] = (data[1]).strip()
    array.append(arr)
    
with open("products.json", 'w') as o:
    o.write(json.dumps(array))
file.close()
