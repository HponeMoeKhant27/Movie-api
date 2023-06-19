
** Comment **
----

  Get comment 

* **URL**

  /v1/api/comments

* **Method:**

  `GET`


* **Header:**

  `Accept:application/json`


*  **URL Params**

   **Required:**
 
   `limit=[integer]`
   `offset=[integer]`


* **Success Response:**

  * **Code:** 200 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 1,
        "code": 200,
        "meta": {
            "method": "GET",
            "endpoint": "/api/v1/comments",
            "limit": 30,
            "offset": 0
        },
        "data": [
            {
                "id": 2,
                "movie_id": 1,
                "comment": "Ut facilis incidunt nostrum doloribus qui libero dolorem consequatur saepe sint ex ratione quis doloribus quisquam et in exercitationem dolores rerum amet aut et saepe molestiae sunt deserunt.",
                "created_at": "18-12-1994",
                "updated_at": "18-12-1994"
            }
        ],
        "error": []
    }
    ```
 

  Create comment 

* **URL**

  /v1/api/comments

* **Method:**

  `POST`


* **Header:**
    
    `Accept:application/json`

*  **Data Params**

   **Required:**
 
   `email=[string]`
   `movie_id=[integer]`
   `comment=[string]`

* **Success Response:**

  * **Code:** 201 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 1,
        "code": 201,
        "meta": {
            "method": "POST",
            "endpoint": "/api/v1/comments"
        },
        "data": {
            "id": 7,
            "movie_id": "2",
            "comment": "blablabla",
            "created_at": "22-10-2022",
            "updated_at": "22-10-2022"
        },
        "error": []
    }
    ```


* **Error Response:**

  * **Code:** 400 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 0,
        "code": 400,
        "meta": {
            "method": "POST",
            "endpoint": "/api/v1/comments"
        },
        "data": [],
        "error": [
            {
                "attribute": "email",
                "message": "The email field is required."
            },
            {
                "attribute": "movie_id",
                "message": "The movie id field is required."
            },
            {
                "attribute": "comment",
                "message": "The comment field is required."
            }
        ]
    }
    ```


  Update comment 

* **URL**

  /v1/api/comments/{id}

* **Method:**

  `PUT`


* **Header:**
    
    `Accept:application/json`


*  **URL Params**

   **Required:**
 
   `id=[integer]`

*  **Data Params**
 
   `email=[string]`
   `movie_id=[integer]`
   `comment=[string]`
   

* **Success Response:**

  * **Code:** 200 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 1,
        "code": 200,
        "meta": {
            "method": "PUT",
            "endpoint": "/api/v1/comments/7"
        },
        "data": {
            "id": 7,
            "movie_id": 2,
            "comment": "blablabla",
            "created_at": "22-10-2022",
            "updated_at": "22-10-2022"
        },
        "error": []
    }
    ```


* **Error Response:**

  * **Code:** 400 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 0,
        "code": 400,
        "meta": {
            "method": "PUT",
            "endpoint": "/api/v1/comments/7"
        },
        "data": [],
        "error": [
            {
                "attribute": "email",
                "message": "The email must be a valid email address."
            },
            {
                "attribute": "comment",
                "message": "The comment may not be greater than 225 characters."
            },                
        ]
    }
    ```          

  * **Code:** 404 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 0,
        "code": 404,
        "meta": {
            "method": "PUT",
            "endpoint": "/api/v1/comments/7"
        },
        "data": [],
        "error": [
            {
                "attribute": "resource_not_found_exception ",
                "message": "The updating resource of the given ID was not found."
            }
        ]
    }
    ```          


  Delete comment 

* **URL**

  /v1/api/comments/{id}

* **Method:**

  `DELETE`


* **Header:**
    
    `Accept:application/json`


*  **URL Params**

   **Required:**
 
   `id=[integer]`


* **Success Response:**

  * **Code:** 200 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 1,
        "code": 200,
        "meta": {
            "method": "DELETE",
            "endpoint": "/api/v1/comments/21"
        },
        "data": {
            "deleted": 1
        },
        "error": []
    }
    ```


* **Error Response:**

  * **Code:** 404 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 0,
        "code": 404,
        "meta": {
            "method": "DELETE",
            "endpoint": "/api/v1/comments/21111"
        },
        "data": [],
        "error": [
            {
                "attribute": "resource_not_found_exception ",
                "message": "The deleting resource of the given ID was not found."
            }
        ]
    }
    ```          
