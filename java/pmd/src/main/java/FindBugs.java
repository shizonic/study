
public class FindBugs {

    public static void main(String[] args) {

        int x = 3;

        // http://findbugs.sourceforge.net/bugDescriptions.html#UCF_USELESS_CONTROL_FLOW

        // Self assignment of local variable
        x = x;

        // Double assignment of local variable
        x = x = 17;

        // Method concatenates strings using + in a loop
        String s = "";
        for (int i = 0; i < args.length; ++i) {
            s = s + args[i];
        }

        // Useless control flow
        if (args.length == 0) {
        }

        // Useless control flow to next line
        if (args.length == 1);
        System.out.println("Count " + args.length);

        // Print where we are
        System.out.print("FindBugs::main()");

    }

}
