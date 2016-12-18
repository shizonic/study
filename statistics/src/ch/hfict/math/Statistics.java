package ch.hfict.math;

import java.io.BufferedReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Iterator;

public class Statistics implements IStatistics {
    private ArrayList<Double> numbers = new ArrayList<Double>();

    @Override
    public int read(BufferedReader r) throws NumberFormatException, IOException {
        String line;
        int from = 0, last = 0, count = 0;
        line = r.readLine();
        while (last >= 0) {
            last = line.indexOf(" ", from);
            if (last > 0 || from <= line.length()) {
                if (last < 0) {
                    last = line.length();
                }
                this.numbers.add(new Double(line.substring(from, last)));
                count++;
            }
            from = last + 1;
        }
        return count;
    }

    @Override
    public int readIm(BufferedReader r) throws NumberFormatException, IOException {
        String line = r.readLine();
        String[] args = line.split(" ");
        for (String s : args) {
            numbers.add(new Double(s));
        }
        return args.length;
    }

    @Override
    public void addNumber(double n) {
        numbers.add(n);
    }

    @Override
    public double getAverage() {
        double sum = 0;

        //mit iterator
        Iterator<Double> i = numbers.iterator();
        while (i.hasNext()) {
            sum += i.next();
        }

        //mit erweiterter for-Schleife
        sum = 0;
        for (Double d : numbers) {
            sum += d;
        }

        return sum / numbers.size();
    }

    @Override
    public void clear() {
        this.numbers.clear();
    }
}
