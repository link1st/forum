import argparse

if __name__=='__main__':        
    option_parser = argparse.ArgumentParser()
    
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
    create_date = options.create_date
    
    print post_id
    print title
    print content
    print create_date