
namespace RoutePlanner.Core
{    
    class City {
            public string Name { get; private set; }
            public string Country { get; private set; }
            public int Population { get; private set; }            
            public WayPoint Location { get; private set; }

            public City(string name, double lat, double lon, int pop, string country) {
                Name = name;
                Location = new WayPoint(name, lat, lon);
            }
    }

}
