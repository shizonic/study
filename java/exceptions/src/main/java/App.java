
public class App {

    public static void main(String[] args) {

        // simple try catch
        try {
            int size = Helper.getSize(0);
        } catch (IllegalArgumentException e) {
            System.out.println("Exception catched!");
            System.out.println(e.getMessage());
        }

        // try catch with finally
        try {
            int size = Helper.getSize(-23);
        } catch (IllegalArgumentException e) {
            System.out.println("\nException catched!");
            System.out.println(e.getMessage());
        } finally {
            System.out.println("finally");
        }

        // Exception
        try {
        Helper.getChar(12);
        } catch (IllegalArgumentException e) {
            System.out.println(e.getStackTrace() + "\n");
        }

        // try catch within loop
        for (int i=1; i<256; i++) {
            try {
                char chr = Helper.getChar(i);
                System.out.printf("%d = %s\n", i, chr);
            } catch (IllegalArgumentException e) {
                System.out.printf("%d = invalid\n", i);
            }
        }

        System.out.println("\nFinished");

    }

}
