<?php

namespace Model\Base;

use \Exception;
use Model\Located as ChildLocated;
use Model\LocatedQuery as ChildLocatedQuery;
use Model\Map\LocatedTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'located' table.
 *
 *
 *
 * @method     ChildLocatedQuery orderByCity($order = Criteria::ASC) Order by the City column
 * @method     ChildLocatedQuery orderByProvince($order = Criteria::ASC) Order by the Province column
 * @method     ChildLocatedQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ChildLocatedQuery orderByRiver($order = Criteria::ASC) Order by the River column
 * @method     ChildLocatedQuery orderByLake($order = Criteria::ASC) Order by the Lake column
 * @method     ChildLocatedQuery orderBySea($order = Criteria::ASC) Order by the Sea column
 *
 * @method     ChildLocatedQuery groupByCity() Group by the City column
 * @method     ChildLocatedQuery groupByProvince() Group by the Province column
 * @method     ChildLocatedQuery groupByCountry() Group by the Country column
 * @method     ChildLocatedQuery groupByRiver() Group by the River column
 * @method     ChildLocatedQuery groupByLake() Group by the Lake column
 * @method     ChildLocatedQuery groupBySea() Group by the Sea column
 *
 * @method     ChildLocatedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLocatedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLocatedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLocatedQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLocatedQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLocatedQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLocated findOne(ConnectionInterface $con = null) Return the first ChildLocated matching the query
 * @method     ChildLocated findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLocated matching the query, or a new ChildLocated object populated from the query conditions when no match is found
 *
 * @method     ChildLocated findOneByCity(string $City) Return the first ChildLocated filtered by the City column
 * @method     ChildLocated findOneByProvince(string $Province) Return the first ChildLocated filtered by the Province column
 * @method     ChildLocated findOneByCountry(string $Country) Return the first ChildLocated filtered by the Country column
 * @method     ChildLocated findOneByRiver(string $River) Return the first ChildLocated filtered by the River column
 * @method     ChildLocated findOneByLake(string $Lake) Return the first ChildLocated filtered by the Lake column
 * @method     ChildLocated findOneBySea(string $Sea) Return the first ChildLocated filtered by the Sea column *

 * @method     ChildLocated requirePk($key, ConnectionInterface $con = null) Return the ChildLocated by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLocated requireOne(ConnectionInterface $con = null) Return the first ChildLocated matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLocated requireOneByCity(string $City) Return the first ChildLocated filtered by the City column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLocated requireOneByProvince(string $Province) Return the first ChildLocated filtered by the Province column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLocated requireOneByCountry(string $Country) Return the first ChildLocated filtered by the Country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLocated requireOneByRiver(string $River) Return the first ChildLocated filtered by the River column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLocated requireOneByLake(string $Lake) Return the first ChildLocated filtered by the Lake column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLocated requireOneBySea(string $Sea) Return the first ChildLocated filtered by the Sea column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLocated[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLocated objects based on current ModelCriteria
 * @method     ChildLocated[]|ObjectCollection findByCity(string $City) Return ChildLocated objects filtered by the City column
 * @method     ChildLocated[]|ObjectCollection findByProvince(string $Province) Return ChildLocated objects filtered by the Province column
 * @method     ChildLocated[]|ObjectCollection findByCountry(string $Country) Return ChildLocated objects filtered by the Country column
 * @method     ChildLocated[]|ObjectCollection findByRiver(string $River) Return ChildLocated objects filtered by the River column
 * @method     ChildLocated[]|ObjectCollection findByLake(string $Lake) Return ChildLocated objects filtered by the Lake column
 * @method     ChildLocated[]|ObjectCollection findBySea(string $Sea) Return ChildLocated objects filtered by the Sea column
 * @method     ChildLocated[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LocatedQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\LocatedQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Located', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLocatedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLocatedQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLocatedQuery) {
            return $criteria;
        }
        $query = new ChildLocatedQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildLocated|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Located object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Located object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildLocatedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Located object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLocatedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Located object has no primary key');
    }

    /**
     * Filter the query on the City column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE City = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE City LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLocatedQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LocatedTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the Province column
     *
     * Example usage:
     * <code>
     * $query->filterByProvince('fooValue');   // WHERE Province = 'fooValue'
     * $query->filterByProvince('%fooValue%', Criteria::LIKE); // WHERE Province LIKE '%fooValue%'
     * </code>
     *
     * @param     string $province The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLocatedQuery The current query, for fluid interface
     */
    public function filterByProvince($province = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($province)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LocatedTableMap::COL_PROVINCE, $province, $comparison);
    }

    /**
     * Filter the query on the Country column
     *
     * Example usage:
     * <code>
     * $query->filterByCountry('fooValue');   // WHERE Country = 'fooValue'
     * $query->filterByCountry('%fooValue%', Criteria::LIKE); // WHERE Country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $country The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLocatedQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LocatedTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the River column
     *
     * Example usage:
     * <code>
     * $query->filterByRiver('fooValue');   // WHERE River = 'fooValue'
     * $query->filterByRiver('%fooValue%', Criteria::LIKE); // WHERE River LIKE '%fooValue%'
     * </code>
     *
     * @param     string $river The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLocatedQuery The current query, for fluid interface
     */
    public function filterByRiver($river = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($river)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LocatedTableMap::COL_RIVER, $river, $comparison);
    }

    /**
     * Filter the query on the Lake column
     *
     * Example usage:
     * <code>
     * $query->filterByLake('fooValue');   // WHERE Lake = 'fooValue'
     * $query->filterByLake('%fooValue%', Criteria::LIKE); // WHERE Lake LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lake The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLocatedQuery The current query, for fluid interface
     */
    public function filterByLake($lake = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lake)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LocatedTableMap::COL_LAKE, $lake, $comparison);
    }

    /**
     * Filter the query on the Sea column
     *
     * Example usage:
     * <code>
     * $query->filterBySea('fooValue');   // WHERE Sea = 'fooValue'
     * $query->filterBySea('%fooValue%', Criteria::LIKE); // WHERE Sea LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sea The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLocatedQuery The current query, for fluid interface
     */
    public function filterBySea($sea = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sea)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LocatedTableMap::COL_SEA, $sea, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLocated $located Object to remove from the list of results
     *
     * @return $this|ChildLocatedQuery The current query, for fluid interface
     */
    public function prune($located = null)
    {
        if ($located) {
            throw new LogicException('Located object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the located table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LocatedTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LocatedTableMap::clearInstancePool();
            LocatedTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LocatedTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LocatedTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LocatedTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LocatedTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LocatedQuery
