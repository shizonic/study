# Aufgabe Scripting-Seminar
# Thomas Breuss
# 2017-01-07

clear

NOW=$(date "+%Y-%m-%d %H:%M:%S")
DATABASE=$1
export PATH=/Applications/MAMP/Library/bin/:$PATH

# Log messages
log() {
	echo "$1" >> ./log/output_sh.txt
}

# Create roles ADMIN and USERS
create_roles() {
	query="INSERT INTO role (id, name, description) 
		VALUES (1, 'ADMIN', 'Administrator'), (2, 'USERS', 'User')
	"
	mysql $DATABASE <<<${query} 2>> ./log/output_sh.txt
	log "Roles ADMIN and USERS created"
}

# Count number of entries in table "role"
count_roles() {
	count=$(echo "SELECT count(*) AS count FROM role" | 
	mysql -s -N $DATABASE  2>> ./log/output_sh.txt)
	if [ "${count}" -eq 2 ]; then	
		log "Number of roles is ${count}"
	else
		log "Number of roles is wrong"
	fi		
}

# Insert user with role
create_user_with_role() {
	query="
		INSERT INTO app_user (id, account_expired, email, first_name, last_name, password, username) 
		VALUES (1, 0, 'me@test.com', 'John', 'Doe', 'now#832', 'johndoe')
	"
	mysql $DATABASE <<<${query} 2>> ./log/output_sh.txt
	log "User 'johndoe' created"

	query="INSERT INTO user_role (user_id, role_id) VALUES (1, 1)"
	mysql $DATABASE <<<${query} 2>> ./log/output_sh.txt	
	log "Role for user 'johndoe' created"
}

# Select all registered users with their roles
show_users_with_role() {
	log "Show users with their role:"
	mysql $DATABASE -N -e "
		SELECT username, first_name, last_name, email, role.name as role 
		FROM app_user 
		INNER JOIN user_role ON user_id = app_user.id 
		INNER JOIN role ON role.id = role_id" | 
	while IFS=$'\t' read username first_name last_name email role; do
    	log "$username, $first_name $last_name, $email, $role"
	done
}

log "---------------------------------------------------"
log "Script startet at ${NOW}."

# Test for database parameter
if test $# = 0
then
	log "Parameter for database is missing"
	exit -1
fi

create_roles
if [ "$?" -ne 0 ]
then
	exit -1
fi

count_roles
if [ "$?" -ne 0 ]
then
	exit -1
fi

create_user_with_role
if [ "$?" -ne 0 ]
then
	exit -1
fi

show_users_with_role
if [ "$?" -ne 0 ]
then
	exit -1
fi

exit 0
