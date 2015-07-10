import MySQLdb
import json

import argparse

if __name__=='__main__':        
    option_parser = argparse.ArgumentParser()
    
    option_parser.add_argument("--parent_id")
    
    options = option_parser.parse_args()
    
    if options.parent_id==None:
        option_parser.print_help()     
        exit(32)
        
    parent_id = options.parent_id
       

    # Create connection
    conn1 = MySQLdb.connect(user="root", host="localhost", passwd="user", db="demo_forum")
    cursor1 = conn1.cursor(MySQLdb.cursors.DictCursor)
    sqlstr1 = """
        select * from posts where parent_id=%s
    """
    cursor1.execute(sqlstr1, (parent_id, ))
    rows1 = cursor1.fetchall()
    
    post_list = []
    for row1 in rows1:
        post_info = [row1["post_id"], row1["title"], row1["content"], row1["create_date"], row1["parent_id"], row1["user_name"]]
        post_list.append(post_info)
       
    print json.dumps(post_list)