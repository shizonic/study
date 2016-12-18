/* 
 *                       Document class
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
import java.awt.Graphics;
import java.awt.Point;
import java.util.ArrayList;
import java.util.Iterator;

/**
 */
public class Document {
    ArrayList<Stroke> strokes = null;
    Stroke stroke;
    Color color;

    Document() {
        strokes = new ArrayList<Stroke>();
        color = Color.blue;
    }

    public void setColor(Color c) {
        color = c;
    }

    public Stroke newStroke() {
        stroke = new Stroke(color);
        strokes.add(stroke);
        return stroke;
    }

    public void draw(Graphics g) {
        Iterator<Stroke> i = strokes.iterator();
        while (i.hasNext()) {
            Stroke s = i.next();
            s.draw(g);
        }
    }

    public void addPoint(Point p) {
        stroke.add(p);
    }
}
