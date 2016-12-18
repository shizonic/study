package orderprocessing;

import java.io.File;

import javax.xml.parsers.SAXParser;
import javax.xml.parsers.SAXParserFactory;

import org.xml.sax.Attributes;
import org.xml.sax.helpers.DefaultHandler;

class POHandler extends DefaultHandler {

    StringBuffer buf = null;

    private Double priceTotal = 0.0;

    public Double getPriceTotal() {
        return this.priceTotal;
    }

    public void startElement(String uri, String name, String qName, Attributes attrs) {
        if ("po:price".equals(qName)) {
            this.buf = new StringBuffer();
        }
    }

    public void endElement(String uri, String name, String qName) {
        if (this.buf != null) {
            this.priceTotal += new Double(this.buf.toString());
            this.buf = null;
        }
    }

    public void characters(char ch[], int start, int length) {
        if (this.buf != null) { // po:price detected
            for (int i = start; i < start + length; i++) {
                this.buf.append(ch[i]);
            }
        }
    }

    public static void main(String args[]) throws Exception {
        SAXParserFactory factory = SAXParserFactory.newInstance();
        SAXParser saxParser = factory.newSAXParser();
        POHandler handler = new POHandler();

        // Parse each file provided on the command line.
        for (int i = 0; i < args.length; i++) {
            saxParser.parse(new File(args[i]), handler);
        }

        System.out.println(handler.getPriceTotal());
    }

}
