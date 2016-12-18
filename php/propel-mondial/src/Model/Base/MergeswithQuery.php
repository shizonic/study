<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Mergeswith as ChildMergeswith;
use Model\MergeswithQuery as ChildMergeswithQuery;
use Model\Map\MergeswithTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'mergesWith' table.
 *
 *
 *
 * @method     ChildMergeswithQuery orderBySea1($order = Criteria::ASC) Order by the Sea1 column
 * @method     ChildMergeswithQuery orderBySea2($order = Criteria::ASC) Order by the Sea2 column
 *
 * @method     ChildMergeswithQuery groupBySea1() Group by the Sea1 column
 * @method     ChildMergeswithQuery groupBySea2() Group by the Sea2 column
 *
 * @method     ChildMergeswithQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMergeswithQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMergeswithQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMergeswithQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMergeswithQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMergeswithQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMergeswith findOne(ConnectionInterface $con = null) Return the first ChildMergeswith matching the query
 * @method     ChildMergeswith findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMergeswith matching the query, or a new ChildMergeswith object populated from the query conditions when no match is found
 *
 * @method     ChildMergeswith findOneBySea1(string $Sea1) Return the first ChildMergeswith filtered by the Sea1 column
 * @method     ChildMergeswith findOneBySea2(string $Sea2) Return the first ChildMergeswith filtered by the Sea2 column *

 * @method     ChildMergeswith requirePk($key, ConnectionInterface $con = null) Return the ChildMergeswith by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMergeswith requireOne(ConnectionInterface $con = null) Return the first ChildMergeswith matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMergeswith requireOneBySea1(string $Sea1) Return the first ChildMergeswith filtered by the Sea1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMergeswith requireOneBySea2(string $Sea2) Return the first ChildMergeswith filtered by the Sea2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMergeswith[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMergeswith objects based on current ModelCriteria
 * @method     ChildMergeswith[]|ObjectCollection findBySea1(string $Sea1) Return ChildMergeswith objects filtered by the Sea1 column
 * @method     ChildMergeswith[]|ObjectCollection findBySea2(string $Sea2) Return ChildMergeswith objects filtered by the Sea2 column
 * @method     ChildMergeswith[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MergeswithQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\MergeswithQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Mergeswith', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMergeswithQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMergeswithQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMergeswithQuery) {
            return $criteria;
        }
        $query = new ChildMergeswithQuery();
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
     * @param array[$Sea1, $Sea2] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildMergeswith|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MergeswithTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MergeswithTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildMergeswith A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Sea1, Sea2 FROM mergesWith WHERE Sea1 = :p0 AND Sea2 = :p1';
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
            /** @var ChildMergeswith $obj */
            $obj = new ChildMergeswith();
            $obj->hydrate($row);
            MergeswithTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildMergeswith|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMergeswithQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(MergeswithTableMap::COL_SEA1, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(MergeswithTableMap::COL_SEA2, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMergeswithQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(MergeswithTableMap::COL_SEA1, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(MergeswithTableMap::COL_SEA2, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the Sea1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySea1('fooValue');   // WHERE Sea1 = 'fooValue'
     * $query->filterBySea1('%fooValue%', Criteria::LIKE); // WHERE Sea1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sea1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMergeswithQuery The current query, for fluid interface
     */
    public function filterBySea1($sea1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sea1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MergeswithTableMap::COL_SEA1, $sea1, $comparison);
    }

    /**
     * Filter the query on the Sea2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySea2('fooValue');   // WHERE Sea2 = 'fooValue'
     * $query->filterBySea2('%fooValue%', Criteria::LIKE); // WHERE Sea2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sea2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMergeswithQuery The current query, for fluid interface
     */
    public function filterBySea2($sea2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sea2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MergeswithTableMap::COL_SEA2, $sea2, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMergeswith $mergeswith Object to remove from the list of results
     *
     * @return $this|ChildMergeswithQuery The current query, for fluid interface
     */
    public function prune($mergeswith = null)
    {
        if ($mergeswith) {
            $this->addCond('pruneCond0', $this->getAliasedColName(MergeswithTableMap::COL_SEA1), $mergeswith->getSea1(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(MergeswithTableMap::COL_SEA2), $mergeswith->getSea2(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the mergesWith table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MergeswithTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MergeswithTableMap::clearInstancePool();
            MergeswithTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MergeswithTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MergeswithTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MergeswithTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MergeswithTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MergeswithQuery
