<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\River as ChildRiver;
use Model\RiverQuery as ChildRiverQuery;
use Model\Map\RiverTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'River' table.
 *
 *
 *
 * @method     ChildRiverQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildRiverQuery orderByRiver($order = Criteria::ASC) Order by the River column
 * @method     ChildRiverQuery orderByLake($order = Criteria::ASC) Order by the Lake column
 * @method     ChildRiverQuery orderBySea($order = Criteria::ASC) Order by the Sea column
 * @method     ChildRiverQuery orderByLength($order = Criteria::ASC) Order by the Length column
 * @method     ChildRiverQuery orderBySourcelongitude($order = Criteria::ASC) Order by the SourceLongitude column
 * @method     ChildRiverQuery orderBySourcelatitude($order = Criteria::ASC) Order by the SourceLatitude column
 * @method     ChildRiverQuery orderByMountains($order = Criteria::ASC) Order by the Mountains column
 * @method     ChildRiverQuery orderBySourcealtitude($order = Criteria::ASC) Order by the SourceAltitude column
 * @method     ChildRiverQuery orderByEstuarylongitude($order = Criteria::ASC) Order by the EstuaryLongitude column
 * @method     ChildRiverQuery orderByEstuarylatitude($order = Criteria::ASC) Order by the EstuaryLatitude column
 *
 * @method     ChildRiverQuery groupByName() Group by the Name column
 * @method     ChildRiverQuery groupByRiver() Group by the River column
 * @method     ChildRiverQuery groupByLake() Group by the Lake column
 * @method     ChildRiverQuery groupBySea() Group by the Sea column
 * @method     ChildRiverQuery groupByLength() Group by the Length column
 * @method     ChildRiverQuery groupBySourcelongitude() Group by the SourceLongitude column
 * @method     ChildRiverQuery groupBySourcelatitude() Group by the SourceLatitude column
 * @method     ChildRiverQuery groupByMountains() Group by the Mountains column
 * @method     ChildRiverQuery groupBySourcealtitude() Group by the SourceAltitude column
 * @method     ChildRiverQuery groupByEstuarylongitude() Group by the EstuaryLongitude column
 * @method     ChildRiverQuery groupByEstuarylatitude() Group by the EstuaryLatitude column
 *
 * @method     ChildRiverQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRiverQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRiverQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRiverQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRiverQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRiverQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRiver findOne(ConnectionInterface $con = null) Return the first ChildRiver matching the query
 * @method     ChildRiver findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRiver matching the query, or a new ChildRiver object populated from the query conditions when no match is found
 *
 * @method     ChildRiver findOneByName(string $Name) Return the first ChildRiver filtered by the Name column
 * @method     ChildRiver findOneByRiver(string $River) Return the first ChildRiver filtered by the River column
 * @method     ChildRiver findOneByLake(string $Lake) Return the first ChildRiver filtered by the Lake column
 * @method     ChildRiver findOneBySea(string $Sea) Return the first ChildRiver filtered by the Sea column
 * @method     ChildRiver findOneByLength(double $Length) Return the first ChildRiver filtered by the Length column
 * @method     ChildRiver findOneBySourcelongitude(double $SourceLongitude) Return the first ChildRiver filtered by the SourceLongitude column
 * @method     ChildRiver findOneBySourcelatitude(double $SourceLatitude) Return the first ChildRiver filtered by the SourceLatitude column
 * @method     ChildRiver findOneByMountains(string $Mountains) Return the first ChildRiver filtered by the Mountains column
 * @method     ChildRiver findOneBySourcealtitude(double $SourceAltitude) Return the first ChildRiver filtered by the SourceAltitude column
 * @method     ChildRiver findOneByEstuarylongitude(double $EstuaryLongitude) Return the first ChildRiver filtered by the EstuaryLongitude column
 * @method     ChildRiver findOneByEstuarylatitude(double $EstuaryLatitude) Return the first ChildRiver filtered by the EstuaryLatitude column *

 * @method     ChildRiver requirePk($key, ConnectionInterface $con = null) Return the ChildRiver by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRiver requireOne(ConnectionInterface $con = null) Return the first ChildRiver matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRiver requireOneByName(string $Name) Return the first ChildRiver filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRiver requireOneByRiver(string $River) Return the first ChildRiver filtered by the River column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRiver requireOneByLake(string $Lake) Return the first ChildRiver filtered by the Lake column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRiver requireOneBySea(string $Sea) Return the first ChildRiver filtered by the Sea column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRiver requireOneByLength(double $Length) Return the first ChildRiver filtered by the Length column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRiver requireOneBySourcelongitude(double $SourceLongitude) Return the first ChildRiver filtered by the SourceLongitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRiver requireOneBySourcelatitude(double $SourceLatitude) Return the first ChildRiver filtered by the SourceLatitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRiver requireOneByMountains(string $Mountains) Return the first ChildRiver filtered by the Mountains column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRiver requireOneBySourcealtitude(double $SourceAltitude) Return the first ChildRiver filtered by the SourceAltitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRiver requireOneByEstuarylongitude(double $EstuaryLongitude) Return the first ChildRiver filtered by the EstuaryLongitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRiver requireOneByEstuarylatitude(double $EstuaryLatitude) Return the first ChildRiver filtered by the EstuaryLatitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRiver[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRiver objects based on current ModelCriteria
 * @method     ChildRiver[]|ObjectCollection findByName(string $Name) Return ChildRiver objects filtered by the Name column
 * @method     ChildRiver[]|ObjectCollection findByRiver(string $River) Return ChildRiver objects filtered by the River column
 * @method     ChildRiver[]|ObjectCollection findByLake(string $Lake) Return ChildRiver objects filtered by the Lake column
 * @method     ChildRiver[]|ObjectCollection findBySea(string $Sea) Return ChildRiver objects filtered by the Sea column
 * @method     ChildRiver[]|ObjectCollection findByLength(double $Length) Return ChildRiver objects filtered by the Length column
 * @method     ChildRiver[]|ObjectCollection findBySourcelongitude(double $SourceLongitude) Return ChildRiver objects filtered by the SourceLongitude column
 * @method     ChildRiver[]|ObjectCollection findBySourcelatitude(double $SourceLatitude) Return ChildRiver objects filtered by the SourceLatitude column
 * @method     ChildRiver[]|ObjectCollection findByMountains(string $Mountains) Return ChildRiver objects filtered by the Mountains column
 * @method     ChildRiver[]|ObjectCollection findBySourcealtitude(double $SourceAltitude) Return ChildRiver objects filtered by the SourceAltitude column
 * @method     ChildRiver[]|ObjectCollection findByEstuarylongitude(double $EstuaryLongitude) Return ChildRiver objects filtered by the EstuaryLongitude column
 * @method     ChildRiver[]|ObjectCollection findByEstuarylatitude(double $EstuaryLatitude) Return ChildRiver objects filtered by the EstuaryLatitude column
 * @method     ChildRiver[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RiverQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\RiverQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\River', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRiverQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRiverQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRiverQuery) {
            return $criteria;
        }
        $query = new ChildRiverQuery();
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
     * @return ChildRiver|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RiverTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = RiverTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildRiver A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Name, River, Lake, Sea, Length, SourceLongitude, SourceLatitude, Mountains, SourceAltitude, EstuaryLongitude, EstuaryLatitude FROM River WHERE Name = :p0';
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
            /** @var ChildRiver $obj */
            $obj = new ChildRiver();
            $obj->hydrate($row);
            RiverTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildRiver|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RiverTableMap::COL_NAME, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RiverTableMap::COL_NAME, $keys, Criteria::IN);
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
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiverTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterByRiver($river = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($river)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiverTableMap::COL_RIVER, $river, $comparison);
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
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterByLake($lake = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lake)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiverTableMap::COL_LAKE, $lake, $comparison);
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
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterBySea($sea = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sea)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiverTableMap::COL_SEA, $sea, $comparison);
    }

    /**
     * Filter the query on the Length column
     *
     * Example usage:
     * <code>
     * $query->filterByLength(1234); // WHERE Length = 1234
     * $query->filterByLength(array(12, 34)); // WHERE Length IN (12, 34)
     * $query->filterByLength(array('min' => 12)); // WHERE Length > 12
     * </code>
     *
     * @param     mixed $length The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterByLength($length = null, $comparison = null)
    {
        if (is_array($length)) {
            $useMinMax = false;
            if (isset($length['min'])) {
                $this->addUsingAlias(RiverTableMap::COL_LENGTH, $length['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($length['max'])) {
                $this->addUsingAlias(RiverTableMap::COL_LENGTH, $length['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiverTableMap::COL_LENGTH, $length, $comparison);
    }

    /**
     * Filter the query on the SourceLongitude column
     *
     * Example usage:
     * <code>
     * $query->filterBySourcelongitude(1234); // WHERE SourceLongitude = 1234
     * $query->filterBySourcelongitude(array(12, 34)); // WHERE SourceLongitude IN (12, 34)
     * $query->filterBySourcelongitude(array('min' => 12)); // WHERE SourceLongitude > 12
     * </code>
     *
     * @param     mixed $sourcelongitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterBySourcelongitude($sourcelongitude = null, $comparison = null)
    {
        if (is_array($sourcelongitude)) {
            $useMinMax = false;
            if (isset($sourcelongitude['min'])) {
                $this->addUsingAlias(RiverTableMap::COL_SOURCELONGITUDE, $sourcelongitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sourcelongitude['max'])) {
                $this->addUsingAlias(RiverTableMap::COL_SOURCELONGITUDE, $sourcelongitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiverTableMap::COL_SOURCELONGITUDE, $sourcelongitude, $comparison);
    }

    /**
     * Filter the query on the SourceLatitude column
     *
     * Example usage:
     * <code>
     * $query->filterBySourcelatitude(1234); // WHERE SourceLatitude = 1234
     * $query->filterBySourcelatitude(array(12, 34)); // WHERE SourceLatitude IN (12, 34)
     * $query->filterBySourcelatitude(array('min' => 12)); // WHERE SourceLatitude > 12
     * </code>
     *
     * @param     mixed $sourcelatitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterBySourcelatitude($sourcelatitude = null, $comparison = null)
    {
        if (is_array($sourcelatitude)) {
            $useMinMax = false;
            if (isset($sourcelatitude['min'])) {
                $this->addUsingAlias(RiverTableMap::COL_SOURCELATITUDE, $sourcelatitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sourcelatitude['max'])) {
                $this->addUsingAlias(RiverTableMap::COL_SOURCELATITUDE, $sourcelatitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiverTableMap::COL_SOURCELATITUDE, $sourcelatitude, $comparison);
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
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterByMountains($mountains = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mountains)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiverTableMap::COL_MOUNTAINS, $mountains, $comparison);
    }

    /**
     * Filter the query on the SourceAltitude column
     *
     * Example usage:
     * <code>
     * $query->filterBySourcealtitude(1234); // WHERE SourceAltitude = 1234
     * $query->filterBySourcealtitude(array(12, 34)); // WHERE SourceAltitude IN (12, 34)
     * $query->filterBySourcealtitude(array('min' => 12)); // WHERE SourceAltitude > 12
     * </code>
     *
     * @param     mixed $sourcealtitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterBySourcealtitude($sourcealtitude = null, $comparison = null)
    {
        if (is_array($sourcealtitude)) {
            $useMinMax = false;
            if (isset($sourcealtitude['min'])) {
                $this->addUsingAlias(RiverTableMap::COL_SOURCEALTITUDE, $sourcealtitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sourcealtitude['max'])) {
                $this->addUsingAlias(RiverTableMap::COL_SOURCEALTITUDE, $sourcealtitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiverTableMap::COL_SOURCEALTITUDE, $sourcealtitude, $comparison);
    }

    /**
     * Filter the query on the EstuaryLongitude column
     *
     * Example usage:
     * <code>
     * $query->filterByEstuarylongitude(1234); // WHERE EstuaryLongitude = 1234
     * $query->filterByEstuarylongitude(array(12, 34)); // WHERE EstuaryLongitude IN (12, 34)
     * $query->filterByEstuarylongitude(array('min' => 12)); // WHERE EstuaryLongitude > 12
     * </code>
     *
     * @param     mixed $estuarylongitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterByEstuarylongitude($estuarylongitude = null, $comparison = null)
    {
        if (is_array($estuarylongitude)) {
            $useMinMax = false;
            if (isset($estuarylongitude['min'])) {
                $this->addUsingAlias(RiverTableMap::COL_ESTUARYLONGITUDE, $estuarylongitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estuarylongitude['max'])) {
                $this->addUsingAlias(RiverTableMap::COL_ESTUARYLONGITUDE, $estuarylongitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiverTableMap::COL_ESTUARYLONGITUDE, $estuarylongitude, $comparison);
    }

    /**
     * Filter the query on the EstuaryLatitude column
     *
     * Example usage:
     * <code>
     * $query->filterByEstuarylatitude(1234); // WHERE EstuaryLatitude = 1234
     * $query->filterByEstuarylatitude(array(12, 34)); // WHERE EstuaryLatitude IN (12, 34)
     * $query->filterByEstuarylatitude(array('min' => 12)); // WHERE EstuaryLatitude > 12
     * </code>
     *
     * @param     mixed $estuarylatitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function filterByEstuarylatitude($estuarylatitude = null, $comparison = null)
    {
        if (is_array($estuarylatitude)) {
            $useMinMax = false;
            if (isset($estuarylatitude['min'])) {
                $this->addUsingAlias(RiverTableMap::COL_ESTUARYLATITUDE, $estuarylatitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estuarylatitude['max'])) {
                $this->addUsingAlias(RiverTableMap::COL_ESTUARYLATITUDE, $estuarylatitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiverTableMap::COL_ESTUARYLATITUDE, $estuarylatitude, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRiver $river Object to remove from the list of results
     *
     * @return $this|ChildRiverQuery The current query, for fluid interface
     */
    public function prune($river = null)
    {
        if ($river) {
            $this->addUsingAlias(RiverTableMap::COL_NAME, $river->getName(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the River table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RiverTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RiverTableMap::clearInstancePool();
            RiverTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RiverTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RiverTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RiverTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RiverTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RiverQuery
