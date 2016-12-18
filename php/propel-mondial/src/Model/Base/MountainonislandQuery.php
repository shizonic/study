<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Mountainonisland as ChildMountainonisland;
use Model\MountainonislandQuery as ChildMountainonislandQuery;
use Model\Map\MountainonislandTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'MountainOnIsland' table.
 *
 *
 *
 * @method     ChildMountainonislandQuery orderByMountain($order = Criteria::ASC) Order by the Mountain column
 * @method     ChildMountainonislandQuery orderByIsland($order = Criteria::ASC) Order by the Island column
 *
 * @method     ChildMountainonislandQuery groupByMountain() Group by the Mountain column
 * @method     ChildMountainonislandQuery groupByIsland() Group by the Island column
 *
 * @method     ChildMountainonislandQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMountainonislandQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMountainonislandQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMountainonislandQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMountainonislandQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMountainonislandQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMountainonisland findOne(ConnectionInterface $con = null) Return the first ChildMountainonisland matching the query
 * @method     ChildMountainonisland findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMountainonisland matching the query, or a new ChildMountainonisland object populated from the query conditions when no match is found
 *
 * @method     ChildMountainonisland findOneByMountain(string $Mountain) Return the first ChildMountainonisland filtered by the Mountain column
 * @method     ChildMountainonisland findOneByIsland(string $Island) Return the first ChildMountainonisland filtered by the Island column *

 * @method     ChildMountainonisland requirePk($key, ConnectionInterface $con = null) Return the ChildMountainonisland by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMountainonisland requireOne(ConnectionInterface $con = null) Return the first ChildMountainonisland matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMountainonisland requireOneByMountain(string $Mountain) Return the first ChildMountainonisland filtered by the Mountain column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMountainonisland requireOneByIsland(string $Island) Return the first ChildMountainonisland filtered by the Island column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMountainonisland[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMountainonisland objects based on current ModelCriteria
 * @method     ChildMountainonisland[]|ObjectCollection findByMountain(string $Mountain) Return ChildMountainonisland objects filtered by the Mountain column
 * @method     ChildMountainonisland[]|ObjectCollection findByIsland(string $Island) Return ChildMountainonisland objects filtered by the Island column
 * @method     ChildMountainonisland[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MountainonislandQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\MountainonislandQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Mountainonisland', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMountainonislandQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMountainonislandQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMountainonislandQuery) {
            return $criteria;
        }
        $query = new ChildMountainonislandQuery();
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
     * @param array[$Mountain, $Island] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildMountainonisland|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MountainonislandTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MountainonislandTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildMountainonisland A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Mountain, Island FROM MountainOnIsland WHERE Mountain = :p0 AND Island = :p1';
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
            /** @var ChildMountainonisland $obj */
            $obj = new ChildMountainonisland();
            $obj->hydrate($row);
            MountainonislandTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildMountainonisland|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMountainonislandQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(MountainonislandTableMap::COL_MOUNTAIN, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(MountainonislandTableMap::COL_ISLAND, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMountainonislandQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(MountainonislandTableMap::COL_MOUNTAIN, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(MountainonislandTableMap::COL_ISLAND, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the Mountain column
     *
     * Example usage:
     * <code>
     * $query->filterByMountain('fooValue');   // WHERE Mountain = 'fooValue'
     * $query->filterByMountain('%fooValue%', Criteria::LIKE); // WHERE Mountain LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mountain The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMountainonislandQuery The current query, for fluid interface
     */
    public function filterByMountain($mountain = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mountain)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MountainonislandTableMap::COL_MOUNTAIN, $mountain, $comparison);
    }

    /**
     * Filter the query on the Island column
     *
     * Example usage:
     * <code>
     * $query->filterByIsland('fooValue');   // WHERE Island = 'fooValue'
     * $query->filterByIsland('%fooValue%', Criteria::LIKE); // WHERE Island LIKE '%fooValue%'
     * </code>
     *
     * @param     string $island The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMountainonislandQuery The current query, for fluid interface
     */
    public function filterByIsland($island = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($island)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MountainonislandTableMap::COL_ISLAND, $island, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMountainonisland $mountainonisland Object to remove from the list of results
     *
     * @return $this|ChildMountainonislandQuery The current query, for fluid interface
     */
    public function prune($mountainonisland = null)
    {
        if ($mountainonisland) {
            $this->addCond('pruneCond0', $this->getAliasedColName(MountainonislandTableMap::COL_MOUNTAIN), $mountainonisland->getMountain(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(MountainonislandTableMap::COL_ISLAND), $mountainonisland->getIsland(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the MountainOnIsland table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MountainonislandTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MountainonislandTableMap::clearInstancePool();
            MountainonislandTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MountainonislandTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MountainonislandTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MountainonislandTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MountainonislandTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MountainonislandQuery
