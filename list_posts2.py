import MySQLdb
import json

'''import argparse

if __name__=='__main__':        
    option_parser = argparse.ArgumentParser()
    
    option_parser.add_argument("--post_id")
    option_parser.add_argument("--title")    
    option_parser.add_argument("--content")
    option_parser.add_argument("--create_date")
    
    options = option_parser.parse_args()
    
    if options.post_id==None or options.title==None or options.content==None or \
       options.create_date==None:
        option_parser.print_help()     
        exit(32)
        
    post_id = options.post_id
    title = options.title
    content = options.content
    create_date = options.create_date
'''    

# Create connection
conn1 = MySQLdb.connect(user="root", host="localhost", passwd="user", db="forums")
cursor1 = conn1.cursor(MySQLdb.cursors.DictCursor)
sqlstr1 = """
    select * from posts
"""
cursor1.execute(sqlstr1)
rows1 = cursor1.fetchall()

post_list = []
for row1 in rows1:
   post_info = [row1["post_id"], row1["title"], row1["content"], row1["create_date"], row1["parent_id"], row1["user_name"]]
   post_list.append(post_info)
   
print json.dumps(post_list)