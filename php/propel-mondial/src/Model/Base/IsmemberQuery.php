<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Ismember as ChildIsmember;
use Model\IsmemberQuery as ChildIsmemberQuery;
use Model\Map\IsmemberTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'isMember' table.
 *
 *
 *
 * @method     ChildIsmemberQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ChildIsmemberQuery orderByOrganization($order = Criteria::ASC) Order by the Organization column
 * @method     ChildIsmemberQuery orderByType($order = Criteria::ASC) Order by the Type column
 *
 * @method     ChildIsmemberQuery groupByCountry() Group by the Country column
 * @method     ChildIsmemberQuery groupByOrganization() Group by the Organization column
 * @method     ChildIsmemberQuery groupByType() Group by the Type column
 *
 * @method     ChildIsmemberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildIsmemberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildIsmemberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildIsmemberQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildIsmemberQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildIsmemberQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildIsmember findOne(ConnectionInterface $con = null) Return the first ChildIsmember matching the query
 * @method     ChildIsmember findOneOrCreate(ConnectionInterface $con = null) Return the first ChildIsmember matching the query, or a new ChildIsmember object populated from the query conditions when no match is found
 *
 * @method     ChildIsmember findOneByCountry(string $Country) Return the first ChildIsmember filtered by the Country column
 * @method     ChildIsmember findOneByOrganization(string $Organization) Return the first ChildIsmember filtered by the Organization column
 * @method     ChildIsmember findOneByType(string $Type) Return the first ChildIsmember filtered by the Type column *

 * @method     ChildIsmember requirePk($key, ConnectionInterface $con = null) Return the ChildIsmember by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIsmember requireOne(ConnectionInterface $con = null) Return the first ChildIsmember matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIsmember requireOneByCountry(string $Country) Return the first ChildIsmember filtered by the Country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIsmember requireOneByOrganization(string $Organization) Return the first ChildIsmember filtered by the Organization column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIsmember requireOneByType(string $Type) Return the first ChildIsmember filtered by the Type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIsmember[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildIsmember objects based on current ModelCriteria
 * @method     ChildIsmember[]|ObjectCollection findByCountry(string $Country) Return ChildIsmember objects filtered by the Country column
 * @method     ChildIsmember[]|ObjectCollection findByOrganization(string $Organization) Return ChildIsmember objects filtered by the Organization column
 * @method     ChildIsmember[]|ObjectCollection findByType(string $Type) Return ChildIsmember objects filtered by the Type column
 * @method     ChildIsmember[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class IsmemberQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\IsmemberQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Ismember', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildIsmemberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildIsmemberQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildIsmemberQuery) {
            return $criteria;
        }
        $query = new ChildIsmemberQuery();
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
     * @param array[$Country, $Organization] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildIsmember|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(IsmemberTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = IsmemberTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildIsmember A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Country, Organization, Type FROM isMember WHERE Country = :p0 AND Organization = :p1';
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
            /** @var ChildIsmember $obj */
            $obj = new ChildIsmember();
            $obj->hydrate($row);
            IsmemberTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildIsmember|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildIsmemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(IsmemberTableMap::COL_COUNTRY, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(IsmemberTableMap::COL_ORGANIZATION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildIsmemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(IsmemberTableMap::COL_COUNTRY, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(IsmemberTableMap::COL_ORGANIZATION, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildIsmemberQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IsmemberTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the Organization column
     *
     * Example usage:
     * <code>
     * $query->filterByOrganization('fooValue');   // WHERE Organization = 'fooValue'
     * $query->filterByOrganization('%fooValue%', Criteria::LIKE); // WHERE Organization LIKE '%fooValue%'
     * </code>
     *
     * @param     string $organization The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIsmemberQuery The current query, for fluid interface
     */
    public function filterByOrganization($organization = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($organization)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IsmemberTableMap::COL_ORGANIZATION, $organization, $comparison);
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
     * @return $this|ChildIsmemberQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IsmemberTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildIsmember $ismember Object to remove from the list of results
     *
     * @return $this|ChildIsmemberQuery The current query, for fluid interface
     */
    public function prune($ismember = null)
    {
        if ($ismember) {
            $this->addCond('pruneCond0', $this->getAliasedColName(IsmemberTableMap::COL_COUNTRY), $ismember->getCountry(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(IsmemberTableMap::COL_ORGANIZATION), $ismember->getOrganization(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the isMember table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IsmemberTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            IsmemberTableMap::clearInstancePool();
            IsmemberTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(IsmemberTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(IsmemberTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            IsmemberTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            IsmemberTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // IsmemberQuery
