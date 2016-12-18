<?php

namespace Model\Base;

use \Exception;
use Model\Islandin as ChildIslandin;
use Model\IslandinQuery as ChildIslandinQuery;
use Model\Map\IslandinTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'islandIn' table.
 *
 *
 *
 * @method     ChildIslandinQuery orderByIsland($order = Criteria::ASC) Order by the Island column
 * @method     ChildIslandinQuery orderBySea($order = Criteria::ASC) Order by the Sea column
 * @method     ChildIslandinQuery orderByLake($order = Criteria::ASC) Order by the Lake column
 * @method     ChildIslandinQuery orderByRiver($order = Criteria::ASC) Order by the River column
 *
 * @method     ChildIslandinQuery groupByIsland() Group by the Island column
 * @method     ChildIslandinQuery groupBySea() Group by the Sea column
 * @method     ChildIslandinQuery groupByLake() Group by the Lake column
 * @method     ChildIslandinQuery groupByRiver() Group by the River column
 *
 * @method     ChildIslandinQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildIslandinQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildIslandinQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildIslandinQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildIslandinQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildIslandinQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildIslandin findOne(ConnectionInterface $con = null) Return the first ChildIslandin matching the query
 * @method     ChildIslandin findOneOrCreate(ConnectionInterface $con = null) Return the first ChildIslandin matching the query, or a new ChildIslandin object populated from the query conditions when no match is found
 *
 * @method     ChildIslandin findOneByIsland(string $Island) Return the first ChildIslandin filtered by the Island column
 * @method     ChildIslandin findOneBySea(string $Sea) Return the first ChildIslandin filtered by the Sea column
 * @method     ChildIslandin findOneByLake(string $Lake) Return the first ChildIslandin filtered by the Lake column
 * @method     ChildIslandin findOneByRiver(string $River) Return the first ChildIslandin filtered by the River column *

 * @method     ChildIslandin requirePk($key, ConnectionInterface $con = null) Return the ChildIslandin by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIslandin requireOne(ConnectionInterface $con = null) Return the first ChildIslandin matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIslandin requireOneByIsland(string $Island) Return the first ChildIslandin filtered by the Island column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIslandin requireOneBySea(string $Sea) Return the first ChildIslandin filtered by the Sea column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIslandin requireOneByLake(string $Lake) Return the first ChildIslandin filtered by the Lake column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIslandin requireOneByRiver(string $River) Return the first ChildIslandin filtered by the River column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIslandin[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildIslandin objects based on current ModelCriteria
 * @method     ChildIslandin[]|ObjectCollection findByIsland(string $Island) Return ChildIslandin objects filtered by the Island column
 * @method     ChildIslandin[]|ObjectCollection findBySea(string $Sea) Return ChildIslandin objects filtered by the Sea column
 * @method     ChildIslandin[]|ObjectCollection findByLake(string $Lake) Return ChildIslandin objects filtered by the Lake column
 * @method     ChildIslandin[]|ObjectCollection findByRiver(string $River) Return ChildIslandin objects filtered by the River column
 * @method     ChildIslandin[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class IslandinQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\IslandinQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Islandin', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildIslandinQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildIslandinQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildIslandinQuery) {
            return $criteria;
        }
        $query = new ChildIslandinQuery();
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
     * @return ChildIslandin|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Islandin object has no primary key');
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
        throw new LogicException('The Islandin object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildIslandinQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Islandin object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildIslandinQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Islandin object has no primary key');
    }

    /**
     * Filter the query on the Island column
     *
     * Example usage:
     * <code>
     * $query->filterByIsland('fooValue');   // WHERE Island = 'fooValue'
     * $query->filterByIsland('%fooValue%', Criteria::LIKE); // WHERE Island LIKE '%fooValue%'
     * </code>
     *
     * @param     string $island The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIslandinQuery The current query, for fluid interface
     */
    public function filterByIsland($island = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($island)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IslandinTableMap::COL_ISLAND, $island, $comparison);
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
     * @return $this|ChildIslandinQuery The current query, for fluid interface
     */
    public function filterBySea($sea = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sea)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IslandinTableMap::COL_SEA, $sea, $comparison);
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
     * @return $this|ChildIslandinQuery The current query, for fluid interface
     */
    public function filterByLake($lake = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lake)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IslandinTableMap::COL_LAKE, $lake, $comparison);
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
     * @return $this|ChildIslandinQuery The current query, for fluid interface
     */
    public function filterByRiver($river = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($river)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IslandinTableMap::COL_RIVER, $river, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildIslandin $islandin Object to remove from the list of results
     *
     * @return $this|ChildIslandinQuery The current query, for fluid interface
     */
    public function prune($islandin = null)
    {
        if ($islandin) {
            throw new LogicException('Islandin object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the islandIn table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IslandinTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            IslandinTableMap::clearInstancePool();
            IslandinTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(IslandinTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(IslandinTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            IslandinTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            IslandinTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // IslandinQuery
