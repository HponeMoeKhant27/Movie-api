
** Movie **
----

  Get movie 

* **URL**

  /v1/api/movies

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
            "endpoint": "/api/v1/movies",
            "limit": 30,
            "offset": 0
        },
        "data": [
            {
                "id": 13,
                "title": "Mr.",
                "summary": "Tempora veritatis fuga maxime et minima sed laudantium provident eum voluptas accusamus ipsam temporibus maxime repudiandae saepe aut asperiores mollitia est commodi ut excepturi itaque fugit cumque quidem illo eius ea deserunt minus voluptates.",
                "cover_image": "",
                "generes": "Scary",
                "author": "Elza Welch",
                "tags": "tag-12",
                "imdb_rate": 12,
                "created_at": "28-02-2018",
                "updated_at": "28-02-2018",
                "comments": [
                    {
                        "id": 2,
                        "email": "karson.lockman@gmail.com",
                        "comment": "Ut facilis incidunt nostrum doloribus qui libero dolorem consequatur saepe sint ex ratione quis doloribus quisquam et in exercitationem dolores rerum amet aut et saepe molestiae sunt deserunt.",
                        "created_at": "18-12-1994",
                        "updated_at": "18-12-1994"
                    },
                    {
                        "id": 3,
                        "email": "johanna86@ankunding.com",
                        "comment": "Quam reiciendis sapiente animi enim voluptatem temporibus tenetur facere tempora culpa sit qui similique et ea quia est dolorem sit non dicta dolore accusantium.",
                        "created_at": "15-11-1992",
                        "updated_at": "15-11-1992"
                    },
                ],
                "related_movie": []
            }
        ],
        "error": []
    }
    ```
 

  Create movie 

* **URL**

  /v1/api/movies

* **Method:**

  `POST`


* **Header:**
    
    `Barer Token : passport token`
    `Accept:application/json`


*  **Data Params**

   **Required:**
 
   `title=[string]`

* **Success Response:**

  * **Code:** 201 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 1,
        "code": 201,
        "meta": {
            "method": "POST",
            "endpoint": "/api/v1/movies/"
        },
        "data": {
            "id": 21,
            "title": "my test 2",
            "summary": null,
            "cover_image": null,
            "generes": null,
            "author": null,
            "tags": null,
            "imdb_rate": null,
            "created_at": "22-10-2022",
            "updated_at": "22-10-2022",
            "comments": [],
            "related_movie": []
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
            "endpoint": "/api/v1/movies/"
        },
        "data": [],
        "error": [
            {
                "attribute": "title",
                "message": "The title field is required."
            },
            {
                "attribute": "title",
                "message": "The title may not be greater than 30 characters."
            },
            {
                "attribute": "summary",
                "message": "The title may not be greater than 225 characters."
            },              
        ]
    }
    ```
  * **Code:** 401 <br />
    
    **Content:** 
    ```javascript
    {
        "message": "Unauthenticated."
    }
    ```

  Update movie 

* **URL**

  /v1/api/movies/{id}

* **Method:**

  `PUT`


* **Header:**
    
    `Barer Token : passport token`
    `Accept:application/json`


*  **URL Params**

   **Required:**
 
   `id=[integer]`

*  **Data Params**
 
   `title=[string]`
   `summary=[string]`
   `generes=[string]`
   `author=[string]`
   `tags=[integer]`
   `imdb_rate=[integer]`


* **Success Response:**

  * **Code:** 200 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 1,
        "code": 200,
        "meta": {
            "method": "PUT",
            "endpoint": "/api/v1/movies/21"
        },
        "data": {
            "id": 21,
            "title": "blablablupdateupdate",
            "summary": null,
            "cover_image": null,
            "generes": null,
            "author": null,
            "tags": null,
            "imdb_rate": null,
            "created_at": "22-10-2022",
            "updated_at": "22-10-2022",
            "comments": [],
            "related_movie": []
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
            "endpoint": "/api/v1/movies/21"
        },
        "data": [],
        "error": [
            {
                "attribute": "title",
                "message": "The title may not be greater than 30 characters."
            },
            {
                "attribute": "summary",
                "message": "The title may not be greater than 225 characters."
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
            "endpoint": "/api/v1/movies/21111"
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


  Delete movie 

* **URL**

  /v1/api/movies/{id}

* **Method:**

  `DELETE`


* **Header:**
    
    `Barer Token : passport token`
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
            "endpoint": "/api/v1/movies/21"
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
            "endpoint": "/api/v1/movies/21111"
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





  Uploaded movie image

* **URL**

  /v1/api/movies/{id}/upload

* **Method:**

  `POST`


* **Header:**
    
    `Barer Token : passport token`
    `Accept:application/json`


*  **URL Params**

   **Required:**
 
   `image=[bycrypt]`


* **Success Response:**

  * **Code:** 200 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 1,
        "code": 200,
        "meta": {
            "method": "POST",
            "endpoint": "/api/v1/movies/21/upload"
        },
        "data": {
            "uploaded_at": 1
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
            "endpoint": "/api/v1/movies/7/upload"
        },
        "data": [],
        "error": [
            {
                "attribute": "image",
                "message": "The image field is required."
            }
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
            "method": "POST",
            "endpoint": "/api/v1/movies/70/upload"
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

