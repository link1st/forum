import argparse
import MySQLdb

import json

if __name__=='__main__':        
    '''option_parser = argparse.ArgumentParser()
    
    option_parser.add_argument("--post_id")
    option_parser.add_argument("--title")    
    option_parser.add_argument("--content")
    option_parser.add_argument("--create_date")
    
    options = option_parser.parse_args()
    
    if options.post_id==None or options.title==None or options.content==None or options.create_date==None:
        option_parser.print_help()     
        exit(32)
        
    post_id = options.post_id
    title = options.title
    content = options.content
    create_date = options.create_date'''
    
    result = []
    conn1 = MySQLdb.connect(host="localhost",user="root",passwd="user", db="forums")
    cursor1 = conn1.cursor(MySQLdb.cursors.DictCursor)
    sqlstr1 = 'select * from posts'
    cursor1.execute(sqlstr1)
    rows1 = cursor1.fetchall()
    for row1 in rows1:
        post_info = []
        post_info.append(row1["post_id"])
        post_info.append(row1["title"])
        post_info.append(row1["content"])
        post_info.append(row1["create_date"])
        result.append(post_info)
        
    print json.dumps(result)
     