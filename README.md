## Invoicing System API Documentation

<!-- ### Table of Contents
* [Authentication](#authentication)
* [Endpoints](#endpoint)
    * [Invoice](#invoice)
        * [Create Invoice](#create-invoice)
        * [Get Invoice](#get-single-invoice)
        * [Delete Invoice](#get-single-invoice)
        * [List Invoice](#get-single-invoice)
    * [Item](#resource-2)
        * [Create Item](#create-item)
        * [Get Item](#create-item)
        * [Update Item](#update-item)
        * [Delete Item](#delete-item)
        * [List Item](#list-item) -->

## Authentication

### Get API Token
To access the API, you will need to obtain an access token. You can do this by sending a POST request to the `api/login` endpoint with your email address and password.
URI
```http
POST api/login
```
Request
```json
{
  "email": "test@me.com",
  "password": "password"
}
```
Response
```json
{
	"ok": true,
	"msg": "Login successful",
	"data": {
		"name": "Roland Dodoo",
		"email": "test@me.com",
		"user_id": "01hf0e37d0db737qzxegyx6312",
		"token": "6|SGCUo1vR9BUpJW1jL0a6YjjpoDCpEBLMhWGDAXBn81075189"
	}
}
```
### Using API Token in Authorization Header

Include your API token in the Authorization header using the Bearer toke format.
Example Request:
```http
GET /api/invoices
Authorization: Bearer YOUR_API_Token
```
### Using API Token in Request Query
Include  your API token in a request query.
Example Request:
```http
GET /api/invoices?api_key=YOUR_API_Token
```





