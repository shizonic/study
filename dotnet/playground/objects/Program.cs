using System;
using System.Collections;

namespace ConsoleApplication
{
    public class Program
    {
        public static void Main(string[] args)
        {
            // Anonyme Objekte
            var obj = new { 
                Length = 100, 
                Width = 200,
                Height = 300
            };

            Console.WriteLine("Länge = " + obj.Length);
            Console.WriteLine("Breite = " + obj.Width);
            Console.WriteLine("Höhe = " + obj.Height);
            Console.WriteLine(obj);

        }
    }
}
