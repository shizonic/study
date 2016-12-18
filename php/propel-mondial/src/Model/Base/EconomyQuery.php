<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Economy as ChildEconomy;
use Model\EconomyQuery as ChildEconomyQuery;
use Model\Map\EconomyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Economy' table.
 *
 *
 *
 * @method     ChildEconomyQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ChildEconomyQuery orderByGdp($order = Criteria::ASC) Order by the GDP column
 * @method     ChildEconomyQuery orderByAgriculture($order = Criteria::ASC) Order by the Agriculture column
 * @method     ChildEconomyQuery orderByService($order = Criteria::ASC) Order by the Service column
 * @method     ChildEconomyQuery orderByIndustry($order = Criteria::ASC) Order by the Industry column
 * @method     ChildEconomyQuery orderByInflation($order = Criteria::ASC) Order by the Inflation column
 *
 * @method     ChildEconomyQuery groupByCountry() Group by the Country column
 * @method     ChildEconomyQuery groupByGdp() Group by the GDP column
 * @method     ChildEconomyQuery groupByAgriculture() Group by the Agriculture column
 * @method     ChildEconomyQuery groupByService() Group by the Service column
 * @method     ChildEconomyQuery groupByIndustry() Group by the Industry column
 * @method     ChildEconomyQuery groupByInflation() Group by the Inflation column
 *
 * @method     ChildEconomyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEconomyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEconomyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEconomyQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEconomyQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEconomyQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEconomy findOne(ConnectionInterface $con = null) Return the first ChildEconomy matching the query
 * @method     ChildEconomy findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEconomy matching the query, or a new ChildEconomy object populated from the query conditions when no match is found
 *
 * @method     ChildEconomy findOneByCountry(string $Country) Return the first ChildEconomy filtered by the Country column
 * @method     ChildEconomy findOneByGdp(double $GDP) Return the first ChildEconomy filtered by the GDP column
 * @method     ChildEconomy findOneByAgriculture(double $Agriculture) Return the first ChildEconomy filtered by the Agriculture column
 * @method     ChildEconomy findOneByService(double $Service) Return the first ChildEconomy filtered by the Service column
 * @method     ChildEconomy findOneByIndustry(double $Industry) Return the first ChildEconomy filtered by the Industry column
 * @method     ChildEconomy findOneByInflation(double $Inflation) Return the first ChildEconomy filtered by the Inflation column *

 * @method     ChildEconomy requirePk($key, ConnectionInterface $con = null) Return the ChildEconomy by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEconomy requireOne(ConnectionInterface $con = null) Return the first ChildEconomy matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEconomy requireOneByCountry(string $Country) Return the first ChildEconomy filtered by the Country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEconomy requireOneByGdp(double $GDP) Return the first ChildEconomy filtered by the GDP column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEconomy requireOneByAgriculture(double $Agriculture) Return the first ChildEconomy filtered by the Agriculture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEconomy requireOneByService(double $Service) Return the first ChildEconomy filtered by the Service column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEconomy requireOneByIndustry(double $Industry) Return the first ChildEconomy filtered by the Industry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEconomy requireOneByInflation(double $Inflation) Return the first ChildEconomy filtered by the Inflation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEconomy[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEconomy objects based on current ModelCriteria
 * @method     ChildEconomy[]|ObjectCollection findByCountry(string $Country) Return ChildEconomy objects filtered by the Country column
 * @method     ChildEconomy[]|ObjectCollection findByGdp(double $GDP) Return ChildEconomy objects filtered by the GDP column
 * @method     ChildEconomy[]|ObjectCollection findByAgriculture(double $Agriculture) Return ChildEconomy objects filtered by the Agriculture column
 * @method     ChildEconomy[]|ObjectCollection findByService(double $Service) Return ChildEconomy objects filtered by the Service column
 * @method     ChildEconomy[]|ObjectCollection findByIndustry(double $Industry) Return ChildEconomy objects filtered by the Industry column
 * @method     ChildEconomy[]|ObjectCollection findByInflation(double $Inflation) Return ChildEconomy objects filtered by the Inflation column
 * @method     ChildEconomy[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EconomyQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\EconomyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Economy', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEconomyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEconomyQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEconomyQuery) {
            return $criteria;
        }
        $query = new ChildEconomyQuery();
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
     * @return ChildEconomy|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EconomyTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EconomyTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEconomy A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Country, GDP, Agriculture, Service, Industry, Inflation FROM Economy WHERE Country = :p0';
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
            /** @var ChildEconomy $obj */
            $obj = new ChildEconomy();
            $obj->hydrate($row);
            EconomyTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEconomy|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEconomyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EconomyTableMap::COL_COUNTRY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEconomyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EconomyTableMap::COL_COUNTRY, $keys, Criteria::IN);
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
     * @return $this|ChildEconomyQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EconomyTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the GDP column
     *
     * Example usage:
     * <code>
     * $query->filterByGdp(1234); // WHERE GDP = 1234
     * $query->filterByGdp(array(12, 34)); // WHERE GDP IN (12, 34)
     * $query->filterByGdp(array('min' => 12)); // WHERE GDP > 12
     * </code>
     *
     * @param     mixed $gdp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEconomyQuery The current query, for fluid interface
     */
    public function filterByGdp($gdp = null, $comparison = null)
    {
        if (is_array($gdp)) {
            $useMinMax = false;
            if (isset($gdp['min'])) {
                $this->addUsingAlias(EconomyTableMap::COL_GDP, $gdp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gdp['max'])) {
                $this->addUsingAlias(EconomyTableMap::COL_GDP, $gdp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EconomyTableMap::COL_GDP, $gdp, $comparison);
    }

    /**
     * Filter the query on the Agriculture column
     *
     * Example usage:
     * <code>
     * $query->filterByAgriculture(1234); // WHERE Agriculture = 1234
     * $query->filterByAgriculture(array(12, 34)); // WHERE Agriculture IN (12, 34)
     * $query->filterByAgriculture(array('min' => 12)); // WHERE Agriculture > 12
     * </code>
     *
     * @param     mixed $agriculture The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEconomyQuery The current query, for fluid interface
     */
    public function filterByAgriculture($agriculture = null, $comparison = null)
    {
        if (is_array($agriculture)) {
            $useMinMax = false;
            if (isset($agriculture['min'])) {
                $this->addUsingAlias(EconomyTableMap::COL_AGRICULTURE, $agriculture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($agriculture['max'])) {
                $this->addUsingAlias(EconomyTableMap::COL_AGRICULTURE, $agriculture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EconomyTableMap::COL_AGRICULTURE, $agriculture, $comparison);
    }

    /**
     * Filter the query on the Service column
     *
     * Example usage:
     * <code>
     * $query->filterByService(1234); // WHERE Service = 1234
     * $query->filterByService(array(12, 34)); // WHERE Service IN (12, 34)
     * $query->filterByService(array('min' => 12)); // WHERE Service > 12
     * </code>
     *
     * @param     mixed $service The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEconomyQuery The current query, for fluid interface
     */
    public function filterByService($service = null, $comparison = null)
    {
        if (is_array($service)) {
            $useMinMax = false;
            if (isset($service['min'])) {
                $this->addUsingAlias(EconomyTableMap::COL_SERVICE, $service['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($service['max'])) {
                $this->addUsingAlias(EconomyTableMap::COL_SERVICE, $service['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EconomyTableMap::COL_SERVICE, $service, $comparison);
    }

    /**
     * Filter the query on the Industry column
     *
     * Example usage:
     * <code>
     * $query->filterByIndustry(1234); // WHERE Industry = 1234
     * $query->filterByIndustry(array(12, 34)); // WHERE Industry IN (12, 34)
     * $query->filterByIndustry(array('min' => 12)); // WHERE Industry > 12
     * </code>
     *
     * @param     mixed $industry The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEconomyQuery The current query, for fluid interface
     */
    public function filterByIndustry($industry = null, $comparison = null)
    {
        if (is_array($industry)) {
            $useMinMax = false;
            if (isset($industry['min'])) {
                $this->addUsingAlias(EconomyTableMap::COL_INDUSTRY, $industry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($industry['max'])) {
                $this->addUsingAlias(EconomyTableMap::COL_INDUSTRY, $industry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EconomyTableMap::COL_INDUSTRY, $industry, $comparison);
    }

    /**
     * Filter the query on the Inflation column
     *
     * Example usage:
     * <code>
     * $query->filterByInflation(1234); // WHERE Inflation = 1234
     * $query->filterByInflation(array(12, 34)); // WHERE Inflation IN (12, 34)
     * $query->filterByInflation(array('min' => 12)); // WHERE Inflation > 12
     * </code>
     *
     * @param     mixed $inflation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEconomyQuery The current query, for fluid interface
     */
    public function filterByInflation($inflation = null, $comparison = null)
    {
        if (is_array($inflation)) {
            $useMinMax = false;
            if (isset($inflation['min'])) {
                $this->addUsingAlias(EconomyTableMap::COL_INFLATION, $inflation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inflation['max'])) {
                $this->addUsingAlias(EconomyTableMap::COL_INFLATION, $inflation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EconomyTableMap::COL_INFLATION, $inflation, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEconomy $economy Object to remove from the list of results
     *
     * @return $this|ChildEconomyQuery The current query, for fluid interface
     */
    public function prune($economy = null)
    {
        if ($economy) {
            $this->addUsingAlias(EconomyTableMap::COL_COUNTRY, $economy->getCountry(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Economy table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EconomyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EconomyTableMap::clearInstancePool();
            EconomyTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EconomyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EconomyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EconomyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EconomyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EconomyQuery
