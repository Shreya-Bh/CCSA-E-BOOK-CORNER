<!-- main send email page -->
<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email to users</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: beige;
            margin: 0;
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #D5F3FE;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="email"],
        input[type="text"],
        textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
            resize: vertical; /* Allow vertical resizing */
        }
        textarea {
            /* Additional styles for the textarea */
            min-height: 150px; /* Set minimum height */
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>


<body>
<form class="" action="send.php" method="POST">
    <h2>Send response to the users ☕︎</h2> 
        Email <input type="email" name="email" value=""> <br>
        Subject <input type="text" name="subject" value=""> <br>
        Message <textarea name="message"></textarea> <br>
        <button type="submit" name="send">Send</button>
    </form>
</body>
</html>