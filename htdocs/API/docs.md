# API docs

## `/properties`

The properties path contains information on querying properties

### `/properties/info.php`

this should take a property ID and return json
params:
- property: integer

### `/properties/page.php`

return paginated listings
params:
 - page: integer
 - page-size: integer (optional)

### `/properties/search.php`

search for information on properties in the database
params:
 - query: string

## `/maintenance`

manage maintenance requests

### `/maintenance/read.php`

read a maintenance request from the database
params:
 - request: int

### `/maintenance/search.php`

search for requests you have recieved/submitted
params:
 - query: string

### `/maintenance/set-status.php`

set the status of a request
params:
 - request: int
 - status: enum('recieved', 'progress', 'complete')

### `/maintenance/submit.php`

submit a request for help/assistance
params:
 - property: int
 - desctiption: string
 - urgency: enum('low', 'normal', 'high')