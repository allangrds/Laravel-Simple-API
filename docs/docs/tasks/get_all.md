## Get All - `/tasks`


| Permission level  |   URL| Method  | Format   |  HTTP Status Code |
|---|---|---|---|---|
|  User |  `/tasks` |   `GET`|  `json` |  `200` |

#### Headers
|  Field | Content  |
|---|---|
|  Content-Type | application/json  |
|  Authorization | Bearer `{token}` |

#### Example

**Event**: User `GET` to `/tasks`  
**Header Content**: `None`
**Body Content**: `None`

**HTTP Status Code**: `200`  
**Response Content**:
```
[
    {
        "id": 1,
        "title": "Rerum maxime quas ut et et molestiae.",
        "description": "Nam amet ullam nulla facere fugiat omnis ut sint. Odit odio velit quibusdam ea.",
        "created_at": "2019-03-10 04:05:05",
        "updated_at": "2019-03-10 04:05:05"
    }
]
```
