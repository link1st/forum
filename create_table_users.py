import MySQLdb

# Create connection
conn1 = MySQLdb.connect(user="root", host="localhost", passwd="user", db="forums")
cursor1 = conn1.cursor()
sqlstr1 = """CREATE TABLE users (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) """
cursor1.execute(sqlstr1)
print "Create table users done"