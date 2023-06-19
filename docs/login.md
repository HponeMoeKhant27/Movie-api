
** Login**
----
  Create Token 

* **URL**

  /v1/api/login

* **Method:**

  `POST`

* **Header:**

  `Accept:application/json`


  
* **Data Params**

    `email=admin@admin.com`
    `password=admin123`

* **Success Response:**

  * **Code:** 200 <br />
    
    **Content:** 
    ```javascript
    {
        "success": 1,
        "code": 200,
        "meta": {
            "method": "POST",
            "endpoint": "/api/v1/login/"
        },
        "data": {
            "name": "admin",
            "email": "admin@admin.com",
            "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzFmZjBmNmIyMzUzN2NlMzVjOTMwYTMyMzhhNGM2YjZjOGYzMzA1ZTc1ZjhkZDY2Mjc4MWJhN2I1MWFkMDVjMzhiYTE0YjY2ODc0MGQyMWIiLCJpYXQiOjE2NjY0NDEzNzAuNzU2MTMxLCJuYmYiOjE2NjY0NDEzNzAuNzU2MTM1LCJleHAiOjE2OTc5NzczNzAuNzUwMDM3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.JP1_JX4LD1FoE0TGtF2dKIVyOStfjzufIeX6DAcoDH5L3VlaEOV0GmYhG90aJuFn1bPukh6ieWqV0SPBj2jv9D3V8apCZnkiygmwFIeHswbrTF5N7lYF-4q49dHDMmcjdHyyasmJjmOLbJxKJloaHOdGbW9a1VsR3Xufcy_1nnDy7_YlEVbzGrDjeEijKxm1VdUxYaFsvviSc8UuSzSzWqNyjviYx4kjfP_puraeBvo4hQ1Iv1Ruho0Um8GoLetDLCPZKQueWQLAVYYnuUIBmh83VAChFnWWf3wuG4abrFLsQMG3ALKBXp_bzXHscJ6hjUHZsXuEqArPwKhaCc0tSqY2CmTX4CVoz0at6ss4Do-tXu03OhAnQnOo0qhVXropuigTqSojmY-p2COxFytHIzShkoV4GrEYya_xCrGfrxXOrB70TjbL3as_xk_O6WKYgylr5_ksAiohB-pwJXLOFwFXLa00s7OXIuHY9Cz2sUosaL2_K6Svo89uE52z_PKJCuYZsAZ6G3014pkpyiaTSTIOG-JNlQjwBsAuZo4XnVdaU9fdxwZX9rpDCKdrRhKFwKlQK-S-mf98FSUZsSYcRkyEffoauSHdSRrzQUNHF05d-h4vOgSLpPwoqL0TZQvZdiYqLC4a0WN1WF5TXEUIoMztT2Jtub7NlZHLUAC7C04"
        },
        "error": []
    }
    ```
 
* **Error Response:**

  * **Code:** 400 VALIDATION ERROR <br />
    **Content:** 
    ```javascript
    {
        "success": 0,
        "code": 400,
        "meta": {
            "method": "POST",
            "endpoint": "/api/v1/login/"
        },
        "data": [],
        "error": [
            {
                "attribute": "email",
                "message": "The email field is required."
            },
            {
                "attribute": "password",
                "message": "The password field is required."
            }
        ]
    }
    ```

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** 
    ```javascript
    {
        "success": 0,
        "code": 401,
        "meta": {
            "method": "POST",
            "endpoint": "/api/v1/login/"
        },
        "data": [],
        "error": [
            {
                "attribute": "Invalid params",
                "message": "User can not access permission !"
            }
        ]
    }
    ```
