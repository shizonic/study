ipaddr = '192.168.10.33'

print((192 << 24) + (168 << 16) + (10 << 8) + 33)
print(sum([(n << 8 * i) for i, n
           in enumerate(reversed([int(n)
                                  for n in ipaddr.split('.')]))]))
