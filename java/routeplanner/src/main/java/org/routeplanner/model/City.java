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
package org.routeplanner.model;

public class City implements Comparable<City>{
	public int id;
	public int index; // temporary field for FloydWarshall algorithm
	public String name;
	public Double latitude;
	public Double longitude;
	public String country;

	public City(){
	  this.id=-1;
	}
	public City(String name, String country, double lat, double lon) {
	  this.id=-1;
	  this.name=name;
    this.country=country;
    this.latitude=lat;
    this.longitude=lon;
  }

  public boolean equals(Object obj){
		if(this == obj)
			return true;
		if((obj == null) || (obj.getClass() != this.getClass()))
			return false;
		City c = (City)obj;
		return c.id == this.id;
	}
	
	public int hashCode(){
		int hash = 7;
		hash = 31 * hash + id;
		return hash;

	}

	@Override
	public int compareTo(City to) {
		return this.name.compareTo(to.name);
	}

	@Override
	public String toString(){
	  return this.name;
	}
	
}
