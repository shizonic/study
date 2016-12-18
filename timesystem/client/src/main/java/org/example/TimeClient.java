package org.example;

import java.io.IOException;

import org.apache.http.client.ClientProtocolException;
import org.example.domain.TimeRequester;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import org.springframework.scheduling.annotation.EnableScheduling;
import org.springframework.scheduling.annotation.Scheduled;

@SpringBootApplication // same as @Configuration @EnableAutoConfiguration
						// @ComponentScan
@EnableScheduling 
public class TimeClient {
	@Value(value = "${timeserver}")
	String timeserver;
	
	@Bean
	TimeRequester timeRequester(){
		return new TimeRequester(timeserver);
    }

	@Autowired
	TimeRequester timeRequester;
	
	@Scheduled(fixedRate=5000)
	public void printTime() {
		try {
			System.out.println(timeRequester.getResponse());
		} catch (ClientProtocolException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	public static void main(String[] args) {
		SpringApplication.run(TimeClient.class, args);
	}
}
