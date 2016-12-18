FROM openjdk:8-jre
MAINTAINER tar@semafor.ch
#
ENV timeserver timeserver
#
ADD  timesystem-client.jar app.jar
# set modification date
RUN sh -c 'touch /app.jar'
# 
ENTRYPOINT ["java","-jar","/app.jar"]
