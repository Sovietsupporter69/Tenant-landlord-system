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