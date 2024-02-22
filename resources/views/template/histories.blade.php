<!DOCTYPE html>
{{-- <html lang="en"> --}}
<head>
    {{-- <meta charset="UTF-8"> --}}
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <title>History Tickets</title>
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
        hr{
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: hsl(192, 100%, 65%);
        }
        .total {
            position: absolute;
            margin-top: 20px;
            right: 10px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Movie Tickets</h1>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>Movie Title</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Seats</th>
                    <th>Total Price</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        <b class="total">Total Pendapatan : Rp. {{ number_format($totalProfit, '0', ',', '.') }}</b>
    </div>
</body>
</html>
