<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Population as ChildPopulation;
use Model\PopulationQuery as ChildPopulationQuery;
use Model\Map\PopulationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Population' table.
 *
 *
 *
 * @method     ChildPopulationQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ChildPopulationQuery orderByPopulationGrowth($order = Criteria::ASC) Order by the Population_Growth column
 * @method     ChildPopulationQuery orderByInfantMortality($order = Criteria::ASC) Order by the Infant_Mortality column
 *
 * @method     ChildPopulationQuery groupByCountry() Group by the Country column
 * @method     ChildPopulationQuery groupByPopulationGrowth() Group by the Population_Growth column
 * @method     ChildPopulationQuery groupByInfantMortality() Group by the Infant_Mortality column
 *
 * @method     ChildPopulationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPopulationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPopulationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPopulationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPopulationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPopulationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPopulation findOne(ConnectionInterface $con = null) Return the first ChildPopulation matching the query
 * @method     ChildPopulation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPopulation matching the query, or a new ChildPopulation object populated from the query conditions when no match is found
 *
 * @method     ChildPopulation findOneByCountry(string $Country) Return the first ChildPopulation filtered by the Country column
 * @method     ChildPopulation findOneByPopulationGrowth(double $Population_Growth) Return the first ChildPopulation filtered by the Population_Growth column
 * @method     ChildPopulation findOneByInfantMortality(double $Infant_Mortality) Return the first ChildPopulation filtered by the Infant_Mortality column *

 * @method     ChildPopulation requirePk($key, ConnectionInterface $con = null) Return the ChildPopulation by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPopulation requireOne(ConnectionInterface $con = null) Return the first ChildPopulation matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPopulation requireOneByCountry(string $Country) Return the first ChildPopulation filtered by the Country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPopulation requireOneByPopulationGrowth(double $Population_Growth) Return the first ChildPopulation filtered by the Population_Growth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPopulation requireOneByInfantMortality(double $Infant_Mortality) Return the first ChildPopulation filtered by the Infant_Mortality column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPopulation[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPopulation objects based on current ModelCriteria
 * @method     ChildPopulation[]|ObjectCollection findByCountry(string $Country) Return ChildPopulation objects filtered by the Country column
 * @method     ChildPopulation[]|ObjectCollection findByPopulationGrowth(double $Population_Growth) Return ChildPopulation objects filtered by the Population_Growth column
 * @method     ChildPopulation[]|ObjectCollection findByInfantMortality(double $Infant_Mortality) Return ChildPopulation objects filtered by the Infant_Mortality column
 * @method     ChildPopulation[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PopulationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\PopulationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Population', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPopulationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPopulationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPopulationQuery) {
            return $criteria;
        }
        $query = new ChildPopulationQuery();
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
     * @return ChildPopulation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PopulationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PopulationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPopulation A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Country, Population_Growth, Infant_Mortality FROM Population WHERE Country = :p0';
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
            /** @var ChildPopulation $obj */
            $obj = new ChildPopulation();
            $obj->hydrate($row);
            PopulationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPopulation|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPopulationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PopulationTableMap::COL_COUNTRY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPopulationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PopulationTableMap::COL_COUNTRY, $keys, Criteria::IN);
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
     * @return $this|ChildPopulationQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PopulationTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the Population_Growth column
     *
     * Example usage:
     * <code>
     * $query->filterByPopulationGrowth(1234); // WHERE Population_Growth = 1234
     * $query->filterByPopulationGrowth(array(12, 34)); // WHERE Population_Growth IN (12, 34)
     * $query->filterByPopulationGrowth(array('min' => 12)); // WHERE Population_Growth > 12
     * </code>
     *
     * @param     mixed $populationGrowth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPopulationQuery The current query, for fluid interface
     */
    public function filterByPopulationGrowth($populationGrowth = null, $comparison = null)
    {
        if (is_array($populationGrowth)) {
            $useMinMax = false;
            if (isset($populationGrowth['min'])) {
                $this->addUsingAlias(PopulationTableMap::COL_POPULATION_GROWTH, $populationGrowth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($populationGrowth['max'])) {
                $this->addUsingAlias(PopulationTableMap::COL_POPULATION_GROWTH, $populationGrowth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PopulationTableMap::COL_POPULATION_GROWTH, $populationGrowth, $comparison);
    }

    /**
     * Filter the query on the Infant_Mortality column
     *
     * Example usage:
     * <code>
     * $query->filterByInfantMortality(1234); // WHERE Infant_Mortality = 1234
     * $query->filterByInfantMortality(array(12, 34)); // WHERE Infant_Mortality IN (12, 34)
     * $query->filterByInfantMortality(array('min' => 12)); // WHERE Infant_Mortality > 12
     * </code>
     *
     * @param     mixed $infantMortality The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPopulationQuery The current query, for fluid interface
     */
    public function filterByInfantMortality($infantMortality = null, $comparison = null)
    {
        if (is_array($infantMortality)) {
            $useMinMax = false;
            if (isset($infantMortality['min'])) {
                $this->addUsingAlias(PopulationTableMap::COL_INFANT_MORTALITY, $infantMortality['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($infantMortality['max'])) {
                $this->addUsingAlias(PopulationTableMap::COL_INFANT_MORTALITY, $infantMortality['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PopulationTableMap::COL_INFANT_MORTALITY, $infantMortality, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPopulation $population Object to remove from the list of results
     *
     * @return $this|ChildPopulationQuery The current query, for fluid interface
     */
    public function prune($population = null)
    {
        if ($population) {
            $this->addUsingAlias(PopulationTableMap::COL_COUNTRY, $population->getCountry(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Population table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PopulationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PopulationTableMap::clearInstancePool();
            PopulationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PopulationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PopulationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PopulationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PopulationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PopulationQuery
