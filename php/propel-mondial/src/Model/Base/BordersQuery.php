<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Borders as ChildBorders;
use Model\BordersQuery as ChildBordersQuery;
use Model\Map\BordersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'borders' table.
 *
 *
 *
 * @method     ChildBordersQuery orderByCountry1($order = Criteria::ASC) Order by the Country1 column
 * @method     ChildBordersQuery orderByCountry2($order = Criteria::ASC) Order by the Country2 column
 * @method     ChildBordersQuery orderByLength($order = Criteria::ASC) Order by the Length column
 *
 * @method     ChildBordersQuery groupByCountry1() Group by the Country1 column
 * @method     ChildBordersQuery groupByCountry2() Group by the Country2 column
 * @method     ChildBordersQuery groupByLength() Group by the Length column
 *
 * @method     ChildBordersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBordersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBordersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBordersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBordersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBordersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBorders findOne(ConnectionInterface $con = null) Return the first ChildBorders matching the query
 * @method     ChildBorders findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBorders matching the query, or a new ChildBorders object populated from the query conditions when no match is found
 *
 * @method     ChildBorders findOneByCountry1(string $Country1) Return the first ChildBorders filtered by the Country1 column
 * @method     ChildBorders findOneByCountry2(string $Country2) Return the first ChildBorders filtered by the Country2 column
 * @method     ChildBorders findOneByLength(double $Length) Return the first ChildBorders filtered by the Length column *

 * @method     ChildBorders requirePk($key, ConnectionInterface $con = null) Return the ChildBorders by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBorders requireOne(ConnectionInterface $con = null) Return the first ChildBorders matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBorders requireOneByCountry1(string $Country1) Return the first ChildBorders filtered by the Country1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBorders requireOneByCountry2(string $Country2) Return the first ChildBorders filtered by the Country2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBorders requireOneByLength(double $Length) Return the first ChildBorders filtered by the Length column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBorders[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBorders objects based on current ModelCriteria
 * @method     ChildBorders[]|ObjectCollection findByCountry1(string $Country1) Return ChildBorders objects filtered by the Country1 column
 * @method     ChildBorders[]|ObjectCollection findByCountry2(string $Country2) Return ChildBorders objects filtered by the Country2 column
 * @method     ChildBorders[]|ObjectCollection findByLength(double $Length) Return ChildBorders objects filtered by the Length column
 * @method     ChildBorders[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BordersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\BordersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Borders', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBordersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBordersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBordersQuery) {
            return $criteria;
        }
        $query = new ChildBordersQuery();
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
     * @param array[$Country1, $Country2] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildBorders|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BordersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BordersTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildBorders A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Country1, Country2, Length FROM borders WHERE Country1 = :p0 AND Country2 = :p1';
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
            /** @var ChildBorders $obj */
            $obj = new ChildBorders();
            $obj->hydrate($row);
            BordersTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildBorders|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBordersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(BordersTableMap::COL_COUNTRY1, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BordersTableMap::COL_COUNTRY2, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBordersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(BordersTableMap::COL_COUNTRY1, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BordersTableMap::COL_COUNTRY2, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the Country1 column
     *
     * Example usage:
     * <code>
     * $query->filterByCountry1('fooValue');   // WHERE Country1 = 'fooValue'
     * $query->filterByCountry1('%fooValue%', Criteria::LIKE); // WHERE Country1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $country1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBordersQuery The current query, for fluid interface
     */
    public function filterByCountry1($country1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BordersTableMap::COL_COUNTRY1, $country1, $comparison);
    }

    /**
     * Filter the query on the Country2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCountry2('fooValue');   // WHERE Country2 = 'fooValue'
     * $query->filterByCountry2('%fooValue%', Criteria::LIKE); // WHERE Country2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $country2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBordersQuery The current query, for fluid interface
     */
    public function filterByCountry2($country2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BordersTableMap::COL_COUNTRY2, $country2, $comparison);
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
     * @return $this|ChildBordersQuery The current query, for fluid interface
     */
    public function filterByLength($length = null, $comparison = null)
    {
        if (is_array($length)) {
            $useMinMax = false;
            if (isset($length['min'])) {
                $this->addUsingAlias(BordersTableMap::COL_LENGTH, $length['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($length['max'])) {
                $this->addUsingAlias(BordersTableMap::COL_LENGTH, $length['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BordersTableMap::COL_LENGTH, $length, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBorders $borders Object to remove from the list of results
     *
     * @return $this|ChildBordersQuery The current query, for fluid interface
     */
    public function prune($borders = null)
    {
        if ($borders) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BordersTableMap::COL_COUNTRY1), $borders->getCountry1(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BordersTableMap::COL_COUNTRY2), $borders->getCountry2(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the borders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BordersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BordersTableMap::clearInstancePool();
            BordersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BordersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BordersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BordersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BordersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BordersQuery
