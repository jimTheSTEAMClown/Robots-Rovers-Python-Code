'''
Python Dictionaries - Adding values, when the Key
is not in the Dictionary 

Challenge #1
- Run the code, make sure you understand how the dictionary 
is constructed

Challenge #2
- Add a new name not in the dictionary.
- Can you explain how a new name is added with a new birthday? 

'''

def main():
  birthdays = {'Alice': 'Apr 1', 'Bob': 'Dec 12', 'Carol': 'Mar 4'}
  while True :
    print('Enter a name: (blank to quit)')
    name = input()
    if name == '':
      break
    
    if name in birthdays:
      print(birthdays[name] + ' is the birthday of ' + name)
    else:
      print('I do not have birthday information for ' + name)
      print('What is their birthday?')
      bday = input()
      birthdays[name] = bday
      print('Birthday database updated.')
      print(birthdays)
            
if __name__ == "__main__":
    main()
