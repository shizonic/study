namespace RoutePlanner.Core
{
    class Link
    {
        public enum TransportModeEnum { Ship, Rail, Flight }
        public City fromCity { get; private set; }
        public City toCity { get; private set; }

        public double Distance { get; private set; }
        public TransportModeEnum TransportMode { get; private set; }

        public Link(City from, City to, TransportModeEnum t)
        {
            fromCity = from;
            toCity = to;
            Distance = from.Location.Distance(to.Location);
            TransportMode = t;
        }

        public override string ToString()
        {
            return string.Format("{0,-20} -- {1,-20} {2,10:0.0}", fromCity.Name, toCity.Name, Distance);
        }
    }
        
}
