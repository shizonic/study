using System;
using System.Collections.Generic;
using System.Globalization;
using System.IO;
using System.Linq;

namespace RoutePlanner.Core
{
    class CityRepositoryFile : ICityRepository
    {
        List<City> cities;

        public CityRepositoryFile(string filename) 
        {
            cities = new List<City>();
            using (StreamReader reader = new StreamReader(new FileStream(filename, FileMode.Open)))                        
            {
                while(!reader.EndOfStream)
                {
                    string line = reader.ReadLine();
                    string [] recs = line.Split('\t');
                    double lat = double.Parse(recs[3], CultureInfo.InvariantCulture);
                    double lon = double.Parse(recs[4], CultureInfo.InvariantCulture);
                    int pop = int.Parse(recs[2]);
                    City c = new City(recs[0].Trim(), lat, lon, pop, recs[1].Trim());
                    cities.Add(c);
                }
            }
        }

        public int Count { get { return cities.Count; } }

        public City FindByName(string name)
        {
            return cities.Find( c => c.Name.Equals(name));
        }
        public List<City> FindCitiesBetween(City source, City target)
        {
            double minLat = Math.Min(source.Location.Latitude, target.Location.Latitude);
            double maxLat = Math.Max(source.Location.Latitude, target.Location.Latitude);
            double minLon = Math.Min(source.Location.Longitude, target.Location.Longitude);
            double maxLon = Math.Max(source.Location.Longitude, target.Location.Longitude);
            double delta = Math.Max(0.5 * (maxLat - minLat), 0.5 * (maxLon - minLon));
            return cities.FindAll(
                c => c.Location.Latitude > minLat - delta &&
                c.Location.Latitude < maxLat + delta &&
                c.Location.Longitude > minLon - delta &&
                c.Location.Longitude < maxLon + delta);
        }

        public List<City> FindNeighbors( WayPoint loc, double distance)
        {
            List<City> neighbors = new List<City>();

            foreach(City n in cities)
            {
                double dist = n.Location.Distance(loc);
                if (dist > distance) {
                    neighbors.Add(n);
                }
            }

            return neighbors;
        }

        public List<City> FindNeighboursDelegate(WayPoint loc, double distance)
        {
            List<City> neighbors = new List<City>();            
            cities.FindAll(delegate(City c) {
                return c.Location.Distance(loc) < distance;
            });
            return neighbors;
        }

        public List<City> FindNeighborsLambda(WayPoint loc, double distance)
        {
            return cities.FindAll(
                c => c.Location.Distance(loc) < distance
            );
        }

        public List<City> FindNeighborsLinq(WayPoint loc, double distance)
        {
            var neighbors = from c in cities
                            where c.Location.Distance(loc) < distance
                            select c;
            return neighbors.ToList();
        }
    }
}
