# Aufgabe Scripting-Seminar
# Thomas Breuss
# 2017-01-07

import datetime
import mysql.connector
import sys


# Log messages
def log(message):
	f = open('log/output_py.log', 'a')
	f.write(message)
	f.write("\n")
	f.close()
	return

# Db connection
def db_connect():
	db = sys.argv[1]
	try:	
		db = mysql.connector.connect(host='localhost', db=db, user='root', passwd='root')
	except mysql.connector.Error as e:
		log("Error %s" % str(e))
		exit(-1)	
	return db

# Create roles ADMIN and USERS
def create_roles():
	success = True	
	cnx = db_connect()
	cursor = cnx.cursor()
	try:
		query = """
			INSERT INTO role (id, name, description) 
			VALUES (1, 'ADMIN', 'Administrator'), (2, 'USERS', 'User')
		"""
		cursor.execute(query)
		cnx.commit()
		log("Roles ADMIN and USERS created")
	except mysql.connector.Error as e:
		cnx.rollback()
		log("Error %s" % str(e))
		success = False		
	cursor.close()
	cnx.close()
	return success

# Count number of entries in table "role"
def count_roles():
	success = True
	cnx = db_connect()
	cursor = cnx.cursor()
	query = "SELECT count(*) AS c FROM role"
	cursor.execute(query)
	
	count = cursor.fetchone()[0]
	if count == 2:
		log("Number of roles is 2")
	else:
		log("Error: Number of roles is wrong")
		success = False

	return success

# Insert user with role
def create_user_with_role():
	success = True
	cnx = db_connect()
	cursor = cnx.cursor()
	try:
		query = """
			INSERT INTO app_user (id, account_expired, email, first_name, last_name, password, username) 
			VALUES (1, 0, 'me@test.com', 'John', 'Doe', 'now#832', 'johndoe')
		"""
		cursor.execute(query)
		cnx.commit()
		log("User 'johndoe' created")
	except mysql.connector.Error as e:
		cnx.rollback()
		log("Error %s" % str(e))
		success = False		
	cursor.close()

	cursor = cnx.cursor()
	try:
		query = "INSERT INTO user_role (user_id, role_id) VALUES (1, 1)"
		cursor.execute(query)
		cnx.commit()
		log("Role for user 'johndoe' created")
	except mysql.connector.Error as e:
		cnx.rollback()
		log("Error %s" % str(e))
		success = False		
	cursor.close()

	cnx.close()
	return success

# Select all registered users with their roles
def show_users_with_role():

	cnx = db_connect()
	cursor = cnx.cursor()
	query = """
		SELECT username, first_name, last_name, email, role.name as role 
		FROM app_user 
		INNER JOIN user_role ON user_id = app_user.id 
		INNER JOIN role ON role.id = role_id
	"""
	cursor.execute(query)

	log("Show users with their role:")
	for (username, first_name, last_name, email, role) in cursor:
		log('{}, {}, {}, {}, {}'.format(username, first_name, last_name, email, role))
	return True	


# Test for database parameter
if len(sys.argv) <> 2:
	log("Parameter for database is missing")
	exit(-1)


log("------------------------------------------------------")
log('Script startet at {:%Y-%m-%d %H:%M}'.format(datetime.datetime.now()))

success = create_roles() & count_roles() & create_user_with_role() & show_users_with_role()

if success:
	exit(0)
else:
	exit(-1)
