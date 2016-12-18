<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\GeoEstuary as ChildGeoEstuary;
use Model\GeoEstuaryQuery as ChildGeoEstuaryQuery;
use Model\Map\GeoEstuaryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'geo_Estuary' table.
 *
 *
 *
 * @method     ChildGeoEstuaryQuery orderByRiver($order = Criteria::ASC) Order by the River column
 * @method     ChildGeoEstuaryQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ChildGeoEstuaryQuery orderByProvince($order = Criteria::ASC) Order by the Province column
 *
 * @method     ChildGeoEstuaryQuery groupByRiver() Group by the River column
 * @method     ChildGeoEstuaryQuery groupByCountry() Group by the Country column
 * @method     ChildGeoEstuaryQuery groupByProvince() Group by the Province column
 *
 * @method     ChildGeoEstuaryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGeoEstuaryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGeoEstuaryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGeoEstuaryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGeoEstuaryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGeoEstuaryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGeoEstuary findOne(ConnectionInterface $con = null) Return the first ChildGeoEstuary matching the query
 * @method     ChildGeoEstuary findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGeoEstuary matching the query, or a new ChildGeoEstuary object populated from the query conditions when no match is found
 *
 * @method     ChildGeoEstuary findOneByRiver(string $River) Return the first ChildGeoEstuary filtered by the River column
 * @method     ChildGeoEstuary findOneByCountry(string $Country) Return the first ChildGeoEstuary filtered by the Country column
 * @method     ChildGeoEstuary findOneByProvince(string $Province) Return the first ChildGeoEstuary filtered by the Province column *

 * @method     ChildGeoEstuary requirePk($key, ConnectionInterface $con = null) Return the ChildGeoEstuary by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeoEstuary requireOne(ConnectionInterface $con = null) Return the first ChildGeoEstuary matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGeoEstuary requireOneByRiver(string $River) Return the first ChildGeoEstuary filtered by the River column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeoEstuary requireOneByCountry(string $Country) Return the first ChildGeoEstuary filtered by the Country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeoEstuary requireOneByProvince(string $Province) Return the first ChildGeoEstuary filtered by the Province column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGeoEstuary[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGeoEstuary objects based on current ModelCriteria
 * @method     ChildGeoEstuary[]|ObjectCollection findByRiver(string $River) Return ChildGeoEstuary objects filtered by the River column
 * @method     ChildGeoEstuary[]|ObjectCollection findByCountry(string $Country) Return ChildGeoEstuary objects filtered by the Country column
 * @method     ChildGeoEstuary[]|ObjectCollection findByProvince(string $Province) Return ChildGeoEstuary objects filtered by the Province column
 * @method     ChildGeoEstuary[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GeoEstuaryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\GeoEstuaryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\GeoEstuary', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGeoEstuaryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGeoEstuaryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGeoEstuaryQuery) {
            return $criteria;
        }
        $query = new ChildGeoEstuaryQuery();
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
     * @param array[$River, $Country, $Province] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildGeoEstuary|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GeoEstuaryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GeoEstuaryTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildGeoEstuary A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT River, Country, Province FROM geo_Estuary WHERE River = :p0 AND Country = :p1 AND Province = :p2';
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
            /** @var ChildGeoEstuary $obj */
            $obj = new ChildGeoEstuary();
            $obj->hydrate($row);
            GeoEstuaryTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildGeoEstuary|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildGeoEstuaryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(GeoEstuaryTableMap::COL_RIVER, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(GeoEstuaryTableMap::COL_COUNTRY, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(GeoEstuaryTableMap::COL_PROVINCE, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGeoEstuaryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(GeoEstuaryTableMap::COL_RIVER, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(GeoEstuaryTableMap::COL_COUNTRY, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(GeoEstuaryTableMap::COL_PROVINCE, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the River column
     *
     * Example usage:
     * <code>
     * $query->filterByRiver('fooValue');   // WHERE River = 'fooValue'
     * $query->filterByRiver('%fooValue%', Criteria::LIKE); // WHERE River LIKE '%fooValue%'
     * </code>
     *
     * @param     string $river The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeoEstuaryQuery The current query, for fluid interface
     */
    public function filterByRiver($river = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($river)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeoEstuaryTableMap::COL_RIVER, $river, $comparison);
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
     * @return $this|ChildGeoEstuaryQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeoEstuaryTableMap::COL_COUNTRY, $country, $comparison);
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
     * @return $this|ChildGeoEstuaryQuery The current query, for fluid interface
     */
    public function filterByProvince($province = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($province)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeoEstuaryTableMap::COL_PROVINCE, $province, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGeoEstuary $geoEstuary Object to remove from the list of results
     *
     * @return $this|ChildGeoEstuaryQuery The current query, for fluid interface
     */
    public function prune($geoEstuary = null)
    {
        if ($geoEstuary) {
            $this->addCond('pruneCond0', $this->getAliasedColName(GeoEstuaryTableMap::COL_RIVER), $geoEstuary->getRiver(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(GeoEstuaryTableMap::COL_COUNTRY), $geoEstuary->getCountry(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(GeoEstuaryTableMap::COL_PROVINCE), $geoEstuary->getProvince(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the geo_Estuary table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GeoEstuaryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GeoEstuaryTableMap::clearInstancePool();
            GeoEstuaryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(GeoEstuaryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GeoEstuaryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GeoEstuaryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GeoEstuaryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GeoEstuaryQuery
