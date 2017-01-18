using RoutePlanner.Core;
using System;

namespace RoutePlanner
{
    class Program
    {
        static void Main(string[] args)
        {
            WayPoint pratteln = new WayPoint("Pratteln", 7.6833, 47.5167);
            WayPoint bern = new WayPoint("Bern", 7.44, 46.95);

            Console.WriteLine(
                "Distanz von {0} nach {1}: {2}km",
                bern.Name, pratteln.Name, bern.Distance(pratteln)
            );
        }

    }

}
