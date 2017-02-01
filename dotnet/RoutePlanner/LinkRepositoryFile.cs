using System;
using System.Collections.Generic;
using System.IO;

namespace RoutePlanner.Core
{
    class LinkRepositoryFile
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
        
    }
}
