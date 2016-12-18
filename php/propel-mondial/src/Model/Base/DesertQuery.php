<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Desert as ChildDesert;
use Model\DesertQuery as ChildDesertQuery;
use Model\Map\DesertTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Desert' table.
 *
 *
 *
 * @method     ChildDesertQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildDesertQuery orderByArea($order = Criteria::ASC) Order by the Area column
 * @method     ChildDesertQuery orderByLongitude($order = Criteria::ASC) Order by the Longitude column
 * @method     ChildDesertQuery orderByLatitude($order = Criteria::ASC) Order by the Latitude column
 *
 * @method     ChildDesertQuery groupByName() Group by the Name column
 * @method     ChildDesertQuery groupByArea() Group by the Area column
 * @method     ChildDesertQuery groupByLongitude() Group by the Longitude column
 * @method     ChildDesertQuery groupByLatitude() Group by the Latitude column
 *
 * @method     ChildDesertQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDesertQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDesertQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDesertQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDesertQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDesertQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDesert findOne(ConnectionInterface $con = null) Return the first ChildDesert matching the query
 * @method     ChildDesert findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDesert matching the query, or a new ChildDesert object populated from the query conditions when no match is found
 *
 * @method     ChildDesert findOneByName(string $Name) Return the first ChildDesert filtered by the Name column
 * @method     ChildDesert findOneByArea(double $Area) Return the first ChildDesert filtered by the Area column
 * @method     ChildDesert findOneByLongitude(double $Longitude) Return the first ChildDesert filtered by the Longitude column
 * @method     ChildDesert findOneByLatitude(double $Latitude) Return the first ChildDesert filtered by the Latitude column *

 * @method     ChildDesert requirePk($key, ConnectionInterface $con = null) Return the ChildDesert by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDesert requireOne(ConnectionInterface $con = null) Return the first ChildDesert matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDesert requireOneByName(string $Name) Return the first ChildDesert filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDesert requireOneByArea(double $Area) Return the first ChildDesert filtered by the Area column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDesert requireOneByLongitude(double $Longitude) Return the first ChildDesert filtered by the Longitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDesert requireOneByLatitude(double $Latitude) Return the first ChildDesert filtered by the Latitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDesert[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDesert objects based on current ModelCriteria
 * @method     ChildDesert[]|ObjectCollection findByName(string $Name) Return ChildDesert objects filtered by the Name column
 * @method     ChildDesert[]|ObjectCollection findByArea(double $Area) Return ChildDesert objects filtered by the Area column
 * @method     ChildDesert[]|ObjectCollection findByLongitude(double $Longitude) Return ChildDesert objects filtered by the Longitude column
 * @method     ChildDesert[]|ObjectCollection findByLatitude(double $Latitude) Return ChildDesert objects filtered by the Latitude column
 * @method     ChildDesert[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DesertQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\DesertQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Desert', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDesertQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDesertQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDesertQuery) {
            return $criteria;
        }
        $query = new ChildDesertQuery();
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
     * @return ChildDesert|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DesertTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DesertTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDesert A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Name, Area, Longitude, Latitude FROM Desert WHERE Name = :p0';
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
            /** @var ChildDesert $obj */
            $obj = new ChildDesert();
            $obj->hydrate($row);
            DesertTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDesert|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDesertQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DesertTableMap::COL_NAME, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDesertQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DesertTableMap::COL_NAME, $keys, Criteria::IN);
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
     * @return $this|ChildDesertQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DesertTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildDesertQuery The current query, for fluid interface
     */
    public function filterByArea($area = null, $comparison = null)
    {
        if (is_array($area)) {
            $useMinMax = false;
            if (isset($area['min'])) {
                $this->addUsingAlias(DesertTableMap::COL_AREA, $area['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($area['max'])) {
                $this->addUsingAlias(DesertTableMap::COL_AREA, $area['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DesertTableMap::COL_AREA, $area, $comparison);
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
     * @return $this|ChildDesertQuery The current query, for fluid interface
     */
    public function filterByLongitude($longitude = null, $comparison = null)
    {
        if (is_array($longitude)) {
            $useMinMax = false;
            if (isset($longitude['min'])) {
                $this->addUsingAlias(DesertTableMap::COL_LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($longitude['max'])) {
                $this->addUsingAlias(DesertTableMap::COL_LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DesertTableMap::COL_LONGITUDE, $longitude, $comparison);
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
     * @return $this|ChildDesertQuery The current query, for fluid interface
     */
    public function filterByLatitude($latitude = null, $comparison = null)
    {
        if (is_array($latitude)) {
            $useMinMax = false;
            if (isset($latitude['min'])) {
                $this->addUsingAlias(DesertTableMap::COL_LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($latitude['max'])) {
                $this->addUsingAlias(DesertTableMap::COL_LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DesertTableMap::COL_LATITUDE, $latitude, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDesert $desert Object to remove from the list of results
     *
     * @return $this|ChildDesertQuery The current query, for fluid interface
     */
    public function prune($desert = null)
    {
        if ($desert) {
            $this->addUsingAlias(DesertTableMap::COL_NAME, $desert->getName(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Desert table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DesertTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DesertTableMap::clearInstancePool();
            DesertTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DesertTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DesertTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DesertTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DesertTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DesertQuery
