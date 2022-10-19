
## About Rbac-Laravel

Rbac-Laravel is package for implementing the Role Based Access control in laravel application.
List of actions that can be done:
#####Role Management
- [Add New Role](#add-new-role)
- [List All Roles](#list-all-roles)
- [Update Role Details](#update-role)
- [Change Role Status](#change-role-status)
- [View Role Details](#view-role-details)

#####Permission Management
- [Add New Permission](#add-new-permission)
- [Update Permission Details](#update-permission)
- [View Permission Details](#view-permission-details)
- [List all Permissions](#list-all-permissions)
- [Change Permission Status](#change-permission-status)

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
    "data": [
        {
            "id": 1,
            "name": "Administrator",
            "description": "This is administrator role",
            "status": "blocked"
        },
        {
            "id": 2,
            "name": "Writer",
            "description": "This is writer role",
            "status": "blocked"
        }
    ],
    "pagination": {
        "total": 4,
        "count": 2,
        "per_page": 2,
        "current_page": 1,
        "total_pages": 2
    }
}

```
### <a name="update-role">Update Role Details</a>
This api end point will be used for updating a new role.
- id is the unique id of the role to be updated
###### API End Point: /api/roles/{id}
###### Request Type: PUT
###### Request Body
```
{
    "name": "basic",
    "description": "This is basic role",
    "status": "active"
}
```
### <a name="change-role-status">Change Role Status</a>
This api end point will be used for changing the status of an existing role.
###### API End Point: /api/roles/status/change
###### Request Type: PUT
###### Request Body
```
{
    "id": 12345678,
    "status": "open"
}
```
### <a name="view-role-details">View Role Details</a>
This api end point will return the details of the role matching the passed id
###### API End Point: /api/roles/{id}
- id: unique id of the role whose details is required
###### Request Type: GET
###### Response Body
```
{
    "id": 1,
    "name": "Administrator",
    "description": "This is administrator role",
    "status": "blocked"
}
```

### <a name="view-role-details">Add New Permission</a>
This API end point will be used to add a new permission details
###### API End Point: /api/permissions
- id: unique id of the role whose details is required
###### Request Type: POST
###### Request Body
```
{
    "name": "Add role",
    "description": "A role with this permission can add a new role"
}
```
### <a name="update-permission">Update permission Details</a>
This api end point will be used for updating an existing  role.
- id is the unique id of the permission to be updated
###### API End Point: /api/permissions/{id}
###### Request Type: PUT
###### Request Body
```
{
    "name": "Add Role",
    "description": "Role with this permission can add a new role.",
    "status": "active"
}
```
### <a name="view-permission-details">View Permission Details</a>
This api end point will return the details of the permission matching the passed id
###### API End Point: /api/permission/{id}
- id: unique id of the permission whose details is required
###### Request Type: GET
###### Response Body
```
{
    "id": 1,
    "name": "Add new role",
    "description": "A role with this permission can add a new role",
    "status": "active"
}
```
### <a name="list-all-permissions">List All Permissions</a>
This api lists all the permissions added in the application.
- limit is non-required parameter. Value of this parameter decides that number of results to be returned in the response. Default value is as per the application settings
- page is non-required parameter. Value of this parameter is used for identifying the current page for the paginated result. Default value is 1
###### API End Point: /api/permissions?limit=2&page=1
###### Request Type: GET
###### Response:
```
{
    "data": [
        {
            "id": 1,
            "name": "Add new role",
            "description": "A role with this permission can add a new role",
            "status": "active"
        },
        {
            "id": 2,
            "name": "List Roles",
            "description": "A role with this permission can view list of all the roles",
            "status": "blocked"
        }
    ],
    "pagination": {
        "totalResult": 2,
        "count": 2,
        "per_page": 5,
        "current_page": 1,
        "total_pages": 1
    }
}

```
### <a name="change-permission-status">Change Permission Status</a>
This api end point will be used for changing the status of an existing permission.
###### API End Point: /api/permissions/status/change
###### Request Type: PUT
###### Request Body
```
{
    "id": 12345678,
    "status": "open"
}
```
