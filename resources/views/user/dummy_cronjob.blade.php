<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>CRON JOB IS WORKING</h1>

    <script>
        const appUrl = '{{ env('APP_URL') }}';
    </script>
    
    <script>
        // Function to make AJAX request every 2 seconds
        function sendRequest() {
            var xhr = new XMLHttpRequest(); // Create a new XMLHttpRequest object
            xhr.open('GET', appUrl+'/run_botx', true); // Set up the request
            xhr.send(); // Send the request asynchronously

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    console.log('Request successful');
                } else {
                    console.error('Request failed');
                }
            };

            xhr.onerror = function() {
                console.error('Network error');
            };
        }

        // Call the sendRequest function every 2 seconds
        setInterval(sendRequest, 2000); // 2000 milliseconds = 2 seconds
    </script>
</body>
</html>
