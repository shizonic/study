package stopwatch.view;

import java.awt.BorderLayout;

import java.awt.Dimension;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.*;

import stopwatch.controller.Controller;

/**
 * A simple application with 2 buttons and a digital display
 * to measure time intervals and lap times.
 *
 * (NOTE: The implementation is incomplete)
 *
 * @author Ronald Tanner, SEMAFOR Informatik & Energie AG
 */
public class MainDialog implements Runnable, ActionListener {
    private JLabel label;
    private Controller controller;

    private JButton button1 = null;
    private JButton button2 = null;
    private boolean updateDisplay = true;

    public enum EventType {Button1, Button2}

    ;

    public void setController(Controller controller) {
        this.controller = controller;
    }

    /**
     * creates all required UI components
     */
    private void create() {
        JFrame frame = new JFrame("Stop Watch");
        frame.setDefaultCloseOperation(
                JFrame.EXIT_ON_CLOSE);

        label = new JLabel("00:00:00");
        label.setHorizontalAlignment(SwingConstants.CENTER);
        label.setFont(new Font("SansSerif", Font.BOLD, 20));
        frame.getContentPane().add(label, BorderLayout.CENTER);

        // Instantiate buttons:
        button1 = new JButton();
        button2 = new JButton();

        // Configure buttons:
        button1.setText("Start");
        button2.setText("Reset");

        // Configure size of buttons
        button1.setPreferredSize(new Dimension(120, 22));
        button2.setPreferredSize(new Dimension(120, 22));

        // set action listener
        button1.addActionListener(this);
        button2.addActionListener(this);

        JPanel buttonPanel = new JPanel();
        buttonPanel.add(button1);
        buttonPanel.add(button2);
        frame.getContentPane().add(buttonPanel, BorderLayout.PAGE_END);

        //Display the window.
        frame.pack();
        frame.setVisible(true);
    }

    /**
     * updates the display
     */
    public void updateDisplay(String elapsedTime) {
        if (updateDisplay) {
            label.setText(elapsedTime);
        }
    }

    public void run() {
        create();
    }

    public void actionPerformed(ActionEvent evt) {
        JButton b = (JButton) evt.getSource();
        if (b.equals(this.button1)) {
            controller.processEvent(EventType.Button1);
        } else if (b.equals(this.button2)) {
            controller.processEvent(EventType.Button2);
        }
    }

    public void setButton1Text(String text) {
        button1.setText(text);
    }

    public void setButton2Text(String text) {
        button2.setText(text);
    }

    /**
     * stops the display
     */
    public void stopUpdate() {
        this.updateDisplay = false;
    }

    /**
     * reactivates the display
     */
    public void startUpdate() {
        this.updateDisplay = true;
    }

}
