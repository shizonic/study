using System;

namespace ConsoleApplication
{
    public class Fraction {
        public int z, n;
        public Fraction (int z, int n) 
        {
            this.z = z;
            this.n = n;
        }
    }

    public class Person {
        public string Firstname, Lastname;

        public Person (string firstname, string lastname)
        {
            this.Firstname = firstname;
            this.Lastname = lastname;
        }
    }

    // Der Klassenname spielt keine Rolle
    public static class ExtensionMethods
    {
        public static void Add(this Fraction f, int x)
        {
            f.z += x * f.n;
        }
        public static string Fullname(this Person p)
        {
            return p.Firstname + " " + p.Lastname;
        }

        public static string Uppercase(this string s)
        {
            return s.ToUpper();
        }
    }

    public class Program
    {
        public static void Main(string[] args)
        {
            // Fraction
            Fraction f = new Fraction(1, 2);
            f.Add(3);
            Console.WriteLine("{0} -> {1}", f.z, f.n);

            // Person
            Person p = new Person("John", "Doe");
            string fullname = p.Fullname();
            Console.WriteLine("Name = {0}", fullname);

            // String
            string lower = "this is a beautiful string";
            string upper = lower.ToUpper();
            Console.WriteLine("Lower: {0}\nUpper: {1}", lower, upper);
            
        }
    }
}
