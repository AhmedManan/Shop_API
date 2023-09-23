<div class="section">
    <h2>Products</h2>
    <h3>View All Products Details</h3>
    <p>To view all products you need to be authorized.</p>
    <div class="url-code">
        <!-- API endpoint URL -->
        <pre id="api-url"><b>GET:</b> base_url/products</pre>
    </div>
    <!-- Request section -->
    <h4>Request</h4>
    <p>The request needs to contain authentication 'token' to view products details.</p>
    <!-- Request body content -->
    <strong>header:</strong> <br><br>
    <table class="form-data-table">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>token</td>
                <td><div class="variable-type">String</div></td>
            </tr>
        </tbody>
    </table>
    <!-- Response section -->
    <h4>Response</h4>
    <div class="code">
        <p>Status Code: 200 OK</p>
        <!-- Response body content -->
        <pre id="response-body">{
    "data": [
        {
            "id": "1",
            "attributes": {
                "name": "product 1",
                "description": "product description",
                "category": "electronics",
                "quantity": 5,
                "price": "120",
                "product_pic": "",
                "updated_at": "2023-09-20T16:04:51.000000Z",
                "created_at": "2023-09-17T21:32:10.000000Z"
            },
            "relationships": {
                "seller_id": 1,
                "seller": "Eric"
            }
        },
        {
            "id": "2",
            "attributes": {
                "name": "product 2",
                "description": "product description",
                "category": "electronics",
                "quantity": 17,
                "price": "50",
                "product_pic": "",
                "updated_at": "2023-09-18T21:25:35.000000Z",
                "created_at": "2023-09-17T21:33:26.000000Z"
            },
            "relationships": {
                "seller_id": 1,
                "seller": "Eric"
            }
        }
    ]
}</pre>
        <!-- Button to copy response body to clipboard -->
        <button class="copy-button" onclick="copyToClipboard('response-body')">Copy</button>
    </div>
    <h3>Get A Product</h3>
    <p>To view a product you need to be authorized.</p>
    <div class="url-code">
        <!-- API endpoint URL -->
        <pre id="api-url"><b>GET:</b> base_url/products/{id}</pre>
    </div>
    <!-- Request section -->
    <h4>Request</h4>
    <p>The request needs to contain authentication 'token' to view a product.</p>
    <!-- Request body content -->
    <strong>header:</strong> <br><br>
    <table class="form-data-table">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>token</td>
                <td><div class="variable-type">String</div></td>
            </tr>
        </tbody>
    </table>
    <!-- Response section -->
    <h4>Response</h4>
    <div class="code">
        <p>Status Code: 200 OK</p>
        <!-- Response body content -->
        <pre id="response-body">{
    "data": {
        "id": "7",
        "attributes": {
            "name": "Product 7",
            "description": "product description",
            "category": "food",
            "quantity": 5,
            "price": "70",
            "product_pic": "pdt_6507744d28a4e.jpg",
            "updated_at": "2023-09-18T10:19:47.000000Z",
            "created_at": "2023-09-17T21:49:01.000000Z"
        },
        "relationships": {
            "seller_id": 5,
            "seller": "David"
        }
    }
}</pre>
        <!-- Button to copy response body to clipboard -->
        <button class="copy-button" onclick="copyToClipboard('response-body')">Copy</button>
    </div>
    <h3>Create A Product</h3>
    <p>The request needs to contain authentication 'token' to perform the request.</p>
    <div class="url-code">
        <!-- API endpoint URL -->
        <pre id="api-url"><b>POST:</b> base_url/products</pre>
    </div>
    <!-- Request section -->
    <h4>Request</h4>
    <p>The request body needs to be in form-data format and include the following properties:</p>
    <!-- Request body content -->
    <strong>header:</strong> <br><br>
    <table class="form-data-table">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>token</td>
                <td><div class="variable-type">String</div></td>
            </tr>
        </tbody>
    </table><br><br>
    <strong>body:</strong> form-data <br><br>
    <table class="form-data-table">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>name</td>
                <td><div class="variable-type">String</div></td>
            </tr>
            <tr>
                <td>description</td>
                <td><div class="variable-type">String</div></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><div class="variable-type">Integer</div></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><div class="variable-type">Double</div></td>
            </tr>
            <tr>
                <td>Product_Pic</td>
                <td><div class="variable-type">File </div>(Type: jpg, png, jpeg | Max Size: 2048 KB)</td>
            </tr>
            <!-- Add more rows for additional parameters -->
        </tbody>
    </table>
    <!-- Response section -->
    <h4>Response</h4>
    <div class="code">
        <p>Status Code: 201 Created</p>
        <!-- Response body content -->
        <pre id="response-body">{
    "status": "Request succesful",
    "message": null,
    "data": {
        "user": {
            "name": "Your Name",
            "email": "your.email@gmail.com",
            "updated_at": "2023-09-21T07:42:09.000000Z",
            "created_at": "2023-09-21T07:42:09.000000Z",
            "id": 1
        },
        "token": "tkn_sXs0ZbbDM1atllu4wOKt211jc0uVNXz4f4R8QFkh191894bd"
    }
}</pre>
        <!-- Button to copy response body to clipboard -->
        <button class="copy-button" onclick="copyToClipboard('response-body')">Copy</button>
    </div>
    <h3>Update A Product</h3>
    <p>The request needs to contain authentication 'token' to perform the request.</p>
    <div class="url-code">
        <!-- API endpoint URL -->
        <pre id="api-url"><b>PUT/PATCH:</b> base_url/products/{id}</pre>
    </div>
    <!-- Request section -->
    <h4>Request</h4>
    <!-- Request body content -->
    <strong>head:</strong> <br><br>
    <table class="form-data-table">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>token</td>
                <td><div class="variable-type">String</div></td>
            </tr>
        </tbody>
    </table><br><br>
    <strong>body:</strong> x-www-form-urlencoded <br><br>
    <p>The request body needs to be in x-www-form-urlencoded format and include the following properties:</p>
    <table class="form-data-table">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>name</td>
                <td><div class="variable-type">String</div></td>
            </tr>
            <tr>
                <td>description</td>
                <td><div class="variable-type">String</div></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><div class="variable-type">Integer</div></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><div class="variable-type">Double</div></td>
            </tr>
        </tbody>
    </table>
    <!-- Response section -->
    <h4>Response</h4>
    <div class="code">
        <p>Status Code: 200 OK</p>
        <!-- Response body content -->
        <pre id="response-body">{
    "data": {
        "id": "7",
        "attributes": {
            "name": "Updated Name",
            "description": "product description",
            "category": "electronics",
            "quantity": 9,
            "price": "120",
            "product_pic": "pdt_6507744d28a4e.jpg",
            "updated_at": "2023-09-21T11:26:12.000000Z",
            "created_at": "2023-09-17T21:49:01.000000Z"
        },
        "relationships": {
            "seller_id": 1,
            "seller": "Eric"
        }
    }
}</pre>
        <!-- Button to copy response body to clipboard -->
        <button class="copy-button" onclick="copyToClipboard('response-body')">Copy</button>
    </div>
    <h3>Delete A Product</h3>
    <p>The request can be ececuted to perform delete of a product.</p>
    <div class="url-code">
        <!-- API endpoint URL -->
        <pre id="api-url"><b>DELETE:</b> base_url/products/{id}</pre>
    </div>
    <!-- Request section -->
    <h4>Request</h4>
    <p>The request needs to contain authentication 'token' to perform Delete.</p>
    <!-- Request body content -->
    <strong>head:</strong> <br><br>
    <table class="form-data-table">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>token</td>
                <td><div class="variable-type">String</div></td>
            </tr>
        </tbody>
    </table><br><br>
    <h4>Response</h4>
    <div class="code">
        <p>Status Code: 204 No Content</p>
    </div>
</div>