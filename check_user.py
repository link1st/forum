import MySQLdb, json

import argparse

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
    conn1 = MySQLdb.connect(user="root", host="localhost", passwd="user", db="forums")
    cursor1 = conn1.cursor(MySQLdb.cursor.DictCursor)
    sqlstr1 = """
        select * from users where email=%s and user_password=%s
    """
    cursor1.execute(sqlstr1, (email, user_password))
    row1 = cursor1.fetchone()
    
    ret = {}
    if row1 != None:
        user_name = row1["user_name"]
        user_id = row1["user_id"]
        ret["user_name"] = user_name
        ret["msg"] = "Yes"
    else:
        ret["msg"] = No
        
    print json.dump(ret)