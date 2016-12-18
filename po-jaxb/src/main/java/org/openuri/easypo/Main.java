package org.openuri.easypo;

import java.io.File;
import java.util.Iterator;
import java.util.List;

import javax.xml.bind.JAXBContext;
import javax.xml.bind.JAXBException;
import javax.xml.bind.Unmarshaller;

public class Main {
    
    // This sample application demonstrates how to unmarshal an instance
    // document into a Java content tree and access data contained within it.
    
    public static void main( String[] args ) {
        try {
            // create a JAXBContext capable of handling classes generated into
            // this package
            JAXBContext jc = JAXBContext.newInstance( "org.openuri.easypo" );
            
            // create an Unmarshaller
            Unmarshaller u = jc.createUnmarshaller();
            for( int i=0; i<args.length; i++ ){
            // unmarshal a po instance document into a tree of Java content
            // objects composed of classes from this  package.
            PurchaseOrder po = (PurchaseOrder)u.unmarshal(new File(args[i]));
	    
            // examine some of the content in the PurchaseOrder
            System.out.println( "Ship the following items to: " );
            
            // display the shipping address
            Customer customer = po.getCustomer();
            displayCustomer( customer );
            
            // display the items
            List items = po.getLineItem();
            displayItems( items );
            }
        } catch( JAXBException je ) {
            je.printStackTrace();
        }
    }
    
    public static void displayCustomer( Customer cust ) {
        System.out.println( "\t" + cust.getName() );
        System.out.println( "\t" + cust.getAddress() + "\n"); 
    }
    
    public static void displayItems( List items ) {
        for( Iterator iter = items.iterator(); iter.hasNext(); ) {
            LineItem item = (LineItem)iter.next(); 
            System.out.println( "\t" + item.getQuantity() +
                                " copies of \"" + item.getDescription() +
                                "\"" ); 
        }
    }
}
