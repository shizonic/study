<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Organization as ChildOrganization;
use Model\OrganizationQuery as ChildOrganizationQuery;
use Model\Map\OrganizationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Organization' table.
 *
 *
 *
 * @method     ChildOrganizationQuery orderByAbbreviation($order = Criteria::ASC) Order by the Abbreviation column
 * @method     ChildOrganizationQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildOrganizationQuery orderByCity($order = Criteria::ASC) Order by the City column
 * @method     ChildOrganizationQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ChildOrganizationQuery orderByProvince($order = Criteria::ASC) Order by the Province column
 * @method     ChildOrganizationQuery orderByEstablished($order = Criteria::ASC) Order by the Established column
 *
 * @method     ChildOrganizationQuery groupByAbbreviation() Group by the Abbreviation column
 * @method     ChildOrganizationQuery groupByName() Group by the Name column
 * @method     ChildOrganizationQuery groupByCity() Group by the City column
 * @method     ChildOrganizationQuery groupByCountry() Group by the Country column
 * @method     ChildOrganizationQuery groupByProvince() Group by the Province column
 * @method     ChildOrganizationQuery groupByEstablished() Group by the Established column
 *
 * @method     ChildOrganizationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrganizationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrganizationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrganizationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrganizationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrganizationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrganization findOne(ConnectionInterface $con = null) Return the first ChildOrganization matching the query
 * @method     ChildOrganization findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrganization matching the query, or a new ChildOrganization object populated from the query conditions when no match is found
 *
 * @method     ChildOrganization findOneByAbbreviation(string $Abbreviation) Return the first ChildOrganization filtered by the Abbreviation column
 * @method     ChildOrganization findOneByName(string $Name) Return the first ChildOrganization filtered by the Name column
 * @method     ChildOrganization findOneByCity(string $City) Return the first ChildOrganization filtered by the City column
 * @method     ChildOrganization findOneByCountry(string $Country) Return the first ChildOrganization filtered by the Country column
 * @method     ChildOrganization findOneByProvince(string $Province) Return the first ChildOrganization filtered by the Province column
 * @method     ChildOrganization findOneByEstablished(string $Established) Return the first ChildOrganization filtered by the Established column *

 * @method     ChildOrganization requirePk($key, ConnectionInterface $con = null) Return the ChildOrganization by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrganization requireOne(ConnectionInterface $con = null) Return the first ChildOrganization matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrganization requireOneByAbbreviation(string $Abbreviation) Return the first ChildOrganization filtered by the Abbreviation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrganization requireOneByName(string $Name) Return the first ChildOrganization filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrganization requireOneByCity(string $City) Return the first ChildOrganization filtered by the City column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrganization requireOneByCountry(string $Country) Return the first ChildOrganization filtered by the Country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrganization requireOneByProvince(string $Province) Return the first ChildOrganization filtered by the Province column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrganization requireOneByEstablished(string $Established) Return the first ChildOrganization filtered by the Established column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrganization[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOrganization objects based on current ModelCriteria
 * @method     ChildOrganization[]|ObjectCollection findByAbbreviation(string $Abbreviation) Return ChildOrganization objects filtered by the Abbreviation column
 * @method     ChildOrganization[]|ObjectCollection findByName(string $Name) Return ChildOrganization objects filtered by the Name column
 * @method     ChildOrganization[]|ObjectCollection findByCity(string $City) Return ChildOrganization objects filtered by the City column
 * @method     ChildOrganization[]|ObjectCollection findByCountry(string $Country) Return ChildOrganization objects filtered by the Country column
 * @method     ChildOrganization[]|ObjectCollection findByProvince(string $Province) Return ChildOrganization objects filtered by the Province column
 * @method     ChildOrganization[]|ObjectCollection findByEstablished(string $Established) Return ChildOrganization objects filtered by the Established column
 * @method     ChildOrganization[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrganizationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\OrganizationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Organization', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrganizationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrganizationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOrganizationQuery) {
            return $criteria;
        }
        $query = new ChildOrganizationQuery();
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
     * @return ChildOrganization|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrganizationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrganizationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOrganization A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Abbreviation, Name, City, Country, Province, Established FROM Organization WHERE Abbreviation = :p0';
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
            /** @var ChildOrganization $obj */
            $obj = new ChildOrganization();
            $obj->hydrate($row);
            OrganizationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOrganization|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOrganizationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrganizationTableMap::COL_ABBREVIATION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOrganizationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrganizationTableMap::COL_ABBREVIATION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Abbreviation column
     *
     * Example usage:
     * <code>
     * $query->filterByAbbreviation('fooValue');   // WHERE Abbreviation = 'fooValue'
     * $query->filterByAbbreviation('%fooValue%', Criteria::LIKE); // WHERE Abbreviation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $abbreviation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrganizationQuery The current query, for fluid interface
     */
    public function filterByAbbreviation($abbreviation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($abbreviation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganizationTableMap::COL_ABBREVIATION, $abbreviation, $comparison);
    }

    /**
     * Filter the query on the Name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE Name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE Name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrganizationQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganizationTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the City column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE City = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE City LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrganizationQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganizationTableMap::COL_CITY, $city, $comparison);
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
     * @return $this|ChildOrganizationQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganizationTableMap::COL_COUNTRY, $country, $comparison);
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
     * @return $this|ChildOrganizationQuery The current query, for fluid interface
     */
    public function filterByProvince($province = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($province)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganizationTableMap::COL_PROVINCE, $province, $comparison);
    }

    /**
     * Filter the query on the Established column
     *
     * Example usage:
     * <code>
     * $query->filterByEstablished('2011-03-14'); // WHERE Established = '2011-03-14'
     * $query->filterByEstablished('now'); // WHERE Established = '2011-03-14'
     * $query->filterByEstablished(array('max' => 'yesterday')); // WHERE Established > '2011-03-13'
     * </code>
     *
     * @param     mixed $established The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrganizationQuery The current query, for fluid interface
     */
    public function filterByEstablished($established = null, $comparison = null)
    {
        if (is_array($established)) {
            $useMinMax = false;
            if (isset($established['min'])) {
                $this->addUsingAlias(OrganizationTableMap::COL_ESTABLISHED, $established['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($established['max'])) {
                $this->addUsingAlias(OrganizationTableMap::COL_ESTABLISHED, $established['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganizationTableMap::COL_ESTABLISHED, $established, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrganization $organization Object to remove from the list of results
     *
     * @return $this|ChildOrganizationQuery The current query, for fluid interface
     */
    public function prune($organization = null)
    {
        if ($organization) {
            $this->addUsingAlias(OrganizationTableMap::COL_ABBREVIATION, $organization->getAbbreviation(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Organization table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrganizationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrganizationTableMap::clearInstancePool();
            OrganizationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrganizationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrganizationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrganizationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrganizationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OrganizationQuery
