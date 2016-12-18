<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Politics as ChildPolitics;
use Model\PoliticsQuery as ChildPoliticsQuery;
use Model\Map\PoliticsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Politics' table.
 *
 *
 *
 * @method     ChildPoliticsQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ChildPoliticsQuery orderByIndependence($order = Criteria::ASC) Order by the Independence column
 * @method     ChildPoliticsQuery orderByDependent($order = Criteria::ASC) Order by the Dependent column
 * @method     ChildPoliticsQuery orderByGovernment($order = Criteria::ASC) Order by the Government column
 *
 * @method     ChildPoliticsQuery groupByCountry() Group by the Country column
 * @method     ChildPoliticsQuery groupByIndependence() Group by the Independence column
 * @method     ChildPoliticsQuery groupByDependent() Group by the Dependent column
 * @method     ChildPoliticsQuery groupByGovernment() Group by the Government column
 *
 * @method     ChildPoliticsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPoliticsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPoliticsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPoliticsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPoliticsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPoliticsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPolitics findOne(ConnectionInterface $con = null) Return the first ChildPolitics matching the query
 * @method     ChildPolitics findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPolitics matching the query, or a new ChildPolitics object populated from the query conditions when no match is found
 *
 * @method     ChildPolitics findOneByCountry(string $Country) Return the first ChildPolitics filtered by the Country column
 * @method     ChildPolitics findOneByIndependence(string $Independence) Return the first ChildPolitics filtered by the Independence column
 * @method     ChildPolitics findOneByDependent(string $Dependent) Return the first ChildPolitics filtered by the Dependent column
 * @method     ChildPolitics findOneByGovernment(string $Government) Return the first ChildPolitics filtered by the Government column *

 * @method     ChildPolitics requirePk($key, ConnectionInterface $con = null) Return the ChildPolitics by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolitics requireOne(ConnectionInterface $con = null) Return the first ChildPolitics matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPolitics requireOneByCountry(string $Country) Return the first ChildPolitics filtered by the Country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolitics requireOneByIndependence(string $Independence) Return the first ChildPolitics filtered by the Independence column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolitics requireOneByDependent(string $Dependent) Return the first ChildPolitics filtered by the Dependent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolitics requireOneByGovernment(string $Government) Return the first ChildPolitics filtered by the Government column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPolitics[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPolitics objects based on current ModelCriteria
 * @method     ChildPolitics[]|ObjectCollection findByCountry(string $Country) Return ChildPolitics objects filtered by the Country column
 * @method     ChildPolitics[]|ObjectCollection findByIndependence(string $Independence) Return ChildPolitics objects filtered by the Independence column
 * @method     ChildPolitics[]|ObjectCollection findByDependent(string $Dependent) Return ChildPolitics objects filtered by the Dependent column
 * @method     ChildPolitics[]|ObjectCollection findByGovernment(string $Government) Return ChildPolitics objects filtered by the Government column
 * @method     ChildPolitics[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PoliticsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\PoliticsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Politics', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPoliticsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPoliticsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPoliticsQuery) {
            return $criteria;
        }
        $query = new ChildPoliticsQuery();
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
     * @return ChildPolitics|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PoliticsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PoliticsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPolitics A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Country, Independence, Dependent, Government FROM Politics WHERE Country = :p0';
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
            /** @var ChildPolitics $obj */
            $obj = new ChildPolitics();
            $obj->hydrate($row);
            PoliticsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPolitics|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPoliticsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PoliticsTableMap::COL_COUNTRY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPoliticsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PoliticsTableMap::COL_COUNTRY, $keys, Criteria::IN);
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
     * @return $this|ChildPoliticsQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoliticsTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the Independence column
     *
     * Example usage:
     * <code>
     * $query->filterByIndependence('2011-03-14'); // WHERE Independence = '2011-03-14'
     * $query->filterByIndependence('now'); // WHERE Independence = '2011-03-14'
     * $query->filterByIndependence(array('max' => 'yesterday')); // WHERE Independence > '2011-03-13'
     * </code>
     *
     * @param     mixed $independence The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoliticsQuery The current query, for fluid interface
     */
    public function filterByIndependence($independence = null, $comparison = null)
    {
        if (is_array($independence)) {
            $useMinMax = false;
            if (isset($independence['min'])) {
                $this->addUsingAlias(PoliticsTableMap::COL_INDEPENDENCE, $independence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($independence['max'])) {
                $this->addUsingAlias(PoliticsTableMap::COL_INDEPENDENCE, $independence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoliticsTableMap::COL_INDEPENDENCE, $independence, $comparison);
    }

    /**
     * Filter the query on the Dependent column
     *
     * Example usage:
     * <code>
     * $query->filterByDependent('fooValue');   // WHERE Dependent = 'fooValue'
     * $query->filterByDependent('%fooValue%', Criteria::LIKE); // WHERE Dependent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dependent The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoliticsQuery The current query, for fluid interface
     */
    public function filterByDependent($dependent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dependent)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoliticsTableMap::COL_DEPENDENT, $dependent, $comparison);
    }

    /**
     * Filter the query on the Government column
     *
     * Example usage:
     * <code>
     * $query->filterByGovernment('fooValue');   // WHERE Government = 'fooValue'
     * $query->filterByGovernment('%fooValue%', Criteria::LIKE); // WHERE Government LIKE '%fooValue%'
     * </code>
     *
     * @param     string $government The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoliticsQuery The current query, for fluid interface
     */
    public function filterByGovernment($government = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($government)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoliticsTableMap::COL_GOVERNMENT, $government, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPolitics $politics Object to remove from the list of results
     *
     * @return $this|ChildPoliticsQuery The current query, for fluid interface
     */
    public function prune($politics = null)
    {
        if ($politics) {
            $this->addUsingAlias(PoliticsTableMap::COL_COUNTRY, $politics->getCountry(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Politics table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoliticsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PoliticsTableMap::clearInstancePool();
            PoliticsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PoliticsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PoliticsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PoliticsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PoliticsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PoliticsQuery
