<?php

ini_set('display_errors', true);

// setup the autoloading
require_once __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/../src/config/db.php';
$adapter = new Zend\Db\Adapter\Adapter($config);


// Zend\Db\Adapter

echo '<h2>Zend\Db\Adapter</h2>';

$resultset = $adapter->query('SELECT * FROM article WHERE deleted=0 LIMIT 5', []);
foreach ($resultset as $result) {
  echo sprintf("%d - %s<br>", $result['id'], $result['title']);
}

$resultset = $adapter->query('SELECT * FROM article WHERE deleted=0 AND id = ?', [658]);
foreach ($resultset as $result) {
  echo sprintf("%d - %s<br>", $result['id'], $result['title']);
}

$resultset = $adapter->query('SELECT * FROM article WHERE deleted=0 AND id = ?', [660]);
foreach ($resultset as $result) {
  echo sprintf("%d - %s<br>", $result['id'], $result['title']);
}


// Zend\Db\Sql

echo '<h2>Zend\Db\Sql</h2>';

$sql = new Zend\Db\Sql\Sql($adapter);

$select = $sql->select(); // returns a Zend\Db\Sql\Select instance
$insert = $sql->insert(); // returns a Zend\Db\Sql\Insert instance
$update = $sql->update(); // returns a Zend\Db\Sql\Update instance
$delete = $sql->delete(); // returns a Zend\Db\Sql\Delete instance

$select->from('article');
$select->where(['deleted' => 0, 'categoryId' => 13]);
$select->limit(5);
$selectString = $sql->buildSqlString($select);
$resultset = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
foreach ($resultset as $result) {
  echo sprintf("%d - %s<br>", $result['id'], $result['title']);
}


// Zend\Db\TableGateway
echo '<h2>Zend\Db\TableGateway</h2>';

$articleTable = new Zend\Db\TableGateway\TableGateway('article', $adapter);
$rowset = $articleTable->select(['deleted' => 0, 'countryCode' => 'MX']);
foreach ($rowset as $row) {
  echo sprintf("%d - %s<br>", $row['id'], $row['title']);
}

$articleTable = new Zend\Db\TableGateway\TableGateway('article', $adapter);
$rowset = $articleTable->select(['deleted' => 0, 'id' => 848]);
$row = $rowset->current();
echo sprintf("%d - %s<br>", $row['id'], $row['title']);

// Search for at most 2 artists who's name starts with Brit, ascending:
/*
$articleTable = new Zend\Db\TableGateway\TableGateway('article', $adapter);
$rowset = $articleTable->select(function (Zend\Db\Sql\Select $select) {
    $select->where->like('title', 'Solo Bass%');
    $select->order('title ASC')->limit(2);
});
foreach ($rowset as $row) {
  echo sprintf("%d - %s<br>", $row['id'], $row['title']);
}
*/


exit;
