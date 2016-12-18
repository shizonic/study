<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Encompasses as ChildEncompasses;
use Model\EncompassesQuery as ChildEncompassesQuery;
use Model\Map\EncompassesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'encompasses' table.
 *
 *
 *
 * @method     ChildEncompassesQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ChildEncompassesQuery orderByContinent($order = Criteria::ASC) Order by the Continent column
 * @method     ChildEncompassesQuery orderByPercentage($order = Criteria::ASC) Order by the Percentage column
 *
 * @method     ChildEncompassesQuery groupByCountry() Group by the Country column
 * @method     ChildEncompassesQuery groupByContinent() Group by the Continent column
 * @method     ChildEncompassesQuery groupByPercentage() Group by the Percentage column
 *
 * @method     ChildEncompassesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEncompassesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEncompassesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEncompassesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEncompassesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEncompassesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEncompasses findOne(ConnectionInterface $con = null) Return the first ChildEncompasses matching the query
 * @method     ChildEncompasses findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEncompasses matching the query, or a new ChildEncompasses object populated from the query conditions when no match is found
 *
 * @method     ChildEncompasses findOneByCountry(string $Country) Return the first ChildEncompasses filtered by the Country column
 * @method     ChildEncompasses findOneByContinent(string $Continent) Return the first ChildEncompasses filtered by the Continent column
 * @method     ChildEncompasses findOneByPercentage(double $Percentage) Return the first ChildEncompasses filtered by the Percentage column *

 * @method     ChildEncompasses requirePk($key, ConnectionInterface $con = null) Return the ChildEncompasses by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEncompasses requireOne(ConnectionInterface $con = null) Return the first ChildEncompasses matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEncompasses requireOneByCountry(string $Country) Return the first ChildEncompasses filtered by the Country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEncompasses requireOneByContinent(string $Continent) Return the first ChildEncompasses filtered by the Continent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEncompasses requireOneByPercentage(double $Percentage) Return the first ChildEncompasses filtered by the Percentage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEncompasses[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEncompasses objects based on current ModelCriteria
 * @method     ChildEncompasses[]|ObjectCollection findByCountry(string $Country) Return ChildEncompasses objects filtered by the Country column
 * @method     ChildEncompasses[]|ObjectCollection findByContinent(string $Continent) Return ChildEncompasses objects filtered by the Continent column
 * @method     ChildEncompasses[]|ObjectCollection findByPercentage(double $Percentage) Return ChildEncompasses objects filtered by the Percentage column
 * @method     ChildEncompasses[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EncompassesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\EncompassesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Encompasses', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEncompassesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEncompassesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEncompassesQuery) {
            return $criteria;
        }
        $query = new ChildEncompassesQuery();
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
     * @param array[$Country, $Continent] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildEncompasses|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EncompassesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EncompassesTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildEncompasses A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Country, Continent, Percentage FROM encompasses WHERE Country = :p0 AND Continent = :p1';
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
            /** @var ChildEncompasses $obj */
            $obj = new ChildEncompasses();
            $obj->hydrate($row);
            EncompassesTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildEncompasses|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEncompassesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(EncompassesTableMap::COL_COUNTRY, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(EncompassesTableMap::COL_CONTINENT, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEncompassesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(EncompassesTableMap::COL_COUNTRY, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(EncompassesTableMap::COL_CONTINENT, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildEncompassesQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EncompassesTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the Continent column
     *
     * Example usage:
     * <code>
     * $query->filterByContinent('fooValue');   // WHERE Continent = 'fooValue'
     * $query->filterByContinent('%fooValue%', Criteria::LIKE); // WHERE Continent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $continent The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEncompassesQuery The current query, for fluid interface
     */
    public function filterByContinent($continent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($continent)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EncompassesTableMap::COL_CONTINENT, $continent, $comparison);
    }

    /**
     * Filter the query on the Percentage column
     *
     * Example usage:
     * <code>
     * $query->filterByPercentage(1234); // WHERE Percentage = 1234
     * $query->filterByPercentage(array(12, 34)); // WHERE Percentage IN (12, 34)
     * $query->filterByPercentage(array('min' => 12)); // WHERE Percentage > 12
     * </code>
     *
     * @param     mixed $percentage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEncompassesQuery The current query, for fluid interface
     */
    public function filterByPercentage($percentage = null, $comparison = null)
    {
        if (is_array($percentage)) {
            $useMinMax = false;
            if (isset($percentage['min'])) {
                $this->addUsingAlias(EncompassesTableMap::COL_PERCENTAGE, $percentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percentage['max'])) {
                $this->addUsingAlias(EncompassesTableMap::COL_PERCENTAGE, $percentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EncompassesTableMap::COL_PERCENTAGE, $percentage, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEncompasses $encompasses Object to remove from the list of results
     *
     * @return $this|ChildEncompassesQuery The current query, for fluid interface
     */
    public function prune($encompasses = null)
    {
        if ($encompasses) {
            $this->addCond('pruneCond0', $this->getAliasedColName(EncompassesTableMap::COL_COUNTRY), $encompasses->getCountry(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(EncompassesTableMap::COL_CONTINENT), $encompasses->getContinent(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the encompasses table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EncompassesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EncompassesTableMap::clearInstancePool();
            EncompassesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EncompassesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EncompassesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EncompassesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EncompassesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EncompassesQuery
