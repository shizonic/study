import urllib

sock = urllib.urlopen("http://python.org")
page = sock.read()
sock.close()


startpos = 0

while True:

    startpos = page.find("<a ", startpos)

    if startpos == -1:
        break

    endpos = page.find("</a>", startpos)

    if endpos == -1:
        print "Schliessendes <a>-Tag nicht gefunden"
        break

    print page[startpos:endpos+4]

    startpos += 1

