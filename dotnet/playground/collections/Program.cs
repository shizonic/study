using System;
using System.Collections;
using System.Collections.Generic;

namespace ConsoleApplication
{
    public class Statistics
    {
        private List<double> numbers;

        public Statistics()
        {
            numbers = new List<double>();
        }

        public int Add(double number)
        {
            numbers.Add(number);
            return numbers.Count;
        }

        public double Avg()
        {
            double sum = 0;
            foreach (double number in numbers) {
                sum += number;
            }
            return sum / numbers.Count;
        }

        public List<double> FindBetween_Delegate(double lower, double upper)
        {
            // "delegate" funktioniert hier wie eine anonyme Funktion
            return numbers.FindAll(
                delegate (double n) {
                    return n > lower && n < upper;
                }
            );
        }

        public List<double> FindBetween_Lambda(double lower, double upper) 
        {
            return numbers.FindAll(
                n => n > lower && n < upper
            );
        }

    }

    public class Program
    {
        public static void PrintList(List<double> list, string message)
        {
            Console.Write(message);
            foreach (double item in list) {
                Console.Write(item + " ");
            }
            Console.Write("\n");
        }

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

            // Numbers
            Console.WriteLine("\nNumbers");

            Statistics stats = new Statistics();
            stats.Add(10.6);
            stats.Add(20.9);
            stats.Add(30.3);
            stats.Add(40.5);
            stats.Add(50.2);
            double avg = stats.Avg();
            Console.WriteLine("Durchschnitt = " + avg);

            List<double> found;
            found = stats.FindBetween_Delegate(20.95, 40.6);
            PrintList(found, "Gefiltert mit Delegate: ");

            found = stats.FindBetween_Lambda(20.95, 40.6);
            PrintList(found, "Gefilter mit Lambda: ");

        }
    }
}
