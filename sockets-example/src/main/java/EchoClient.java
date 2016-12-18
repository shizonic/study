import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ConnectException;
import java.net.NoRouteToHostException;
import java.net.Socket;


public class EchoClient {
    public static void main(String[] args) {

        try {

            Socket echoSocket = null;
            PrintWriter out = null;
            BufferedReader in = null;

            echoSocket = new Socket("localhost", 9001);
            out = new PrintWriter(echoSocket.getOutputStream(), true);
            in = new BufferedReader(new InputStreamReader(echoSocket
                    .getInputStream()));

            BufferedReader stdIn = new BufferedReader(
                    new InputStreamReader(System.in));

            while (in != null) {
                System.out.print("client> ");
                out.println(stdIn.readLine());
                System.out.println("echo from server: '" + in.readLine() + "'");
            }

            out.close();
            in.close();
            echoSocket.close();

        } catch (ConnectException e) {

            // Catched errors:
            // - Connection refused (wrong port number, no server)
            System.out.println(e.getMessage());
            e.printStackTrace();

        } catch (NoRouteToHostException e) {

            // Catched errors:
            // - Can't assign requested address (port empty)
            System.out.println(e.getMessage());
            e.printStackTrace();

        } catch (IOException e) {

            // Catched errors:
            // - IO exception
            System.out.println(e.getMessage());
            e.printStackTrace();

        } catch (IllegalArgumentException e) {

            // Catched errors:
            // - Port out of range
            System.out.println(e.getMessage());
            e.printStackTrace();

        }
    }
}
