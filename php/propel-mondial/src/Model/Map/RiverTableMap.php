<?php

namespace Model\Map;

use Model\River;
use Model\RiverQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'River' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RiverTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Map.RiverTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'River';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\River';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.River';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the Name field
     */
    const COL_NAME = 'River.Name';

    /**
     * the column name for the River field
     */
    const COL_RIVER = 'River.River';

    /**
     * the column name for the Lake field
     */
    const COL_LAKE = 'River.Lake';

    /**
     * the column name for the Sea field
     */
    const COL_SEA = 'River.Sea';

    /**
     * the column name for the Length field
     */
    const COL_LENGTH = 'River.Length';

    /**
     * the column name for the SourceLongitude field
     */
    const COL_SOURCELONGITUDE = 'River.SourceLongitude';

    /**
     * the column name for the SourceLatitude field
     */
    const COL_SOURCELATITUDE = 'River.SourceLatitude';

    /**
     * the column name for the Mountains field
     */
    const COL_MOUNTAINS = 'River.Mountains';

    /**
     * the column name for the SourceAltitude field
     */
    const COL_SOURCEALTITUDE = 'River.SourceAltitude';

    /**
     * the column name for the EstuaryLongitude field
     */
    const COL_ESTUARYLONGITUDE = 'River.EstuaryLongitude';

    /**
     * the column name for the EstuaryLatitude field
     */
    const COL_ESTUARYLATITUDE = 'River.EstuaryLatitude';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Name', 'River', 'Lake', 'Sea', 'Length', 'Sourcelongitude', 'Sourcelatitude', 'Mountains', 'Sourcealtitude', 'Estuarylongitude', 'Estuarylatitude', ),
        self::TYPE_CAMELNAME     => array('name', 'river', 'lake', 'sea', 'length', 'sourcelongitude', 'sourcelatitude', 'mountains', 'sourcealtitude', 'estuarylongitude', 'estuarylatitude', ),
        self::TYPE_COLNAME       => array(RiverTableMap::COL_NAME, RiverTableMap::COL_RIVER, RiverTableMap::COL_LAKE, RiverTableMap::COL_SEA, RiverTableMap::COL_LENGTH, RiverTableMap::COL_SOURCELONGITUDE, RiverTableMap::COL_SOURCELATITUDE, RiverTableMap::COL_MOUNTAINS, RiverTableMap::COL_SOURCEALTITUDE, RiverTableMap::COL_ESTUARYLONGITUDE, RiverTableMap::COL_ESTUARYLATITUDE, ),
        self::TYPE_FIELDNAME     => array('Name', 'River', 'Lake', 'Sea', 'Length', 'SourceLongitude', 'SourceLatitude', 'Mountains', 'SourceAltitude', 'EstuaryLongitude', 'EstuaryLatitude', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Name' => 0, 'River' => 1, 'Lake' => 2, 'Sea' => 3, 'Length' => 4, 'Sourcelongitude' => 5, 'Sourcelatitude' => 6, 'Mountains' => 7, 'Sourcealtitude' => 8, 'Estuarylongitude' => 9, 'Estuarylatitude' => 10, ),
        self::TYPE_CAMELNAME     => array('name' => 0, 'river' => 1, 'lake' => 2, 'sea' => 3, 'length' => 4, 'sourcelongitude' => 5, 'sourcelatitude' => 6, 'mountains' => 7, 'sourcealtitude' => 8, 'estuarylongitude' => 9, 'estuarylatitude' => 10, ),
        self::TYPE_COLNAME       => array(RiverTableMap::COL_NAME => 0, RiverTableMap::COL_RIVER => 1, RiverTableMap::COL_LAKE => 2, RiverTableMap::COL_SEA => 3, RiverTableMap::COL_LENGTH => 4, RiverTableMap::COL_SOURCELONGITUDE => 5, RiverTableMap::COL_SOURCELATITUDE => 6, RiverTableMap::COL_MOUNTAINS => 7, RiverTableMap::COL_SOURCEALTITUDE => 8, RiverTableMap::COL_ESTUARYLONGITUDE => 9, RiverTableMap::COL_ESTUARYLATITUDE => 10, ),
        self::TYPE_FIELDNAME     => array('Name' => 0, 'River' => 1, 'Lake' => 2, 'Sea' => 3, 'Length' => 4, 'SourceLongitude' => 5, 'SourceLatitude' => 6, 'Mountains' => 7, 'SourceAltitude' => 8, 'EstuaryLongitude' => 9, 'EstuaryLatitude' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('River');
        $this->setPhpName('River');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\River');
        $this->setPackage('Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('Name', 'Name', 'VARCHAR', true, 35, '');
        $this->addColumn('River', 'River', 'VARCHAR', false, 35, null);
        $this->addColumn('Lake', 'Lake', 'VARCHAR', false, 35, null);
        $this->addColumn('Sea', 'Sea', 'VARCHAR', false, 35, null);
        $this->addColumn('Length', 'Length', 'FLOAT', false, null, null);
        $this->addColumn('SourceLongitude', 'Sourcelongitude', 'FLOAT', false, null, null);
        $this->addColumn('SourceLatitude', 'Sourcelatitude', 'FLOAT', false, null, null);
        $this->addColumn('Mountains', 'Mountains', 'VARCHAR', false, 35, null);
        $this->addColumn('SourceAltitude', 'Sourcealtitude', 'FLOAT', false, null, null);
        $this->addColumn('EstuaryLongitude', 'Estuarylongitude', 'FLOAT', false, null, null);
        $this->addColumn('EstuaryLatitude', 'Estuarylatitude', 'FLOAT', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? RiverTableMap::CLASS_DEFAULT : RiverTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (River object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RiverTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RiverTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RiverTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RiverTableMap::OM_CLASS;
            /** @var River $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RiverTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = RiverTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RiverTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var River $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RiverTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(RiverTableMap::COL_NAME);
            $criteria->addSelectColumn(RiverTableMap::COL_RIVER);
            $criteria->addSelectColumn(RiverTableMap::COL_LAKE);
            $criteria->addSelectColumn(RiverTableMap::COL_SEA);
            $criteria->addSelectColumn(RiverTableMap::COL_LENGTH);
            $criteria->addSelectColumn(RiverTableMap::COL_SOURCELONGITUDE);
            $criteria->addSelectColumn(RiverTableMap::COL_SOURCELATITUDE);
            $criteria->addSelectColumn(RiverTableMap::COL_MOUNTAINS);
            $criteria->addSelectColumn(RiverTableMap::COL_SOURCEALTITUDE);
            $criteria->addSelectColumn(RiverTableMap::COL_ESTUARYLONGITUDE);
            $criteria->addSelectColumn(RiverTableMap::COL_ESTUARYLATITUDE);
        } else {
            $criteria->addSelectColumn($alias . '.Name');
            $criteria->addSelectColumn($alias . '.River');
            $criteria->addSelectColumn($alias . '.Lake');
            $criteria->addSelectColumn($alias . '.Sea');
            $criteria->addSelectColumn($alias . '.Length');
            $criteria->addSelectColumn($alias . '.SourceLongitude');
            $criteria->addSelectColumn($alias . '.SourceLatitude');
            $criteria->addSelectColumn($alias . '.Mountains');
            $criteria->addSelectColumn($alias . '.SourceAltitude');
            $criteria->addSelectColumn($alias . '.EstuaryLongitude');
            $criteria->addSelectColumn($alias . '.EstuaryLatitude');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(RiverTableMap::DATABASE_NAME)->getTable(RiverTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RiverTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RiverTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RiverTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a River or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or River object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RiverTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\River) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RiverTableMap::DATABASE_NAME);
            $criteria->add(RiverTableMap::COL_NAME, (array) $values, Criteria::IN);
        }

        $query = RiverQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RiverTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RiverTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the River table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RiverQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a River or Criteria object.
     *
     * @param mixed               $criteria Criteria or River object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RiverTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from River object
        }


        // Set the correct dbName
        $query = RiverQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RiverTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RiverTableMap::buildTableMap();
