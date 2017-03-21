/*
 * Copyright (C) 2011 Ronald Tanner, CH-4123 Allschwil
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 3
 * of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
package org.routeplanner.service.impl;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.LinkedList;
import java.util.List;
import java.util.Map;

import org.routeplanner.dao.RouteDao;
import org.routeplanner.model.City;
import org.routeplanner.model.Link;
import org.routeplanner.model.impl.LinkImpl;
import org.routeplanner.service.RouteManager;


public class RouteManagerDijkstra extends AbstractRouteManager {
	private Link [] links;
	
	public RouteManagerDijkstra() {
		super();
	}
	private List<City> findNeighbors(City c) {
		List<City> neighbors = new ArrayList<City>();
		for (Link r : links) {
			if (c.equals(r.from())) {
				neighbors.add(r.to());
			} else if (c.equals(r.to())) {
				neighbors.add(r.from());
			}
		}
		return neighbors;
	}
	
	private double getDist(City c1, City c2) {
		for (Link r : links) {
			if ((c1.equals(r.from()) && c2.equals(r.to()))
					|| (c2.equals(r.from()) && c1.equals(r.to()))) {
				return r.weight();
			}
		}
		return Double.MAX_VALUE;
	}

	/* (non-Javadoc)
	 * @see org.routeplanner.service.RouteManager#findShortestPath(java.lang.String, java.lang.String)
	 */
	@Override
	public Link [] findShortestPath(String fromName, String toName) {
		City[] cities = findCitiesBetween(fromName, toName);
		if( cities == null || cities.length<1)
			return new Link[0];
		links = findAllLinks( cities );
		if( links == null || links.length<1)
			return new Link[0];

		City source = findCity(fromName);
		City target = findCity(toName);
		List<City> Q = new ArrayList<City>();
		Map<City, Double> dist = new HashMap<City, Double>();
		Map<City, City> previous = new HashMap<City, City>();
		for (City v : cities) {
			dist.put(v, Double.MAX_VALUE);
			previous.put(v, null);
			Q.add(v);
		}
		dist.put(source, 0.);
		while (!Q.isEmpty()) {
			City u = null;
			int i = 0;
			int iu = 0;
			double minDist = Double.MAX_VALUE;
			// find city u with shortest dist
			for (City c : Q) {
				if (dist.get(c) < minDist) {
					iu = i;
					u = c;
					minDist = dist.get(c);
				}
				i++;
			}
			if (u != null) {
				Q.remove(iu);
				for (City n : findNeighbors(u)) {
					double alt = dist.get(u) + getDist(u, n);
					if (!dist.containsKey(n) || alt < dist.get(n)) {
						dist.put(n, alt);
						previous.put(n, u);
					}
				}
			} else {
				break;
			}
		}
		LinkedList<City> citiesOnPath = new LinkedList<City>();
		City u = target;
		while (previous.get(u) != null) {
			citiesOnPath.addFirst(u);
			u = previous.get(u);
		}
		citiesOnPath.addFirst(source);
		// create path from source to target
		City from=null;
		City to=null;
		List<Link> itinerary = new ArrayList<Link>();
		for( City c: citiesOnPath ){
			from=to;
			to=c;
			if( from!=null ){
				itinerary.add( findRoute( from, to, links ));
			}
		}
		return itinerary.toArray(new Link[ itinerary.size()]);
	}

	/**
	 * find link between 2 cities
	 * @param from
	 * @param to
	 * @return route (null if none found)
	 */
	private Link findRoute(City from, City to, Link [] links) {
		for( Link r: links ){
			if( (from.equals(r.from()) && to.equals(r.to()))||
					(to.equals(r.from()) && from.equals(r.to()))){
				return createLink( from, to, r.weight() ); 
			}
		}
		return null;
	}	
	
}
