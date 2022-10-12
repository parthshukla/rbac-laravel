
## About Rbac-Laravel

Rbac-Laravel is package for implementing the Role Based Access control in laravel application.
List of actions that can be done:
- [Add New Role](#add-new-role)
- [List All Roles](#list-all-roles)



Laravel is accessible, powerful, and provides tools required for large, robust applications.

### <a name="add-new-role">Add New Role</a>
This api end point will be used for adding a new role.
###### API End Point: /api/roles
###### Request Type: POST
###### Request Body
```
{
    "name": "basic",
    "description": "This is some description"
}
```

### <a name="list-all-roles">List All Roles</a>
This api lists all the roles added in the application.
- limit is non-required parameter. Value of this parameter decides that number of results to be returned in the response. Default value is as per the application settings
- page is non-required parameter. Value of this parameter is used for identifying the current page for the paginated result. Default value is 1
###### API End Point: /api/roles?limit=2&page=1
###### Request Type: GET
###### Response:
```
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Administrator",
            "description": "This is administrator role",
            "status": "blocked",
            "created_at": "2022-10-10T10:22:28.000000Z",
            "updated_at": "2022-10-10T10:22:28.000000Z",
            "deleted_at": null
        },
        {
            "id": 2,
            "name": "Writer",
            "description": "This is writer role",
            "status": "blocked",
            "created_at": "2022-10-10T10:41:05.000000Z",
            "updated_at": "2022-10-10T10:41:05.000000Z",
            "deleted_at": null
        }
    ],
    "first_page_url": "http://127.0.0.1:8001/api/roles?page=1",
    "from": 1,
    "last_page": 2,
    "last_page_url": "http://127.0.0.1:8001/api/roles?page=2",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://127.0.0.1:8001/api/roles?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": "http://127.0.0.1:8001/api/roles?page=2",
            "label": "2",
            "active": false
        },
        {
            "url": "http://127.0.0.1:8001/api/roles?page=2",
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": "http://127.0.0.1:8001/api/roles?page=2",
    "path": "http://127.0.0.1:8001/api/roles",
    "per_page": 2,
    "prev_page_url": null,
    "to": 2,
    "total": 4
}
```
