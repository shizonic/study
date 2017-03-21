package org.routeplanner.service.impl;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

import org.routeplanner.model.City;
import org.routeplanner.model.Link;

public class RouteManagerFloydWarshall extends RouteManagerDijkstra{
	
	/**
	 * Floyd-Warshall algorithm for determining the shortest path between 
	 * two nodes in a graph.
	 * <p>
	 * http://algowiki.net/wiki/index.php?title=Floyd-Warshall%27s_algorithm
	 */

	    private double [][] D;
	    private City[][] P;


	    public RouteManagerFloydWarshall ( )  {
	    	super();
	    }
	    /**
	     * On small computers the practical maximum graph size with a 4-byte Node is 
	     * about 23,000, at which point the data size of an instance begins to exceed 4 GB. 
	     * 
	     * @param cities Array of City; must be completely populated
	     * @param links Array of Link, completely populated; order is not important
	     */
	  	private void setup(City[] cities, Link[] links) {
	        final int maxNodes = 23000;  // roughly 4 GB 
	        assert cities.length < maxNodes : "nodes.length cannot exceed "+ maxNodes
	            +".\nSize of class data structures is at least (2*(node size)*nodes.length**2).";
	        
	        D = initializeWeight(cities, links);
	        P = new City[cities.length][cities.length];

	        for( int k=0; k<cities.length; k++ )  {
	            for( int i=0; i<cities.length; i++ )  {
	                for( int j=0; j<cities.length; j++ )  {
	                    if( D[i][k] != Double.MAX_VALUE 
	                     && D[k][j] != Double.MAX_VALUE 
	                     && D[i][k]+D[k][j] < D[i][j] )
	                    {
	                        D[i][j] = D[i][k]+D[k][j];
	                        P[i][j] = cities[k];
	                    }
	                }
	            }
	        }

	    }

	    /**
	     * Determines the length of the shortest path from City source 
	     * to City target, calculated by summing the weights of the links 
	     * traversed.
	     * <p>
	     * Note that distance, like path, is not commutative.  That is, 
	     * distance(A,B) is not necessarily equal to distance(B,A).
	     * 
	     * @param source Start City
	     * @param target End City
	     * @return The path length as the sum of the weights of the edges traversed, 
	     * or <code>Integer.MAX_VALUE</code> if there is no path
	     */
	    public double getShortestDistance ( final City source, final City target )  {
	        return D[source.index][target.index];
	    }

	    /**
	     * Describes the shortest path from City source to City target 
	     * by returning a collection of the links between cities traversed, in the order traversed. 
	     * If there is no such path an empty collection is returned.
	     * <p>
	     * Note that because each Link applies only to one direction of traverse,  
	     * the path from A to B may not be the same as the path from B to A. 
	     * 
	     * @param source Start city
	     * @param target End city
	     * @return A List (ordered Collection) of City, possibly empty
	     */
	    public Link[] findShortestPath ( final String source, final String target )  {
	  		City[] cities = findCitiesBetween(source, target);
	  		if( cities == null || cities.length<1)
	  			return new Link[0];
	  		Link [] links = findAllLinks(cities);
	  		if( links == null || links.length<1)
	  			return new Link[0];
	  		
	  		setup(cities,links);

	  		City sourceCity = findCity( source, cities );
	  		City targetCity = findCity( target, cities );
	    	if(D[sourceCity.index][targetCity.index] == Double.MAX_VALUE){
	            return new Link[0]; // no path
	    	}
	    	final List<City> path = getIntermediatePath( sourceCity, targetCity );
	    	
	    	// must construct route from path
	    	Link [] route = new Link[path.size()+1];
	    	route[0] = createLink(sourceCity, path.get(0) );
	    	for( int i=0; i<path.size()-1; i++){
	    		route[i+1]=createLink(path.get(i), path.get(i+1), null);
	      }
	    	route[path.size()] = createLink(path.get(path.size()-1), targetCity );
	    	return route;
	    }

			private List<City> getIntermediatePath ( final City source, final City target )  {
	        if(P[source.index][target.index] == null)  {
	            return new ArrayList<City>();
	        }
	        final List<City> path = new ArrayList<City>();
	        path.addAll( getIntermediatePath(source, P[source.index][target.index]));
	        path.add( P[source.index][target.index]);
	        path.addAll( getIntermediatePath(P[source.index][target.index], target));
	        return path;
	    }

	    private double[][] initializeWeight ( final City[] cities, final Link[] links )  {
	        double[][] Weight = new double[cities.length][cities.length];
	        for(int i=0; i<cities.length; i++)  {
	            Arrays.fill( Weight[i], Double.MAX_VALUE );
	        }
	        for( Link e : links )  {
            Weight[e.from().index][e.to().index] = e.weight();
            Weight[e.to().index][e.from().index] = e.weight();
	        }
	        return Weight;
	    }
	}

