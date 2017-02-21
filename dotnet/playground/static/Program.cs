using System;

// Siehe Musterloesungen HE_11 Fragen_Prüfung3
namespace ConsoleApplication
{

    public class Program
    {
        private static Settings defaultInstance = new Settings();

        class Settings {
            public static Settings Default {
                get { return defaultInstance; }
            }
            public int MaximumWeight {
                get { return 99; }
            }
        }

        public static void Main(string[] args)
        {
            // Aufgabe: Maximum-Wert der Klasse Settings 
            // ausgeben, ohne den Konstruktor anzuwenden.
            int maxWeight = Settings.Default.MaximumWeight;
            Console.WriteLine("MaximumWeight = {0}", maxWeight);
        }
    }
}
