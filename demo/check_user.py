import MySQLdb
import argparse
import json

if __name__=='__main__':        
    option_parser = argparse.ArgumentParser()
    
    option_parser.add_argument("--user_password")
    option_parser.add_argument("--email")
    
    options = option_parser.parse_args()
    
    if options.user_password==None or options.email==None:
        option_parser.print_help()     
        exit(32)
        
    user_password = options.user_password
    email = options.email
    
    # Create connection
    conn1 = MySQLdb.connect(user="root", host="localhost", passwd="user", db="demo_forum")
    cursor1 = conn1.cursor(MySQLdb.cursors.DictCursor)
    sqlstr1 = """
        select * from users where email=%s and user_password=%s
    """
    cursor1.execute(sqlstr1, (email, user_password))
    row1 = cursor1.fetchone()
    
    ret_list = [0]    
    if row1 != None:
        ret_list.append(row1["user_id"])
        ret_list.append(row1["user_name"])
    else:
        ret_list = [1]
    print json.dumps(ret_list)