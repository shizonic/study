using System;

namespace RoutePlanner.Core
{
    class WayPoint
    {
        public string Name { get; set; }
        public double Longitude { get; private set; }
        public double Latitude { get; private set; }
        public WayPoint ( string name, double lon, double lat)
        {
            Name = name;
            Longitude = lon;
            Latitude = lat;
        }

        public override string ToString()
        {
            double latmin = (Latitude - (int)Latitude) * 60;
            double lonmin = (Longitude - (int)Longitude) * 60;

            return String.Format(
                "{0} {1}° {2:##}' / {3}° {4:##}'",
                Name, (int)Longitude, lonmin, (int)Latitude, latmin
            );

            /*
            return String.Format(
                "{0} {1:##.##} {2:##.##}", 
                Name, 
                Longitude, 
                Latitude
            );
            */
            // return Name + " " + Longitude + "/" + Latitude;
        }

        public double Distance(WayPoint other)
        {
            double R = 6371.0;
            double phia = Latitude * Math.PI / 180;
            double phib = other.Latitude * Math.PI / 180;
            double lama = Longitude * Math.PI / 180;
            double lamb = other.Longitude * Math.PI / 180;
            return R * Math.Acos(Math.Sin(phia) * Math.Sin(phib) 
                + Math.Cos(phia) * Math.Cos(phib) * Math.Cos(lama - lamb));
        }

    }

}
