import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.BindException;
import java.net.ServerSocket;
import java.net.Socket;
import java.net.SocketException;


public class EchoServer {
    public static void main(String[] args) {

        try {

            ServerSocket serverSocket = null;
            serverSocket = new ServerSocket(9001);

            Socket clientSocket = null;
            while (serverSocket != null) {
                clientSocket = serverSocket.accept();

                PrintWriter out = new PrintWriter(clientSocket.getOutputStream(),
                        true);
                BufferedReader in = new BufferedReader(new InputStreamReader(
                        clientSocket.getInputStream()));
                String inputLine, outputLine;

                while ((inputLine = in.readLine()) != null) {
                    outputLine = inputLine;
                    out.println(outputLine);
                }
                out.close();
                in.close();
                clientSocket.close();
            }

            serverSocket.close();

        } catch (BindException e) {

            // Catched errors:
            // - Permission denied (port number below 1024)
            // - Address already in use
            System.out.println(e.getMessage());
            e.printStackTrace();

        } catch (SocketException e) {

            // Catched errors:
            // - Socket is not bound yet (port number empty)
            System.out.println(e.getMessage());
            e.printStackTrace();

        } catch (IOException e) {

            // Catched errors:
            // - all others
            e.printStackTrace();

        } catch (IllegalArgumentException e) {

            // Catched errors:
            // - Port value out of range
            System.out.println(e.getMessage());
            e.printStackTrace();

        }
    }
}
