/*
 *                       Stroke class
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

import java.awt.BasicStroke;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Point;
import java.util.ArrayList;
import java.util.Iterator;

/**
 * Line consisting of points drawn with the mouse pointer.
 */
public class Stroke {
    ArrayList<Point> points;
    Color color;

    public Stroke(Color c) {
        points = new ArrayList<Point>();
        color = c;
    }

    /**
     * adds a point to the stroke
     *
     * @param p point to be added
     */
    public void add(Point p) {
        points.add(p);
    }

    /**
     * draws the stroke
     *
     * @param g graphics object
     */
    public void draw(Graphics g) {
        if (points.size() < 1)
            return;

        g.setColor(color);
        Iterator<Point> i = points.iterator();
        Graphics2D g2d = (Graphics2D) g;

        Point p1 = i.next();
        while (i.hasNext()) {
            Point p2 = i.next();
            g2d.drawLine(p1.x, p1.y, p2.x, p2.y);
            p1 = p2;
        }
    }
}
