using RoutePlanner.Core;
using System;

namespace RoutePlanner
{
    class Program
    {
        static void KeepMeInformed(City from, City to)
        {
            if (from != null && to != null) {
                Console.WriteLine("Search {0} -> {1}", from.Name, to.Name);
            } else {
                Console.WriteLine("Going to nowhere?");
            }
        }

        static void KeepMeInformedToo(City from, City to)
        {
            if (from != null && to != null) {
                Console.WriteLine("Search {0} => {1}", from.Name, to.Name);
            } else {
                Console.WriteLine("Yes, going to nowhere.");
            }
        }

        static void Main(string[] args)
        {
            WayPoint pratteln = new WayPoint("Pratteln", 47.5167, 7.6833);
            WayPoint bern = new WayPoint("Bern", 46.95, 7.44);

            Console.WriteLine(
                "Distanz von {0} nach {1}: {2}km",
                bern.Name, pratteln.Name, bern.Distance(pratteln)
            );

            City cbern = new City("Bern", bern.Latitude, bern.Longitude, 160788, "Schweiz");

            ICityRepository cityRepository = new CityRepositoryFile("Resources/cities.txt");
            Console.WriteLine("Total " + cityRepository.Count + " cities");
            Console.WriteLine("Neighbors of " + pratteln.Name + ":");
            foreach(City n in cityRepository.FindNeighbors(pratteln, 60.0))
            {
                Console.WriteLine(n.Name);
            }
            Console.ReadKey();

            LinkRepositoryFile linkRepository = new LinkRepositoryFile("Resources/routes.txt", cityRepository);
            Console.WriteLine("Anzahl Verbindungen " + linkRepository.Count);

            RouteManager rmgr = new RouteManager(cityRepository, linkRepository);

            // Delegates...
            rmgr.notifiers += KeepMeInformed; // statisch
            rmgr.notifiers += KeepMeInformedToo; // statisch

            // Nicht möglich, siehe RouteManager.cs Delegates
            // rmgr.notifiers(null, null);

            Link[] route = rmgr.FindShortestRouteBetween("Basel", "Berlin", Link.TransportModeEnum.Rail);
            foreach(Link l in route)
            {
                Console.WriteLine(l);
            }
            
        }

    }

}
