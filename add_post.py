import MySQLdb
import argparse
import json

if __name__=='__main__':        
    option_parser = argparse.ArgumentParser()
    
    option_parser.add_argument("--parent_id")
    option_parser.add_argument("--title")    
    option_parser.add_argument("--content")
    option_parser.add_argument("--create_date")
    option_parser.add_argument("--user_name")
    
    options = option_parser.parse_args()
    
    if options.parent_id==None or options.title==None or options.content==None or \
       options.create_date==None or options.user_name==None:
        option_parser.print_help()     
        exit(32)
        
    parent_id = options.parent_id
    title = options.title
    content = options.content
    create_date = options.create_date
    user_name = options.user_name
    
    # Create connection
    conn1 = MySQLdb.connect(user="root", host="localhost", passwd="user", db="forums")
    cursor1 = conn1.cursor()
    sqlstr1 = """
        Insert Into posts 
        (title, content, create_date, parent_id, user_name)
        values
        (%s, %s, %s, %s, %s)
    """
    cursor1.execute(sqlstr1, (title, content, create_date, parent_id, user_name))
    conn1.commit()
    
    ret_list = [0]
    print json.dumps(ret_list)