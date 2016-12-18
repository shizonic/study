/*
 *                       DrawingArea class
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

import java.awt.Color;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Insets;
import java.awt.Point;
import java.awt.event.MouseEvent;

import javax.swing.BorderFactory;
import javax.swing.JComponent;
import javax.swing.event.MouseInputListener;

/**
 */

public class DrawingArea extends JComponent
        implements MouseInputListener {

    private Document document;

    Dimension preferredSize = new Dimension(450, 275);

    public DrawingArea() {
        document = new Document();
        addMouseListener(this);
        addMouseMotionListener(this);
        setBackground(Color.WHITE);
        setOpaque(true);
    }

    public Dimension getPreferredSize() {
        return preferredSize;
    }

    protected void paintComponent(Graphics g) {
        //Paint background if we're opaque.
        if (isOpaque()) {
            g.setColor(getBackground());
            g.fillRect(0, 0, getWidth(), getHeight());
        }
        document.draw(g);
    }

    //Methods required by the MouseInputListener interface.
    public void mouseClicked(MouseEvent e) {
    }

    public void mouseMoved(MouseEvent e) {
        //controller.updateCursorLocation(e.getX(), e.getY());
    }

    public void mouseExited(MouseEvent e) {
    }

    public void mouseReleased(MouseEvent e) {
    }

    public void mouseEntered(MouseEvent e) {
    }

    public void mousePressed(MouseEvent e) {
        document.newStroke();
        document.addPoint(new Point(e.getX(), e.getY()));
    }

    public void mouseDragged(MouseEvent e) {
        document.addPoint(new Point(e.getX(), e.getY()));
        repaint();
    }
}


