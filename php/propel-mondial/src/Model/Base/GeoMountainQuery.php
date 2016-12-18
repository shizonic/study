<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\GeoMountain as ChildGeoMountain;
use Model\GeoMountainQuery as ChildGeoMountainQuery;
use Model\Map\GeoMountainTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'geo_Mountain' table.
 *
 *
 *
 * @method     ChildGeoMountainQuery orderByMountain($order = Criteria::ASC) Order by the Mountain column
 * @method     ChildGeoMountainQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ChildGeoMountainQuery orderByProvince($order = Criteria::ASC) Order by the Province column
 *
 * @method     ChildGeoMountainQuery groupByMountain() Group by the Mountain column
 * @method     ChildGeoMountainQuery groupByCountry() Group by the Country column
 * @method     ChildGeoMountainQuery groupByProvince() Group by the Province column
 *
 * @method     ChildGeoMountainQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGeoMountainQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGeoMountainQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGeoMountainQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGeoMountainQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGeoMountainQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGeoMountain findOne(ConnectionInterface $con = null) Return the first ChildGeoMountain matching the query
 * @method     ChildGeoMountain findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGeoMountain matching the query, or a new ChildGeoMountain object populated from the query conditions when no match is found
 *
 * @method     ChildGeoMountain findOneByMountain(string $Mountain) Return the first ChildGeoMountain filtered by the Mountain column
 * @method     ChildGeoMountain findOneByCountry(string $Country) Return the first ChildGeoMountain filtered by the Country column
 * @method     ChildGeoMountain findOneByProvince(string $Province) Return the first ChildGeoMountain filtered by the Province column *

 * @method     ChildGeoMountain requirePk($key, ConnectionInterface $con = null) Return the ChildGeoMountain by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeoMountain requireOne(ConnectionInterface $con = null) Return the first ChildGeoMountain matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGeoMountain requireOneByMountain(string $Mountain) Return the first ChildGeoMountain filtered by the Mountain column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeoMountain requireOneByCountry(string $Country) Return the first ChildGeoMountain filtered by the Country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeoMountain requireOneByProvince(string $Province) Return the first ChildGeoMountain filtered by the Province column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGeoMountain[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGeoMountain objects based on current ModelCriteria
 * @method     ChildGeoMountain[]|ObjectCollection findByMountain(string $Mountain) Return ChildGeoMountain objects filtered by the Mountain column
 * @method     ChildGeoMountain[]|ObjectCollection findByCountry(string $Country) Return ChildGeoMountain objects filtered by the Country column
 * @method     ChildGeoMountain[]|ObjectCollection findByProvince(string $Province) Return ChildGeoMountain objects filtered by the Province column
 * @method     ChildGeoMountain[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GeoMountainQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\GeoMountainQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\GeoMountain', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGeoMountainQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGeoMountainQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGeoMountainQuery) {
            return $criteria;
        }
        $query = new ChildGeoMountainQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$Mountain, $Country, $Province] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildGeoMountain|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GeoMountainTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GeoMountainTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildGeoMountain A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Mountain, Country, Province FROM geo_Mountain WHERE Mountain = :p0 AND Country = :p1 AND Province = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildGeoMountain $obj */
            $obj = new ChildGeoMountain();
            $obj->hydrate($row);
            GeoMountainTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildGeoMountain|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildGeoMountainQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(GeoMountainTableMap::COL_MOUNTAIN, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(GeoMountainTableMap::COL_COUNTRY, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(GeoMountainTableMap::COL_PROVINCE, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGeoMountainQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(GeoMountainTableMap::COL_MOUNTAIN, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(GeoMountainTableMap::COL_COUNTRY, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(GeoMountainTableMap::COL_PROVINCE, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
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
     * @return $this|ChildGeoMountainQuery The current query, for fluid interface
     */
    public function filterByMountain($mountain = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mountain)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeoMountainTableMap::COL_MOUNTAIN, $mountain, $comparison);
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
     * @return $this|ChildGeoMountainQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeoMountainTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the Province column
     *
     * Example usage:
     * <code>
     * $query->filterByProvince('fooValue');   // WHERE Province = 'fooValue'
     * $query->filterByProvince('%fooValue%', Criteria::LIKE); // WHERE Province LIKE '%fooValue%'
     * </code>
     *
     * @param     string $province The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeoMountainQuery The current query, for fluid interface
     */
    public function filterByProvince($province = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($province)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeoMountainTableMap::COL_PROVINCE, $province, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGeoMountain $geoMountain Object to remove from the list of results
     *
     * @return $this|ChildGeoMountainQuery The current query, for fluid interface
     */
    public function prune($geoMountain = null)
    {
        if ($geoMountain) {
            $this->addCond('pruneCond0', $this->getAliasedColName(GeoMountainTableMap::COL_MOUNTAIN), $geoMountain->getMountain(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(GeoMountainTableMap::COL_COUNTRY), $geoMountain->getCountry(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(GeoMountainTableMap::COL_PROVINCE), $geoMountain->getProvince(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the geo_Mountain table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GeoMountainTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GeoMountainTableMap::clearInstancePool();
            GeoMountainTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(GeoMountainTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GeoMountainTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GeoMountainTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GeoMountainTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GeoMountainQuery
