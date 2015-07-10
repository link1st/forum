import MySQLdb
import argparse
import json

if __name__=='__main__':        
    option_parser = argparse.ArgumentParser()
    
    option_parser.add_argument("--user_name")    
    option_parser.add_argument("--user_password")
    option_parser.add_argument("--email")
    
    options = option_parser.parse_args()
    
    if options.user_name==None or options.user_password==None or options.email==None:
        option_parser.print_help()     
        exit(32)
        
    user_name = options.user_name
    user_password = options.user_password
    email = options.email
    
    # Create connection
    conn1 = MySQLdb.connect(user="root", host="localhost", passwd="user", db="demo_forum")
    cursor1 = conn1.cursor()
    sqlstr1 = """
        Insert Into users 
        (user_name, user_password, email)
        values
        (%s, %s, %s)
    """
    cursor1.execute(sqlstr1, (user_name, user_password, email))
    conn1.commit()
    
    ret_list = [0]
    print json.dumps(ret_list)