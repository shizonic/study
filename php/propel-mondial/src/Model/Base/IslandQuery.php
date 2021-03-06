<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Island as ChildIsland;
use Model\IslandQuery as ChildIslandQuery;
use Model\Map\IslandTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Island' table.
 *
 *
 *
 * @method     ChildIslandQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildIslandQuery orderByIslands($order = Criteria::ASC) Order by the Islands column
 * @method     ChildIslandQuery orderByArea($order = Criteria::ASC) Order by the Area column
 * @method     ChildIslandQuery orderByHeight($order = Criteria::ASC) Order by the Height column
 * @method     ChildIslandQuery orderByType($order = Criteria::ASC) Order by the Type column
 * @method     ChildIslandQuery orderByLongitude($order = Criteria::ASC) Order by the Longitude column
 * @method     ChildIslandQuery orderByLatitude($order = Criteria::ASC) Order by the Latitude column
 *
 * @method     ChildIslandQuery groupByName() Group by the Name column
 * @method     ChildIslandQuery groupByIslands() Group by the Islands column
 * @method     ChildIslandQuery groupByArea() Group by the Area column
 * @method     ChildIslandQuery groupByHeight() Group by the Height column
 * @method     ChildIslandQuery groupByType() Group by the Type column
 * @method     ChildIslandQuery groupByLongitude() Group by the Longitude column
 * @method     ChildIslandQuery groupByLatitude() Group by the Latitude column
 *
 * @method     ChildIslandQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildIslandQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildIslandQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildIslandQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildIslandQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildIslandQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildIsland findOne(ConnectionInterface $con = null) Return the first ChildIsland matching the query
 * @method     ChildIsland findOneOrCreate(ConnectionInterface $con = null) Return the first ChildIsland matching the query, or a new ChildIsland object populated from the query conditions when no match is found
 *
 * @method     ChildIsland findOneByName(string $Name) Return the first ChildIsland filtered by the Name column
 * @method     ChildIsland findOneByIslands(string $Islands) Return the first ChildIsland filtered by the Islands column
 * @method     ChildIsland findOneByArea(double $Area) Return the first ChildIsland filtered by the Area column
 * @method     ChildIsland findOneByHeight(double $Height) Return the first ChildIsland filtered by the Height column
 * @method     ChildIsland findOneByType(string $Type) Return the first ChildIsland filtered by the Type column
 * @method     ChildIsland findOneByLongitude(double $Longitude) Return the first ChildIsland filtered by the Longitude column
 * @method     ChildIsland findOneByLatitude(double $Latitude) Return the first ChildIsland filtered by the Latitude column *

 * @method     ChildIsland requirePk($key, ConnectionInterface $con = null) Return the ChildIsland by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIsland requireOne(ConnectionInterface $con = null) Return the first ChildIsland matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIsland requireOneByName(string $Name) Return the first ChildIsland filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIsland requireOneByIslands(string $Islands) Return the first ChildIsland filtered by the Islands column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIsland requireOneByArea(double $Area) Return the first ChildIsland filtered by the Area column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIsland requireOneByHeight(double $Height) Return the first ChildIsland filtered by the Height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIsland requireOneByType(string $Type) Return the first ChildIsland filtered by the Type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIsland requireOneByLongitude(double $Longitude) Return the first ChildIsland filtered by the Longitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIsland requireOneByLatitude(double $Latitude) Return the first ChildIsland filtered by the Latitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIsland[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildIsland objects based on current ModelCriteria
 * @method     ChildIsland[]|ObjectCollection findByName(string $Name) Return ChildIsland objects filtered by the Name column
 * @method     ChildIsland[]|ObjectCollection findByIslands(string $Islands) Return ChildIsland objects filtered by the Islands column
 * @method     ChildIsland[]|ObjectCollection findByArea(double $Area) Return ChildIsland objects filtered by the Area column
 * @method     ChildIsland[]|ObjectCollection findByHeight(double $Height) Return ChildIsland objects filtered by the Height column
 * @method     ChildIsland[]|ObjectCollection findByType(string $Type) Return ChildIsland objects filtered by the Type column
 * @method     ChildIsland[]|ObjectCollection findByLongitude(double $Longitude) Return ChildIsland objects filtered by the Longitude column
 * @method     ChildIsland[]|ObjectCollection findByLatitude(double $Latitude) Return ChildIsland objects filtered by the Latitude column
 * @method     ChildIsland[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class IslandQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\IslandQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Island', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildIslandQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildIslandQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildIslandQuery) {
            return $criteria;
        }
        $query = new ChildIslandQuery();
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
     * @return ChildIsland|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(IslandTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = IslandTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildIsland A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Name, Islands, Area, Height, Type, Longitude, Latitude FROM Island WHERE Name = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildIsland $obj */
            $obj = new ChildIsland();
            $obj->hydrate($row);
            IslandTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildIsland|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildIslandQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(IslandTableMap::COL_NAME, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildIslandQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(IslandTableMap::COL_NAME, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE Name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE Name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIslandQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IslandTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the Islands column
     *
     * Example usage:
     * <code>
     * $query->filterByIslands('fooValue');   // WHERE Islands = 'fooValue'
     * $query->filterByIslands('%fooValue%', Criteria::LIKE); // WHERE Islands LIKE '%fooValue%'
     * </code>
     *
     * @param     string $islands The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIslandQuery The current query, for fluid interface
     */
    public function filterByIslands($islands = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($islands)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IslandTableMap::COL_ISLANDS, $islands, $comparison);
    }

    /**
     * Filter the query on the Area column
     *
     * Example usage:
     * <code>
     * $query->filterByArea(1234); // WHERE Area = 1234
     * $query->filterByArea(array(12, 34)); // WHERE Area IN (12, 34)
     * $query->filterByArea(array('min' => 12)); // WHERE Area > 12
     * </code>
     *
     * @param     mixed $area The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIslandQuery The current query, for fluid interface
     */
    public function filterByArea($area = null, $comparison = null)
    {
        if (is_array($area)) {
            $useMinMax = false;
            if (isset($area['min'])) {
                $this->addUsingAlias(IslandTableMap::COL_AREA, $area['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($area['max'])) {
                $this->addUsingAlias(IslandTableMap::COL_AREA, $area['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IslandTableMap::COL_AREA, $area, $comparison);
    }

    /**
     * Filter the query on the Height column
     *
     * Example usage:
     * <code>
     * $query->filterByHeight(1234); // WHERE Height = 1234
     * $query->filterByHeight(array(12, 34)); // WHERE Height IN (12, 34)
     * $query->filterByHeight(array('min' => 12)); // WHERE Height > 12
     * </code>
     *
     * @param     mixed $height The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIslandQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (is_array($height)) {
            $useMinMax = false;
            if (isset($height['min'])) {
                $this->addUsingAlias(IslandTableMap::COL_HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($height['max'])) {
                $this->addUsingAlias(IslandTableMap::COL_HEIGHT, $height['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IslandTableMap::COL_HEIGHT, $height, $comparison);
    }

    /**
     * Filter the query on the Type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE Type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE Type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIslandQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IslandTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the Longitude column
     *
     * Example usage:
     * <code>
     * $query->filterByLongitude(1234); // WHERE Longitude = 1234
     * $query->filterByLongitude(array(12, 34)); // WHERE Longitude IN (12, 34)
     * $query->filterByLongitude(array('min' => 12)); // WHERE Longitude > 12
     * </code>
     *
     * @param     mixed $longitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIslandQuery The current query, for fluid interface
     */
    public function filterByLongitude($longitude = null, $comparison = null)
    {
        if (is_array($longitude)) {
            $useMinMax = false;
            if (isset($longitude['min'])) {
                $this->addUsingAlias(IslandTableMap::COL_LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($longitude['max'])) {
                $this->addUsingAlias(IslandTableMap::COL_LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IslandTableMap::COL_LONGITUDE, $longitude, $comparison);
    }

    /**
     * Filter the query on the Latitude column
     *
     * Example usage:
     * <code>
     * $query->filterByLatitude(1234); // WHERE Latitude = 1234
     * $query->filterByLatitude(array(12, 34)); // WHERE Latitude IN (12, 34)
     * $query->filterByLatitude(array('min' => 12)); // WHERE Latitude > 12
     * </code>
     *
     * @param     mixed $latitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIslandQuery The current query, for fluid interface
     */
    public function filterByLatitude($latitude = null, $comparison = null)
    {
        if (is_array($latitude)) {
            $useMinMax = false;
            if (isset($latitude['min'])) {
                $this->addUsingAlias(IslandTableMap::COL_LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($latitude['max'])) {
                $this->addUsingAlias(IslandTableMap::COL_LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IslandTableMap::COL_LATITUDE, $latitude, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildIsland $island Object to remove from the list of results
     *
     * @return $this|ChildIslandQuery The current query, for fluid interface
     */
    public function prune($island = null)
    {
        if ($island) {
            $this->addUsingAlias(IslandTableMap::COL_NAME, $island->getName(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Island table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IslandTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            IslandTableMap::clearInstancePool();
            IslandTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(IslandTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(IslandTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            IslandTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            IslandTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // IslandQuery
