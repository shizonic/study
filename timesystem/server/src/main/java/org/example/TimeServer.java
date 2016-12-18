package org.example;

import org.example.web.TimeServlet;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.web.servlet.ServletRegistrationBean;
import org.springframework.context.annotation.Bean;

@SpringBootApplication // same as @Configuration @EnableAutoConfiguration
						// @ComponentScan
public class TimeServer {

	@Bean
	public ServletRegistrationBean timeServletRegistrationBean() {
		return new ServletRegistrationBean(
				new TimeServlet(), "/services/*");
	}

	public static void main(String[] args) {
		SpringApplication.run(TimeServer.class, args);
	}
}
