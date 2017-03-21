package org.routeplanner.dao;

import org.junit.Assert;
import org.junit.Before;
import org.junit.Test;
import org.routeplanner.model.City;

public class RouteDaoTest {
  RouteDao routeDao;
  City [] cities = {
      new City( "City0", "Country0", 1.0, 1.0),
      new City( "City1", "Country0", 1.0, 2.0),
      new City( "City2", "Country1", 4.0, 4.0)
  };
  
  @Before
  public void setUp() {
    routeDao = new RouteDao();
    for( City c: cities){
      routeDao.saveCity(c);
    }
  }

  @Test
  public void findCity() {
    String name = " City1 ";
    City city = routeDao.findCity(name);
    Assert.assertEquals(cities[1].id, city.id);
  }
  
  @Test
  public void findCitiesOfCountry() {
    String name = "Country0";
    City []expected = {cities[0], cities[1]};
    City []actual = routeDao.findCities(name);
    Assert.assertArrayEquals(expected, actual);
  }

  @Test
  public void findCountries(){
    String []countries={ "Country0", "Country1"};
    Assert.assertArrayEquals(countries, routeDao.findCountries());
  }

  @Test
  public void findCitiesBetween() {
    City []expected = {cities[2], cities[1], cities[0]};
    City []actual = routeDao.findCities(cities[0], cities[2]);
    Assert.assertArrayEquals(expected, actual);
  }

}
