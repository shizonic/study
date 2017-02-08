using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;

namespace RoutePlanner.Core
{
    class LinkRepositoryFile : ILinkRepository
    {
        List<Link> links;

        public LinkRepositoryFile(string filename, ICityRepository cityRepository) 
        {
            links = new List<Link>();
            using (StreamReader reader = new StreamReader(new FileStream(filename, FileMode.Open)))            
            {
                while(!reader.EndOfStream)
                {
                    string line = reader.ReadLine();
                    string [] recs = line.Split('\t');
                    try {
                        City from = cityRepository.FindByName(recs[0].Trim());
                        City to = cityRepository.FindByName(recs[0].Trim());
                        links.Add(new Link(from, to, Link.TransportModeEnum.Rail));
                    } catch {
                        Console.WriteLine("Conversion ERROR {0}", line);
                    }
                }
            }
        }

        public int Count { get { return links.Count; } }

        public Link FindLink(City u, City n, Link.TransportModeEnum tmode)
        {
            return links.Find(l => l.FromCity.Equals(u) &&
            l.ToCity.Equals(n) ||
            l.ToCity.Equals(u) &&
            l.FromCity.Equals(n));
            
        }
        public IEnumerable<City> FindNeighbors(City u, Link.TransportModeEnum tmode)
        {
            return (from l in links
                   where l.FromCity.Equals(u)
                   select l.ToCity).Union(
                    from l in links
                    where l.ToCity.Equals(u)
                    select l.FromCity).ToList();
        } 
        
    }
}
