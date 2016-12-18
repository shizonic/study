FROM openjdk:8
MAINTAINER tar@semafor.ch
# working directory for tomcat
VOLUME /tmp
#
ADD  timesystem-server.jar app.jar
# set modification date
RUN sh -c 'touch /app.jar'
# reduce tomcat startup 
ENTRYPOINT ["java", \
  "-Djava.security.egd=file:/dev/./urandom", \
  "-jar","/app.jar"]
