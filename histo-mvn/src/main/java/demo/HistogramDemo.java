/* -------------------
 * HistogramDemo1.java
 * -------------------
 * (C) Copyright 2004, 2008, by Object Refinery Limited.
 *
 */

package demo;

import java.io.IOException;
import java.util.ResourceBundle;

import org.jfree.ui.RefineryUtilities;

import demo.model.HistogramDemoModel;
import demo.view.HistogramDemoPanel;

/**
 * A demo of the {@link HistogramDataset} class.
 */
public class HistogramDemo {
    /**
     * The starting point for the demo.
     *
     * @param args  ignored.
     *
     * @throws IOException  if there is a problem saving the file.
     */
    public static void main(String[] args) throws IOException {
        ResourceBundle rb = ResourceBundle.getBundle("ApplicationResources");

        String appname = rb.getString("application.name");
        String version = rb.getString("application.version");

        HistogramDemoPanel demo = new HistogramDemoPanel(
            appname + " (" + version + ")",
            new HistogramDemoModel(), new HistogramDemoModel());
        
        demo.pack();
        RefineryUtilities.centerFrameOnScreen(demo);
        demo.setVisible(true);

    }

}
