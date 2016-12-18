<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Province as ChildProvince;
use Model\ProvinceQuery as ChildProvinceQuery;
use Model\Map\ProvinceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Province' table.
 *
 *
 *
 * @method     ChildProvinceQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildProvinceQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ChildProvinceQuery orderByPopulation($order = Criteria::ASC) Order by the Population column
 * @method     ChildProvinceQuery orderByArea($order = Criteria::ASC) Order by the Area column
 * @method     ChildProvinceQuery orderByCapital($order = Criteria::ASC) Order by the Capital column
 * @method     ChildProvinceQuery orderByCapprov($order = Criteria::ASC) Order by the CapProv column
 *
 * @method     ChildProvinceQuery groupByName() Group by the Name column
 * @method     ChildProvinceQuery groupByCountry() Group by the Country column
 * @method     ChildProvinceQuery groupByPopulation() Group by the Population column
 * @method     ChildProvinceQuery groupByArea() Group by the Area column
 * @method     ChildProvinceQuery groupByCapital() Group by the Capital column
 * @method     ChildProvinceQuery groupByCapprov() Group by the CapProv column
 *
 * @method     ChildProvinceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProvinceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProvinceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProvinceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProvinceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProvinceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProvince findOne(ConnectionInterface $con = null) Return the first ChildProvince matching the query
 * @method     ChildProvince findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProvince matching the query, or a new ChildProvince object populated from the query conditions when no match is found
 *
 * @method     ChildProvince findOneByName(string $Name) Return the first ChildProvince filtered by the Name column
 * @method     ChildProvince findOneByCountry(string $Country) Return the first ChildProvince filtered by the Country column
 * @method     ChildProvince findOneByPopulation(int $Population) Return the first ChildProvince filtered by the Population column
 * @method     ChildProvince findOneByArea(double $Area) Return the first ChildProvince filtered by the Area column
 * @method     ChildProvince findOneByCapital(string $Capital) Return the first ChildProvince filtered by the Capital column
 * @method     ChildProvince findOneByCapprov(string $CapProv) Return the first ChildProvince filtered by the CapProv column *

 * @method     ChildProvince requirePk($key, ConnectionInterface $con = null) Return the ChildProvince by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvince requireOne(ConnectionInterface $con = null) Return the first ChildProvince matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProvince requireOneByName(string $Name) Return the first ChildProvince filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvince requireOneByCountry(string $Country) Return the first ChildProvince filtered by the Country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvince requireOneByPopulation(int $Population) Return the first ChildProvince filtered by the Population column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvince requireOneByArea(double $Area) Return the first ChildProvince filtered by the Area column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvince requireOneByCapital(string $Capital) Return the first ChildProvince filtered by the Capital column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvince requireOneByCapprov(string $CapProv) Return the first ChildProvince filtered by the CapProv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProvince[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProvince objects based on current ModelCriteria
 * @method     ChildProvince[]|ObjectCollection findByName(string $Name) Return ChildProvince objects filtered by the Name column
 * @method     ChildProvince[]|ObjectCollection findByCountry(string $Country) Return ChildProvince objects filtered by the Country column
 * @method     ChildProvince[]|ObjectCollection findByPopulation(int $Population) Return ChildProvince objects filtered by the Population column
 * @method     ChildProvince[]|ObjectCollection findByArea(double $Area) Return ChildProvince objects filtered by the Area column
 * @method     ChildProvince[]|ObjectCollection findByCapital(string $Capital) Return ChildProvince objects filtered by the Capital column
 * @method     ChildProvince[]|ObjectCollection findByCapprov(string $CapProv) Return ChildProvince objects filtered by the CapProv column
 * @method     ChildProvince[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProvinceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\ProvinceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Province', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProvinceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProvinceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProvinceQuery) {
            return $criteria;
        }
        $query = new ChildProvinceQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$Name, $Country] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildProvince|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProvinceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProvinceTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildProvince A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Name, Country, Population, Area, Capital, CapProv FROM Province WHERE Name = :p0 AND Country = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildProvince $obj */
            $obj = new ChildProvince();
            $obj->hydrate($row);
            ProvinceTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildProvince|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ProvinceTableMap::COL_NAME, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ProvinceTableMap::COL_COUNTRY, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ProvinceTableMap::COL_NAME, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ProvinceTableMap::COL_COUNTRY, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinceTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinceTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the Population column
     *
     * Example usage:
     * <code>
     * $query->filterByPopulation(1234); // WHERE Population = 1234
     * $query->filterByPopulation(array(12, 34)); // WHERE Population IN (12, 34)
     * $query->filterByPopulation(array('min' => 12)); // WHERE Population > 12
     * </code>
     *
     * @param     mixed $population The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByPopulation($population = null, $comparison = null)
    {
        if (is_array($population)) {
            $useMinMax = false;
            if (isset($population['min'])) {
                $this->addUsingAlias(ProvinceTableMap::COL_POPULATION, $population['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($population['max'])) {
                $this->addUsingAlias(ProvinceTableMap::COL_POPULATION, $population['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinceTableMap::COL_POPULATION, $population, $comparison);
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
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByArea($area = null, $comparison = null)
    {
        if (is_array($area)) {
            $useMinMax = false;
            if (isset($area['min'])) {
                $this->addUsingAlias(ProvinceTableMap::COL_AREA, $area['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($area['max'])) {
                $this->addUsingAlias(ProvinceTableMap::COL_AREA, $area['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinceTableMap::COL_AREA, $area, $comparison);
    }

    /**
     * Filter the query on the Capital column
     *
     * Example usage:
     * <code>
     * $query->filterByCapital('fooValue');   // WHERE Capital = 'fooValue'
     * $query->filterByCapital('%fooValue%', Criteria::LIKE); // WHERE Capital LIKE '%fooValue%'
     * </code>
     *
     * @param     string $capital The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByCapital($capital = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($capital)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinceTableMap::COL_CAPITAL, $capital, $comparison);
    }

    /**
     * Filter the query on the CapProv column
     *
     * Example usage:
     * <code>
     * $query->filterByCapprov('fooValue');   // WHERE CapProv = 'fooValue'
     * $query->filterByCapprov('%fooValue%', Criteria::LIKE); // WHERE CapProv LIKE '%fooValue%'
     * </code>
     *
     * @param     string $capprov The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByCapprov($capprov = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($capprov)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinceTableMap::COL_CAPPROV, $capprov, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProvince $province Object to remove from the list of results
     *
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function prune($province = null)
    {
        if ($province) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ProvinceTableMap::COL_NAME), $province->getName(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ProvinceTableMap::COL_COUNTRY), $province->getCountry(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Province table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProvinceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProvinceTableMap::clearInstancePool();
            ProvinceTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ProvinceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProvinceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProvinceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProvinceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProvinceQuery
