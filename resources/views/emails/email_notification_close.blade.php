<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>One user Open Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header, .footer {
            text-align: center;
            padding: 10px 0;
            background-color: #007BFF;
            color: #ffffff;
            border-radius: 8px 8px 0 0;
        }
        .footer {
            border-radius: 0 0 8px 8px;
        }
        .content {
            padding: 20px;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
        }
        .content table tr td {
            padding: 10px;
            border-bottom: 1px solid #dddddd;
        }
        .content table tr td img {
            display: block;
            margin: 10px auto;
            max-width: 100%;
            height: auto;
        }
        .content table tr:last-child td {
            border-bottom: none;
        }
        .highlight {
            color: #007BFF;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
        </div>
        <div class="content">
            <p>Hello NetCoden</p>
            <p>Dear <span class="highlight">Admin</span>, Ticket Closed</p>
            <table>
                <tr>
                    <td>User Name</td>
                    <td>{{$user_name}}</td>
                </tr>
                <tr>
                    <td>Ticket id:</td>
                    <td>{{$ticket_id}}</td>
                </tr>
                <tr>
                    <td>Ticket Subject:</td>
                    <td>{{$ticket_subject}}</td>
                </tr>
                <tr>
                    <td>Ticket Status:</td>
                    <td>{{$ticket_status}}</td>
                </tr>
            </table>
            <p>Thank you</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} NatCoden. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
