import subprocess

#print(subprocess.call(['ping', '-c1', 'www.google.com']))

# proc = subprocess.Popen(['ls', '-l'], stdout=subprocess.PIPE)
# for line in proc.stdout:
#     print(line.strip())
# ret_code = proc.wait()
# if ret_code:
#     raise Exception("ret code {}".format(ret_code))

print('invoking cat')
proc = subprocess.Popen(['cat', '-'],
                        stdout=subprocess.PIPE,
                        stdin=subprocess.PIPE)
proc.communicate(b'Hello\n')