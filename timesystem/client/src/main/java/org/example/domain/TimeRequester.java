package org.example.domain;

import java.io.IOException;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.ResponseHandler;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.CloseableHttpClient;
import org.apache.http.impl.client.HttpClients;
import org.apache.http.util.EntityUtils;

public class TimeRequester {
	CloseableHttpClient httpclient = HttpClients.createDefault();
	HttpGet httpget;
	ResponseHandler<String> responseHandler;

	public TimeRequester(String timeserver) {
		httpget = new HttpGet("http://"+timeserver+":8080/services/time");
		// Create a custom response handler
		responseHandler = new ResponseHandler<String>() {
			@Override
			public String handleResponse(final HttpResponse response) 
					throws ClientProtocolException, IOException {
				int status = response.getStatusLine().getStatusCode();
				if (status >= 200 && status < 300) {
					HttpEntity entity = response.getEntity();
					return entity != null ? EntityUtils.toString(entity) : null;
				} else {
					throw new ClientProtocolException("Unexpected response status: " + status);
				}
			}

		};
	}

	public String getResponse() throws ClientProtocolException, IOException {
		return httpclient.execute(httpget, responseHandler);
	}

}
