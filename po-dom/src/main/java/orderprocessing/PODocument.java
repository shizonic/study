package orderprocessing;

import java.io.File;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;

import org.w3c.dom.Attr;
import org.w3c.dom.Document;
import org.w3c.dom.NamedNodeMap;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;

public class PODocument {
    private Document document;

    public PODocument(Document d) {
        this.document = d;
    }

    public void printAttributes(Node n) {
        NamedNodeMap attrs = n.getAttributes();
        for (int i = 0; i < attrs.getLength(); i++) {
            Attr a = (Attr) attrs.item(i);
            System.out.println("\tAttribute-Name: " + a.getName()
                    + " Value: " + a.getValue());
        }
    }

    public void printChildNodes(Node node) {
        NodeList children = node.getChildNodes();
        for (int i = 0; i < children.getLength(); i++) {
            printNode(children.item(i));
        }
    }

    public void printNode(Node node) {
        if (node == null)
            return;

        int type = node.getNodeType();
        switch (type) {

            case Node.DOCUMENT_NODE:
                printChildNodes(node);
                break;

            case Node.ELEMENT_NODE:
                System.out.println("Element: " + node.getNodeName());
                printAttributes(node);
                printChildNodes(node);
                break;

            case Node.TEXT_NODE:
                System.out.println("  Text : " + node.getNodeName());
                System.out.println("       : " + node.getNodeValue());
                break;
        }
    }

    public void printTree() {
        printNode(document);
    }

    public double getTotal() {
        Double total = 0.0;
        NodeList nodes = document.getElementsByTagName("po.price");
        for (int i = 0; i < nodes.getLength(); i++) {
            Node node = nodes.item(i);
            total += new Double(node.getNodeValue());
        }
        return total;
    }

    public static void main(String argv[]) throws Exception {
        DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
        DocumentBuilder builder = factory.newDocumentBuilder();
        PODocument p = new PODocument(builder.parse(new File(argv[0])));
        //p.printTree();
        System.out.println(p.getTotal());
    }
}

