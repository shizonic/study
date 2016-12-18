/* 
 *                       SCRIBBLE PROGRAM 
 *
 * 
 *                      All Rights Reserved.
 *
 * WE DO NOT MAKE ANY REPRESENTATIONS OR WARRANTIES ABOUT THE SUITABILITY
 * OF THE SOFTWARE, EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
 * TO THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
 * PURPOSE, OR NON-INFRINGEMENT. WE SHALL NOT BE LIABLE FOR ANY
 * DAMAGES SUFFERED BY USERS AS A RESULT OF USING, MODIFYING OR
 * DISTRIBUTING THIS SOFTWARE OR ITS DERIVATIVES.
 *
 * Author: Ronald Tanner                   Date: 2005/1/23
 */

package drawing;

import java.awt.Container;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.BoxLayout;
import javax.swing.JApplet;
import javax.swing.JFrame;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;

public class Scribble extends JApplet {
    public Scribble() {
        super();
    }

    private JMenuBar createMenuBar() {
        JMenuBar mb = new JMenuBar();
        JMenu filemenu = new JMenu("File");
        mb.add(filemenu);
        JMenuItem quitmenu = new JMenuItem("Quit");
        quitmenu.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                System.exit(0);
            }
        });
        filemenu.add(quitmenu);
        return mb;
    }

    private void buildUI(Container container) {
        DrawingArea drawingArea = new DrawingArea();
        container.add(drawingArea);
    }

    public void init() {
        buildUI(this);
    }

    public void destroy() {
    }

    public String getAppletInfo() {
        return "A simple drawing program.";
    }

    /**
     * Create the GUI and show it.  For thread safety,
     * this method should be invoked from the
     * event-dispatching thread.
     */
    private static void createAndShowGUI() {
        //Make sure we have nice window decorations.
        JFrame.setDefaultLookAndFeelDecorated(true);

        //Create and set up the window.
        JFrame frame = new JFrame("Scribble");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        //Create and set up the content pane.
        Scribble scribble = new Scribble();
        scribble.buildUI(frame.getContentPane());

        frame.pack();
        frame.setVisible(true);
    }

    public static void main(String[] args) {
        //Schedule a job for the event-dispatching thread:
        //creating and showing this application's GUI.
        javax.swing.SwingUtilities.invokeLater(new Runnable() {
            public void run() {
                createAndShowGUI();
            }
        });
    }
}


