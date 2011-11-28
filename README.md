## simple Read Firefox backup json bookmark with PHP ##

this tool support cli and web both:

  with cli : php readbookmark.php > bookmark.txt    "This will echo with <bookmark-title> -> <bookmark-url>"
  whit web : http://example.com/path/to/script/readbookmark.php    "This will echo with html tag: <a href=<bookmark-url> > <bookmark-title> </a>"

  this is a simple script for fast read json backup file, some bug I will fix if I'm not too busy. If you want push your request, just email me !

## Futures ##
  
  This script will support upload file like this:
    
    with cli : php readbookmark.php <json-file-url> > bookmark.txt
    with web : http://example.com/path/to/script/readbookmark.php   "UPLOAD a local file or UP a url and will return bookmark with html tag"
