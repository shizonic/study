
public class Test {

    public static int main(String[] args) {

        double a = 4.0;
        double b = 9.0;

        Math math = new Math(a, b);

        double sum = math.sum();

        System.out.printf("Sum of %s and %s is %s", a, b, sum);

        return 0;
    }
}
