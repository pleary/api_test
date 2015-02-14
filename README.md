Test Apis
=========

## Description

All APIs run from $WEB_ROOT/api.php

There are two apis:

###show
Parameters:
 - title: the title of the article to fetch
 
###save
Parameters:
 - title: the title of the article to fetch
 - content: the new HTML of the article

Each API returns a JSON object representing the current revision of the article:
```
{
  "pageid": 12345,
  "revision_id": 10000,
  "title": "Latest plane crash",
  "content": "..."
}
```
