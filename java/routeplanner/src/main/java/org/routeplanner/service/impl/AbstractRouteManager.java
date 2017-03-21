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

import org.routeplanner.dao.RouteDao;
import org.routeplanner.model.City;
import org.routeplanner.model.Link;
import org.routeplanner.model.impl.LinkImpl;
import org.routeplanner.service.RouteManager;


public abstract class AbstractRouteManager implements RouteManager {
	private RouteDao routeDao;

	public AbstractRouteManager() {
	}

	/* (non-Javadoc)
	 * @see org.routeplanner.service.RouteManager#setRouteDao(org.routeplanner.dao.RouteDao)
	 */
	public void setRouteDao(RouteDao r) {
		this.routeDao = r;
	}

	/* 
	 * @see org.routeplanner.service.RouteManager#findCitiesBetween(java.lang.String, java.lang.String)
	 */
	protected City[] findCitiesBetween(String fromName, String toName) {
		City from = routeDao.findCity(fromName);
		City to = routeDao.findCity(toName);
		return findCitiesBetween( from, to );
	}
	
	/* (non-Javadoc)
	 * @see org.routeplanner.service.RouteManager#findAllRoutesBetween(org.routeplanner.model.City[])
	 */
	@Override
	public Link[] findAllLinks(City[] cities) {
		return routeDao.findRoutes(cities);
	}
	
	/* (non-Javadoc)
	 * @see org.routeplanner.service.RouteManager#findCity(java.lang.String)
	 */
	@Override
	public City findCity(String name) {
		return routeDao.findCity(name);
	}
	
  protected City findCity(String source, City[] cities) {
		for( int index=0; index<cities.length; index++){
			if( cities[index].name.equals(source))
				return cities[index];
		}
		return null;
	}
  

	/* (non-Javadoc)
	 * @see org.routeplanner.service.RouteManager#findCitiesBetween(org.routeplanner.model.City, org.routeplanner.model.City)
	 */
	@Override
	public City[] findCitiesBetween(City from, City to) {
		return routeDao.findCities(from, to);
	}

	/* (non-Javadoc)
	 * @see org.routeplanner.service.RouteManager#findCities(java.lang.String)
	 */
	@Override
	public City[] findCities(String country) {
		return routeDao.findCities(country);
	}

	/* (non-Javadoc)
	 * @see org.routeplanner.service.RouteManager#findCountries()
	 */
	@Override
	public String[] findCountries() {
		return routeDao.findCountries();
	}

	/* (non-Javadoc)
	 * @see org.routeplanner.service.RouteManager#createLink(org.routeplanner.model.City, org.routeplanner.model.City)
	 */
	@Override
	public Link createLink(City cityFrom, City cityTo) {
		Link link = createLink( cityFrom, cityTo, null );
		routeDao.saveLink( link );
		return link;
	}

	public Link createLink(City cityFrom, City cityTo, Double weight) {
		return new LinkImpl( cityFrom, cityTo, weight );
	}

	/* (non-Javadoc)
	 * @see org.routeplanner.service.RouteManager#createCity(java.lang.String, double, double, java.lang.String)
	 */
	@Override
	public City createCity(String cityName, double cityLat, double cityLon,
			String country) {
		City city = new City();
		city.id=-1;
		city.country = country;
		city.name=cityName;
		city.latitude=cityLat;
		city.longitude=cityLon;
		routeDao.saveCity(city);
		return city;
	}
	
	
}
