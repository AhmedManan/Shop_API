<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop API</title>
    <!-- CSS styles for the documentation -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        h1 {
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
        }

        .section {
            margin-top: 20px;
        }

        .section h2 {
            background-color: #444;
            color: #fff;
            padding: 10px;
        }

        .code {
            background-color: #eee;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .copy-button {
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
        }

        /* Style JSON code sections like a code editor */
        .code pre {
            background-color: #000;
            color: #fff;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            white-space: pre-wrap;
        }

        /* Style API Endpoint URL */
        .url-code pre {
            background-color: #e2e2e2;
            color: #000;
            padding: 10px;
            border: 1px solid #323232;
            border-radius: 5px;
            white-space: pre-wrap;
            font-family: 'Courier New', Courier, monospace;
        }

        /* Style x-www-form-urlencoded parameters */
        .form-data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .form-data-table th,
        .form-data-table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .form-data-table th {
            background-color: #007bff;
            color: #fff;
        }

        /* Style Copy buttons */
        .copy-button {
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            font-family: Arial, sans-serif;
        }

        /* Style Variables section */
        .variables-section {
            margin-top: 20px;
        }

        .variables-title {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        .variables-content {
            background-color: #eee;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style Variable clipboard button */
        .variable-copy-button {
            cursor: pointer;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            font-family: 'Courier New', Courier, monospace;
        }

        .variable-type {
            background-color: #333;
            color: #fff;
            border: 1px none;
            padding: 5px 10px;
            border-radius: 3px;
            font-family: 'Courier New', Courier, monospace;
            width: min-content;
        }
    </style>
</head>

<body>
    <!-- Header section with the documentation title -->
    <header>
        <h1>Shop API Documentation</h1>
    </header>

    <!-- Main content container -->
    <div class="container">
        <!-- Base URL section -->
        <div class="section">
            <h2>Introduction</h2>
            <p>This is a sample Shop API documentation.</p>
            <!-- API Base URL section -->
            <h3>API Base URL</h3>
            <div class="url-code">
                <!-- API endpoint URL -->
                <pre id="api-url">https://shop-api.ahmedmanan.com</pre>
                <!-- Button to copy API endpoint URL to clipboard -->
                <button class="copy-button" onclick="copyToClipboard('api-url')">Copy</button>
            </div>
        </div>
        <!-- Authentication section -->
        @include('docs/auth')
        <!-- Product section -->
        @include('docs/product')
    </div>

    <!-- JavaScript function to copy content to clipboard -->
    <script>
        function copyToClipboard(elementId) {
            const element = document.getElementById(elementId);
            const textArea = document.createElement("textarea");
            textArea.value = element.textContent;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand("copy");
            document.body.removeChild(textArea);
            alert("Copied to clipboard");
        }
    </script>
</body>

</html>