using System.Collections.Generic;

namespace RoutePlanner.Core
{
    interface ICityRepository
    {
        int Count { get; }
        List<City> FindNeighbors(WayPoint loc, double distance);
        City FindByName(string name);
        List<City> FindCitiesBetween(City source, City target);        
    }
}