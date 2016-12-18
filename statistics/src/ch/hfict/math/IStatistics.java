package ch.hfict.math;

import java.io.BufferedReader;
import java.io.IOException;

public interface IStatistics {

    int read(BufferedReader r) throws NumberFormatException, IOException;

    int readIm(BufferedReader r) throws NumberFormatException, IOException;

    void addNumber(double n);

    double getAverage();

    void clear();

}