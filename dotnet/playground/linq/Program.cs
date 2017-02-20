using System;
using System.Linq;
using System.Collections.Generic;
using System.Xml.Linq;

namespace ConsoleApplication
{
    public class Program
    {
        public static void printVar(IOrderedEnumerable<string> list)
        {
            foreach (string s in list) {
                Console.WriteLine("{0} ", s);
            }
        }

        public static void Main(string[] args)
        {
            string[] cities = {
                "Bern", "Basel", "Thun", "Chur", "Zürich", 
                "Lugano", "Locarno", "Biel", "Luzern"
            };

            // Query Comprehension-Syntax
            var result1 = from c in cities
                         where c.StartsWith("B") 
                            && (c.Contains("s") || c.Contains("i"))
                            && c.EndsWith("l")
                         orderby c
                         select c;

            printVar(result1);

            // Lambda-Syntax
            var result2 = cities
                .Where(c => c.StartsWith("B") && (c.Contains("s") || c.Contains("i")) && c.EndsWith("l"))
                .OrderBy(c => c);

            printVar(result2);

            // XML
            XElement xelement = XElement.Load("sales.xml");
            var query = 
                from p in xelement.Elements()
                where p.Element("product").Attribute("id").Value == "p1"
                select p.Element("product");

            foreach (var p in query) Console.WriteLine(p.Value + " ");

        }
    }
}
