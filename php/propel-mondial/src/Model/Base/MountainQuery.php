<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Mountain as ChildMountain;
use Model\MountainQuery as ChildMountainQuery;
use Model\Map\MountainTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Mountain' table.
 *
 *
 *
 * @method     ChildMountainQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildMountainQuery orderByMountains($order = Criteria::ASC) Order by the Mountains column
 * @method     ChildMountainQuery orderByHeight($order = Criteria::ASC) Order by the Height column
 * @method     ChildMountainQuery orderByType($order = Criteria::ASC) Order by the Type column
 * @method     ChildMountainQuery orderByLongitude($order = Criteria::ASC) Order by the Longitude column
 * @method     ChildMountainQuery orderByLatitude($order = Criteria::ASC) Order by the Latitude column
 *
 * @method     ChildMountainQuery groupByName() Group by the Name column
 * @method     ChildMountainQuery groupByMountains() Group by the Mountains column
 * @method     ChildMountainQuery groupByHeight() Group by the Height column
 * @method     ChildMountainQuery groupByType() Group by the Type column
 * @method     ChildMountainQuery groupByLongitude() Group by the Longitude column
 * @method     ChildMountainQuery groupByLatitude() Group by the Latitude column
 *
 * @method     ChildMountainQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMountainQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMountainQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMountainQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMountainQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMountainQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMountain findOne(ConnectionInterface $con = null) Return the first ChildMountain matching the query
 * @method     ChildMountain findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMountain matching the query, or a new ChildMountain object populated from the query conditions when no match is found
 *
 * @method     ChildMountain findOneByName(string $Name) Return the first ChildMountain filtered by the Name column
 * @method     ChildMountain findOneByMountains(string $Mountains) Return the first ChildMountain filtered by the Mountains column
 * @method     ChildMountain findOneByHeight(double $Height) Return the first ChildMountain filtered by the Height column
 * @method     ChildMountain findOneByType(string $Type) Return the first ChildMountain filtered by the Type column
 * @method     ChildMountain findOneByLongitude(double $Longitude) Return the first ChildMountain filtered by the Longitude column
 * @method     ChildMountain findOneByLatitude(double $Latitude) Return the first ChildMountain filtered by the Latitude column *

 * @method     ChildMountain requirePk($key, ConnectionInterface $con = null) Return the ChildMountain by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMountain requireOne(ConnectionInterface $con = null) Return the first ChildMountain matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMountain requireOneByName(string $Name) Return the first ChildMountain filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMountain requireOneByMountains(string $Mountains) Return the first ChildMountain filtered by the Mountains column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMountain requireOneByHeight(double $Height) Return the first ChildMountain filtered by the Height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMountain requireOneByType(string $Type) Return the first ChildMountain filtered by the Type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMountain requireOneByLongitude(double $Longitude) Return the first ChildMountain filtered by the Longitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMountain requireOneByLatitude(double $Latitude) Return the first ChildMountain filtered by the Latitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMountain[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMountain objects based on current ModelCriteria
 * @method     ChildMountain[]|ObjectCollection findByName(string $Name) Return ChildMountain objects filtered by the Name column
 * @method     ChildMountain[]|ObjectCollection findByMountains(string $Mountains) Return ChildMountain objects filtered by the Mountains column
 * @method     ChildMountain[]|ObjectCollection findByHeight(double $Height) Return ChildMountain objects filtered by the Height column
 * @method     ChildMountain[]|ObjectCollection findByType(string $Type) Return ChildMountain objects filtered by the Type column
 * @method     ChildMountain[]|ObjectCollection findByLongitude(double $Longitude) Return ChildMountain objects filtered by the Longitude column
 * @method     ChildMountain[]|ObjectCollection findByLatitude(double $Latitude) Return ChildMountain objects filtered by the Latitude column
 * @method     ChildMountain[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MountainQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\MountainQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Mountain', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMountainQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMountainQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMountainQuery) {
            return $criteria;
        }
        $query = new ChildMountainQuery();
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
     * @return ChildMountain|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MountainTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MountainTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMountain A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Name, Mountains, Height, Type, Longitude, Latitude FROM Mountain WHERE Name = :p0';
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
            /** @var ChildMountain $obj */
            $obj = new ChildMountain();
            $obj->hydrate($row);
            MountainTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMountain|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMountainQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MountainTableMap::COL_NAME, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMountainQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MountainTableMap::COL_NAME, $keys, Criteria::IN);
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
     * @return $this|ChildMountainQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MountainTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the Mountains column
     *
     * Example usage:
     * <code>
     * $query->filterByMountains('fooValue');   // WHERE Mountains = 'fooValue'
     * $query->filterByMountains('%fooValue%', Criteria::LIKE); // WHERE Mountains LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mountains The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMountainQuery The current query, for fluid interface
     */
    public function filterByMountains($mountains = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mountains)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MountainTableMap::COL_MOUNTAINS, $mountains, $comparison);
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
     * @return $this|ChildMountainQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (is_array($height)) {
            $useMinMax = false;
            if (isset($height['min'])) {
                $this->addUsingAlias(MountainTableMap::COL_HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($height['max'])) {
                $this->addUsingAlias(MountainTableMap::COL_HEIGHT, $height['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MountainTableMap::COL_HEIGHT, $height, $comparison);
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
     * @return $this|ChildMountainQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MountainTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildMountainQuery The current query, for fluid interface
     */
    public function filterByLongitude($longitude = null, $comparison = null)
    {
        if (is_array($longitude)) {
            $useMinMax = false;
            if (isset($longitude['min'])) {
                $this->addUsingAlias(MountainTableMap::COL_LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($longitude['max'])) {
                $this->addUsingAlias(MountainTableMap::COL_LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MountainTableMap::COL_LONGITUDE, $longitude, $comparison);
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
     * @return $this|ChildMountainQuery The current query, for fluid interface
     */
    public function filterByLatitude($latitude = null, $comparison = null)
    {
        if (is_array($latitude)) {
            $useMinMax = false;
            if (isset($latitude['min'])) {
                $this->addUsingAlias(MountainTableMap::COL_LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($latitude['max'])) {
                $this->addUsingAlias(MountainTableMap::COL_LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MountainTableMap::COL_LATITUDE, $latitude, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMountain $mountain Object to remove from the list of results
     *
     * @return $this|ChildMountainQuery The current query, for fluid interface
     */
    public function prune($mountain = null)
    {
        if ($mountain) {
            $this->addUsingAlias(MountainTableMap::COL_NAME, $mountain->getName(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Mountain table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MountainTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MountainTableMap::clearInstancePool();
            MountainTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MountainTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MountainTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MountainTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MountainTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MountainQuery
