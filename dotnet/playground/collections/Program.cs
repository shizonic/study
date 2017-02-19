using System;
using System.Collections;
using System.Collections.Generic;

namespace ConsoleApplication
{
    public class Program
    {
        public static void Main(string[] args)
        {
            // "Generische" Liste
            Console.WriteLine("Generische Collection-List (int)");
            List<int> list = new List<int>();
            list.Add(11);
            list.Add(22);
            list.Add(33);

            int sum = 0;

            foreach (int i in list) sum += i;

            Console.WriteLine("Summe = " + sum);

            // Array - List
            // -> funktioniert nicht !?!
            // ArrayList arrayList = new ArrayList();            
            // See: http://stackoverflow.com/questions/5011149/need-hashtable-and-arraylist            

            /*
            The non-generic collections, including ArrayList and HashTable, are not included in Silverlight.
            These classes are hold-overs from .Net 1.0 (which didn't have generics) and should not be used in new code.

            Instead, you should use the generic collections—List<T> and Dictionary<TKey, TValue>.
            */
            Console.WriteLine("\nCollection-List (string)");

            List<string> stringList = new List<string>();
            stringList.Add("Basel");
            stringList.Add("Bern");
            stringList.Add("Luzern");
            stringList.Add("St. Gallen");
            stringList.Add("Zürich");

            foreach (string city in stringList) {
                Console.WriteLine(city);
            }

            // Dictionary<TKey, TValue>
            Console.WriteLine("\nDictionary");            
            Dictionary<string, string> users = new Dictionary<string, string>();
            users.Add("john@doe.com", "John Doe");
            users.Add("henry@miller.com", "Henry Miller");

            // with KeyValuePair
            foreach(KeyValuePair<string, string> user in users) {
                Console.WriteLine(user.Key + " = " + user.Value);                
            }
            // with var
            foreach(var user in users) {
                Console.WriteLine(user.Key + " = " + user.Value);                
            }   
            // keys only         
            foreach (var email in users.Keys) {
                Console.WriteLine(email);
            }
            // values only
            foreach (var name in users.Values) {
                Console.WriteLine(name);
            }

            // HashSet
            Console.WriteLine("\nHashSet");
            HashSet<string> set = new HashSet<string>();
            set.Add("Thomas");
            set.Add("Andreas");
            set.Add("Markus");
            set.Add("Eveline");
            set.Add("Sonja");
            set.Add("Ursula");
            set.Add("Marlene");

            foreach(string s in set) {
                Console.Write(s + " ");
            }
            Console.Write("\n");



        }
    }
}
