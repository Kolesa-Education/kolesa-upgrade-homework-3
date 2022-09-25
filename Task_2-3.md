## Ping -a command to check the connection between computers or a server

### when running the ping google.com command:
 - the number of bytes sent,
 - Outputs information about the IP address to which we want to test a connection,
 - icmp_seq sequence number
 - icmp_seq ttl(time to live) number of intermediate devices
 - time spent on response,
after the command is finished, the information about the packets sent/delivered/returned is printed

### The curl utility is used to talk to servers, retrieving or delivering data via different protocols and methods 

> By running the command `curl -I https://kolesa.kz/` we send a GET request to the specified url,
> the -I option means we only want to get the response Header
### The data we get:
- HTTP version and response status (HTTP/2 200 - successful)
- server hosting (nginx)
- date request time
- content-type of the format of the response
- installed cookies with lifetime and additional information

