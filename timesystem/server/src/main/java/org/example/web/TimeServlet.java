package org.example.web;

import java.io.IOException;
import java.net.InetAddress;
import java.time.ZonedDateTime;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class TimeServlet extends javax.servlet.http.HttpServlet {
	private static final long serialVersionUID = 1L;

	public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
		response.setContentType("text/plain");
		java.io.PrintWriter out = response.getWriter();
		String host = InetAddress.getLocalHost().getCanonicalHostName();
		String ipaddr = InetAddress.getLocalHost().getHostAddress();
		ZonedDateTime now = ZonedDateTime.now();
		out.println(host + ":" + ipaddr +":" + now.toString() + ":" + request.getRemoteAddr());
	}

}
