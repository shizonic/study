
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
                Population = pop;
                Country = country;                
            }

        // override object.Equals
        public override bool Equals(object obj)
        {
            //       
            // See the full list of guidelines at
            //   http://go.microsoft.com/fwlink/?LinkID=85237  
            // and also the guidance for operator== at
            //   http://go.microsoft.com/fwlink/?LinkId=85238
            //
            if (obj == null || GetType() != obj.GetType())
            {
                return false;
            }
            City other = (City)obj;
            return other.Name.Equals(Name);
           
        }
        // override object.GetHashCode
        public override int GetHashCode()
        {
            int hash = 13;
            hash = (hash * 7) + Name.GetHashCode();
            return hash;
        }            
    }

}
