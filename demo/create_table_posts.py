import MySQLdb

# Create connection
conn1 = MySQLdb.connect(user="root", host="localhost", passwd="user", db="demo_forum")
cursor1 = conn1.cursor()
sqlstr1 = """CREATE TABLE posts (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `create_date` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  PRIMARY KEY (`post_id`)
) """
cursor1.execute(sqlstr1)
print "Create table posts done"