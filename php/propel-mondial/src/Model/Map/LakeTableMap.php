<?php

namespace Model\Map;

use Model\Lake;
use Model\LakeQuery;
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
 * This class defines the structure of the 'Lake' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class LakeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Map.LakeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Lake';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Lake';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Lake';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the Name field
     */
    const COL_NAME = 'Lake.Name';

    /**
     * the column name for the Area field
     */
    const COL_AREA = 'Lake.Area';

    /**
     * the column name for the Depth field
     */
    const COL_DEPTH = 'Lake.Depth';

    /**
     * the column name for the Altitude field
     */
    const COL_ALTITUDE = 'Lake.Altitude';

    /**
     * the column name for the Type field
     */
    const COL_TYPE = 'Lake.Type';

    /**
     * the column name for the River field
     */
    const COL_RIVER = 'Lake.River';

    /**
     * the column name for the Longitude field
     */
    const COL_LONGITUDE = 'Lake.Longitude';

    /**
     * the column name for the Latitude field
     */
    const COL_LATITUDE = 'Lake.Latitude';

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
        self::TYPE_PHPNAME       => array('Name', 'Area', 'Depth', 'Altitude', 'Type', 'River', 'Longitude', 'Latitude', ),
        self::TYPE_CAMELNAME     => array('name', 'area', 'depth', 'altitude', 'type', 'river', 'longitude', 'latitude', ),
        self::TYPE_COLNAME       => array(LakeTableMap::COL_NAME, LakeTableMap::COL_AREA, LakeTableMap::COL_DEPTH, LakeTableMap::COL_ALTITUDE, LakeTableMap::COL_TYPE, LakeTableMap::COL_RIVER, LakeTableMap::COL_LONGITUDE, LakeTableMap::COL_LATITUDE, ),
        self::TYPE_FIELDNAME     => array('Name', 'Area', 'Depth', 'Altitude', 'Type', 'River', 'Longitude', 'Latitude', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Name' => 0, 'Area' => 1, 'Depth' => 2, 'Altitude' => 3, 'Type' => 4, 'River' => 5, 'Longitude' => 6, 'Latitude' => 7, ),
        self::TYPE_CAMELNAME     => array('name' => 0, 'area' => 1, 'depth' => 2, 'altitude' => 3, 'type' => 4, 'river' => 5, 'longitude' => 6, 'latitude' => 7, ),
        self::TYPE_COLNAME       => array(LakeTableMap::COL_NAME => 0, LakeTableMap::COL_AREA => 1, LakeTableMap::COL_DEPTH => 2, LakeTableMap::COL_ALTITUDE => 3, LakeTableMap::COL_TYPE => 4, LakeTableMap::COL_RIVER => 5, LakeTableMap::COL_LONGITUDE => 6, LakeTableMap::COL_LATITUDE => 7, ),
        self::TYPE_FIELDNAME     => array('Name' => 0, 'Area' => 1, 'Depth' => 2, 'Altitude' => 3, 'Type' => 4, 'River' => 5, 'Longitude' => 6, 'Latitude' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('Lake');
        $this->setPhpName('Lake');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Lake');
        $this->setPackage('Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('Name', 'Name', 'VARCHAR', true, 35, '');
        $this->addColumn('Area', 'Area', 'FLOAT', false, null, null);
        $this->addColumn('Depth', 'Depth', 'FLOAT', false, null, null);
        $this->addColumn('Altitude', 'Altitude', 'FLOAT', false, null, null);
        $this->addColumn('Type', 'Type', 'VARCHAR', false, 10, null);
        $this->addColumn('River', 'River', 'VARCHAR', false, 35, null);
        $this->addColumn('Longitude', 'Longitude', 'FLOAT', false, null, null);
        $this->addColumn('Latitude', 'Latitude', 'FLOAT', false, null, null);
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
        return $withPrefix ? LakeTableMap::CLASS_DEFAULT : LakeTableMap::OM_CLASS;
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
     * @return array           (Lake object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = LakeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = LakeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + LakeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = LakeTableMap::OM_CLASS;
            /** @var Lake $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            LakeTableMap::addInstanceToPool($obj, $key);
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
            $key = LakeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = LakeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Lake $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                LakeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(LakeTableMap::COL_NAME);
            $criteria->addSelectColumn(LakeTableMap::COL_AREA);
            $criteria->addSelectColumn(LakeTableMap::COL_DEPTH);
            $criteria->addSelectColumn(LakeTableMap::COL_ALTITUDE);
            $criteria->addSelectColumn(LakeTableMap::COL_TYPE);
            $criteria->addSelectColumn(LakeTableMap::COL_RIVER);
            $criteria->addSelectColumn(LakeTableMap::COL_LONGITUDE);
            $criteria->addSelectColumn(LakeTableMap::COL_LATITUDE);
        } else {
            $criteria->addSelectColumn($alias . '.Name');
            $criteria->addSelectColumn($alias . '.Area');
            $criteria->addSelectColumn($alias . '.Depth');
            $criteria->addSelectColumn($alias . '.Altitude');
            $criteria->addSelectColumn($alias . '.Type');
            $criteria->addSelectColumn($alias . '.River');
            $criteria->addSelectColumn($alias . '.Longitude');
            $criteria->addSelectColumn($alias . '.Latitude');
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
        return Propel::getServiceContainer()->getDatabaseMap(LakeTableMap::DATABASE_NAME)->getTable(LakeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(LakeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(LakeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new LakeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Lake or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Lake object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(LakeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Lake) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(LakeTableMap::DATABASE_NAME);
            $criteria->add(LakeTableMap::COL_NAME, (array) $values, Criteria::IN);
        }

        $query = LakeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            LakeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                LakeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Lake table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return LakeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Lake or Criteria object.
     *
     * @param mixed               $criteria Criteria or Lake object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LakeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Lake object
        }


        // Set the correct dbName
        $query = LakeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // LakeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
LakeTableMap::buildTableMap();
