namespace RoutePlanner.Core
{
    class Link
    {
        public enum TransportModeEnum { Ship, Rail, Flight, Road, Bus, Tram }
        public City FromCity { get; private set; }
        public City ToCity { get; private set; }

        public double Distance { get; private set; }
        public TransportModeEnum TransportMode { get; private set; }

        public Link(City from, City to, TransportModeEnum t = TransportModeEnum.Rail)
        {
            FromCity = from;
            ToCity = to;
            Distance = from.Location.Distance(to.Location);
            TransportMode = t;
        }

        public override string ToString()
        {
            return string.Format("{0,-20} -- {1,-20} {2,10:0.0}", FromCity.Name, ToCity.Name, Distance);
        }
    }
        
}
