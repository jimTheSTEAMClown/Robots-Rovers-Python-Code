# Python Dictionaries
'''
Python Dictionaries - Lists vs. Dictionaries 
Dictionaries are Key:Value pairs of objects in 
a list like structure.

Challenge #1
Run the code, Explain the difference between lists and dictionaries
      
- See that the list is index'able
- See that the Dictionary is a keyword:value pair

- How do you "index" a dictionary?

- Add an additional key:value pair to the ddd dictionary
  Imagine that this is a dictionary for a college engineering class.  
  Does it have a lab? 'lab':'true' , add a short description for 
  the class. 'description':'short string describing the class'

'''

lst = list()
lst.append(183)
lst.append("2:00 PM")
print(lst)
lst[1] = "3:00 PM"
print(lst)
print(lst[1])

ddd = dict()
ddd['course'] = 182
ddd['time'] = "2:00 PM"
print(ddd)
ddd['time'] = "3:00 PM"
print(ddd)
print(ddd['time'])
