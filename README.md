# Simple Shop API #

This is a sample Shop API documentation.

The API is available at `https://shop-api.ahmedmanan.com`

## Table of Contents

- [Endpoints](#endpoints)
  - [Base URL](#base-url)
  - [Create a Product](#create-a-product)
  - [List of Products](#list-of-products)
  - [Get a Single Product](#get-a-single-product)
  - [Update a Product](#update-a-product)
  - [Delete a Product](#delete-a-product)
  - [Get All Orders](#get-all-orders)
  - [Get an Order](#get-an-order)
- [API Authentication](#api-authentication)
  - [Register](#register)
  - [Login](#login)
- [Possible Errors](#possible-errors)

## Endpoints ##

### Base URL ###

URL: `https://shop-api.ahmedmanan.com`

Returns the status of the API.

### Create a Product ###

POST `/products`

Allows you to create a new product. Requires authentication.

The request body needs to be in JSON format and include the following properties:

 - `productId` - Integer - Required *
 - `Product Name` - String - Required *

Example
```
POST /orders/
Authorization: Bearer <YOUR TOKEN>

{
  "bookId": 1,
  "customerName": "John"
}
```

The response body will contain the order Id.

### List of Products ###

GET `/products`

Returns a list of products.

Optional query parameters:

- type: fiction or non-fiction
- limit: a number between 1 and 20.


### Get a single Product ###

GET `/products/:productId`

Retrieve detailed information about a product.

### Update a Product ###

PUT `/products/:productId`

Update an existing product. Requires authentication.

The request body needs to be in JSON format and allows you to update the following properties:

 - `customerName` - String

 Example
```
PATCH /orders/PF6MflPDcuhWobZcgmJy5
Authorization: Bearer <YOUR TOKEN>

{
  "customerName": "John"
}
```

### Delete a Product ###

DELETE `/Products/:productId`

Delete an existing product. Requires authentication.

The request body needs to be empty.

 Example
```
DELETE /orders/PF6MflPDcuhWobZcgmJy5
Authorization: Bearer <YOUR TOKEN>
```

### Get all orders ###

GET `/orders`

Allows you to view all orders. Requires authentication.

### Get an order ###

GET `/orders/:orderId`

Allows you to view an existing order. Requires authentication.


## API Authentication ##

### Register ###

To create or view a product, you need to register your API client.

POST `/register/`

The request body needs to be in **x-www-form-urlencoded** or **JSON** format and include the following properties:

 - `name` - String
 - `email` - String
 - `password` - String
 - `password_confirmation` - String

 **Example Request**

 ```
 {
  "name": "Your Name",
  "email": "your.email@gmail.com",
  "password": "password",
  "password_confirmation": "password"
}
 ```

 **Response**

 ```
{
    "status": "Request succesful",
    "message": null,
    "data": {
        "user": {
            "name": "Your Name",
            "email": "your.email@gmail.com",
            "updated_at": "2023-09-16T21:00:39.000000Z",
            "created_at": "2023-09-16T21:00:39.000000Z",
            "id": 2
        },
        "token": "WK2hKihNb5ui3zJyWXNLMgbYK75cSKFEIRUsp0wfc0943af5"
    }
}
 ```

The response body will contain the access token. The access token is valid for 30 days.

### Login ###

If you are a registered client, you need to login to create or view a product.

POST `/login/`

The request body needs to be in **form-data** format and include the following properties:

 - `email` - String
 - `password` - String

  **Response**

 ```
  {
    "status": "Request succesful",
    "message": null,
    "data": {
        "user": {
            "id": 1,
            "name": "your name",
            "email": "your.email@gmail.com",
            "email_verified_at": null,
            "created_at": "2023-08-31T15:29:54.000000Z",
            "updated_at": "2023-08-31T15:29:54.000000Z"
        },
        "token": "mxZrR8gSMB7XZYqMYCnV07PdVqnuQsVoKarCG5v5ef1c0edc"
    }
  }
 ```

  

## Possible errors ##

Status code 409 - "API client already registered." Try changing the values for `clientEmail` and `clientName` to something else.
