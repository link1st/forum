import MySQLdb

conn1 = MySQLdb.connect(user="root", host="localhost", passwd="user")
cursor1 = conn1.cursor()
sqlstr1 = "CREATE DATABASE demo_forum"
cursor1.execute(sqlstr1)
print "Create database done"