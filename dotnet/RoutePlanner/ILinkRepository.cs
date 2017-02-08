using System.Collections.Generic;

namespace RoutePlanner.Core
{
    interface ILinkRepository
    {
        int Count { get; }
        IEnumerable<City> FindNeighbors(City u, Link.TransportModeEnum tmode);
        Link FindLink(City u, City n, Link.TransportModeEnum tmode);        
    }
}
