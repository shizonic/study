
public class App {

    public static void main(String[] args) {
        double a = 4.0;
        double b = 9.0;
        double sum = getSum(a, b);
        System.out.printf("Sum of %s and %s is %s", a, b, sum);
    }

    public static double getSum(double a, double b) {
        Math math = new Math(a, b);
        return math.sum();
    }

}
