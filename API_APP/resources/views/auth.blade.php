<div class="section">
    <h2>Authentication</h2>
    <h3>Registration</h3>
    <p>To create, view, update or delete a product or an Order, you need to register your API client.</p>
    <div class="url-code">
        <!-- API endpoint URL -->
        <pre id="api-url"><b>POST:</b> base_url/register</pre>
    </div>
    <!-- Request section -->
    <h4>Request</h4>
    <div class="code">
        <!-- Request body content -->
        <pre id="request-body">{
 "name": "string",
 "email": "string",
 "password": "string",
 "password_confirmation": "string"
}</pre>
        <!-- Button to copy request body to clipboard -->
        <button class="copy-button" onclick="copyToClipboard('request-body')">Copy</button>
    </div>
    <!-- Response section -->
    <h4>Response</h4>
    <div class="code">
        <p>Status Code: 200 OK</p>
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
    <h3>Login</h3>
    <p>If you are a registered client, you need to login to create, view, update or delete a product or an Order</p>
    <div class="url-code">
        <!-- API endpoint URL -->
        <pre id="api-url"><b>POST:</b> base_url/login</pre>
    </div>
    <!-- Request section -->
    <h4>Request</h4>
    <p>The request body needs to be in form-data format and include the following properties:</p>
    <!-- Request body content -->
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
                <td>email</td>
                <td><div class="variable-type">String</div></td>
            </tr>
            <tr>
                <td>password</td>
                <td><div class="variable-type">String</div></td>
            </tr>
            <!-- Add more rows for additional parameters -->
        </tbody>
    </table>
    <!-- Response section -->
    <h4>Response</h4>
    <div class="code">
        <p>Status Code: 200 OK</p>
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
    <h3>Logout</h3>
    <p>If you are a registered client, you need to login to create, view, update or delete a product or an Order</p>
    <div class="url-code">
        <!-- API endpoint URL -->
        <pre id="api-url"><b>POST:</b> base_url/logout</pre>
    </div>
    <!-- Request section -->
    <h4>Request</h4>
    <p>The request body needs to contain authentication 'token' to perform logout.</p>
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
    "status": "Request succesful",
    "message": null,
    "data": {
        "message": "You have been successfully logged out"
    }
}</pre>
        <!-- Button to copy response body to clipboard -->
        <button class="copy-button" onclick="copyToClipboard('response-body')">Copy</button>
    </div>
</div>