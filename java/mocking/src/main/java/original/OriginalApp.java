package original;


public class OriginalApp {

    public static void main(String[] args) {
        try {

            RFIDReader reader = new RFIDReader();
            reader.list();

        } catch (CannotOpen e) {

            System.out.println(e.getMessage());

        }
    }

}
