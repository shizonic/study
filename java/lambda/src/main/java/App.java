import java.util.*;

public class App {

    public static void main(String[] args) {

        collection_vector();
        collection_map();
        collection_arraylist();
        collection_stack();
    }

    private static void collection_vector()
    {
        System.out.println("Collection > Vector");

        Vector<Double> numbers = new Vector<Double>();

        numbers.add(10.0);
        numbers.add(12.2);
        numbers.add(14.4);
        numbers.add(16.6);
        numbers.add(18.8);
        numbers.add(20.0);
        numbers.add(22.2);
        numbers.add(24.4);

        Double sum = 0.0;

        // for-Schleife
        for (int i=0; i<numbers.size(); i++) {
            sum += numbers.get(i);
        }
        System.out.printf("Summe = %f\n", sum);

        // Iterator
        sum = 0.0;
        Iterator<Double> iter = numbers.iterator();
        while (iter.hasNext()) {
            sum += iter.next();
        }
        System.out.printf("Summe = %f\n", sum);

        // Erweiterte For-Schleife
        sum = 0.0;
        for (Double d : numbers) {
            sum += d;
        }
        System.out.printf("Summe = %f\n", sum);
    }

    private static void collection_map()
    {
        System.out.println("\nCollection > Map");

        Map<String, String> countries = new HashMap<String, String>();
        countries.put("CH", "Schweiz");
        countries.put("DE", "Deutschland");
        countries.put("AT", "Österreich");

        System.out.printf("Name = %s\n", countries.get("CH"));

        for (Map.Entry<String, String> country : countries.entrySet()) {
            System.out.printf("%s = %s\n", country.getKey(), country.getValue());
        }

    }

    private static void collection_arraylist()
    {
        System.out.println("\nCollection > ArrayList");

        ArrayList<Double> list = new ArrayList<Double>();

        list.add(1.1);
        list.add(2.2);
        list.add(3.3);
        list.add(4.4);
        list.add(5.5);
        list.add(6.6);
        list.add(7.7);
        list.add(8.8);
        list.add(9.9);

        Double sum = 0.0;

        // for-Schleife
        for (int i=0; i<list.size(); i++) {
            sum += list.get(i);
        }
        System.out.printf("Summe = %f\n", sum);

        // Iterator
        sum = 0.0;
        Iterator<Double> iter = list.iterator();
        while (iter.hasNext()) {
            sum += iter.next();
        }
        System.out.printf("Summe = %f\n", sum);

        // Erweiterte For-Schleife
        sum = 0.0;
        for (Double d : list) {
            sum += d;
        }
        System.out.printf("Summe = %f\n", sum);
    }

    private static void collection_stack()
    {
        System.out.println("\nCollection > Stack");

        Stack<String> stack = new Stack<String>();
        stack.push("Schweiz");
        stack.push("Deutschland");
        stack.push("Österreich");
        stack.push("Liechtenstein");

        while (!stack.empty()) {
            System.out.printf("%s\n", stack.pop());
        }

    }

}
