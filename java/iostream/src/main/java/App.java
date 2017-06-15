import java.io.*;
import java.util.ArrayList;

public class App {

    public static void main(String[] args) {

        ArrayList<String> list = new ArrayList<String>();

        try {

            // input stream
            InputStreamReader isr = new InputStreamReader(System.in);
            BufferedReader br = new BufferedReader(isr);
            System.out.println("Enter one or more lines:");

            String value = "";
            while ((value = br.readLine()) != "") {
                value = value.trim();
                if (value.length() == 0) {
                    break;
                }
                list.add(value);
            }

            // output stream
            OutputStreamWriter osw = new OutputStreamWriter(System.out);
            BufferedWriter bw = new BufferedWriter(osw);

            bw.write("You entered:\n");
            for (String s : list) {
                bw.write(s + "\n");
            }

            bw.close();

            System.out.println("- endH");

        } catch (IOException e) {
            e.printStackTrace();
        }

    }

}
