## Invoicing System API Documentation

### Table of Contents
* [Authentication](#authentication)
   * [Get API Token](#get-api-token)
   * [Using API Token in Authorization Header](#using-api-authorization-header)
   * [Using API Token in Request Query](#using-api-token-in-request-query)
* [Endpoints](#endpoints)
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
        * [List Item](#list-item)

## Authentication

### Get API Token
To access the API, you will need to obtain an access token. You can do this by sending a POST request to the `api/login` endpoint with your email address and password.
```http
POST /login
```
Request
```json
{
  "email": "test@me.com",
  "password": "password"
}
```
Sample Response
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
```http
GET /api/endpoint
Authorization: Bearer YOUR_API_Token
```
### Using API Token in Request Query
Include  your API token in a request query.
```http
GET /api/endpoint?api_key=YOUR_API_Token
```
# Endpoints

## Invoice

### Create Invoice
Create a new invoice.
```http
POST /invoice
Content-Type: application/json
```
Request:
```json
{
	"items": [
		
		{
			"item_code": 2,
			"quantity": 1
		}
	],
	"customer_id": "01hf0e37d0db737qzxegyx6312",
	"issue_date": "2023-10-21",
	"due_date": "2023-11-21"
}
```
Sample Response
```json
{
	"ok": true,
	"msg": "Creating an invoice successful"
}
```
### Get Invoice
Get details of a specific invoice
```http
GET /invoice/{invoice_id}
```
Example
```http
GET /invoice/INV-2023-11-0000
```
Sample Response
```json
{
	"ok": true,
	"msg": "Invoice details fetched successfully",
	"data": {
		"invoice_id": "INV-2023-11-0000",
		"customer_id": "01hf0e37d0db737qzxegyx6312",
		"customer_name": "Roland Dodoo",
		"customer_email": "test@me.com",
		"issue_date": "2023-10-21",
		"due_date": "2023-11-21",
		"total_amount": "20.00",
		"items": [
			{
				"description": "Shirt",
				"unit_price": "20.00",
				"subtotal": "20.00",
				"quantity": 1
			}
		]
	}
}
```










