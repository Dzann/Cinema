<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Movie Tickets</h1>
        <b>Total Pendapatan : Rp. {{ number_format($totalProfit, '0', ',', '.') }}</b>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Movie Title</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Seats</th>
                    <th>Total Price</th>
                    <th>Cash</th>
                    <th>Change</th>
                </tr>
            </thead>
            <tbody>
                @foreach($histories as $ticket)
                    <tr>
                        <td>{{ $ticket->movie->name }}</td>
                        <td>{{ $ticket->date }}</td>
                        <td>{{ $ticket->time }}</td>
                        <td>{{ $ticket->seats }}</td>
                        <td>Rp.{{ number_format($ticket->total, '0', ',', '.') }}</td>
                        <td>Rp.{{ number_format($ticket->cash, '0', ',', '.') }}</td>
                        <td>Rp.{{number_format($ticket->change, '0', ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
