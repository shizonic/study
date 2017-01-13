
alphabet = {
    "A": "Alpha",
    "B": "Bravo",
    "C": "Charlie",
    "D": "Delta",
    "E": "Echo",
    "G": "Golf",
    "H": "Hotel",
    "I": "India",
    "J": "Juliet",
    "K": "Kilo",
    "L": "Lima",
    "M": "Mike",
    "N": "November",
    "O": "Oscar",
    "P": "Papa",
    "Q": "Quebec",
    "R": "Romeo",
    "S": "Sierra",
    "T": "Tango",
    "U": "Uniform",
    "V": "Victor",
    "W": "Whiskey",
    "X": "Xray",
    "Y": "Yankee",
    "Z": "Zulu",
    "F": "Foxtrot"
}

string = "Monthy Python 123!"

for initial in list(string):

    initial = initial.strip().upper()

    if not initial:
        continue

    if initial in alphabet:

        print("%s = %s" % (initial, alphabet[initial]))

    else:

        print("%s = %s" % (initial, "?"))
