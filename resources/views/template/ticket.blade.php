<!DOCTYPE html>

<head>
    <title>Invoice</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .invoice-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .invoice-card {
        border: 1px solid black;
        border-radius: 10px;
        /* Sudut bulat */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        padding: 20px;
        margin-bottom: 20px;
        
    }

    .invoice-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .invoice-details p {
        margin: 0;
        padding: 5px 0;
    }

    .invoice-details strong {
        margin-right: 5px;
        width: 130px;
        /* Menyesuaikan lebar strong untuk sejajar */
        display: inline-block;
        /* Menjadikan strong sebagai elemen inline-block */
    }

</style>

<body>

    <div class="invoice-container">
        @foreach ($tickets as $ticket)
        <div class="invoice-card">
            <div class="invoice-header">
                <h2>{{ $purchase->movie->name }}</h2>
            </div>
            <div class="invoice-details">        
                <p><strong>Tanggal</strong>: {{ $ticket->created_at}}</p>
                <p><strong>Film</strong>: {{ $purchase->movie->name }}</p>
                <p><strong>Waktu</strong>: {{ $purchase->time }}</p>
                <p><strong>Seats</strong>: {{ $ticket->seat }} </p>
            </div>
        </div>
            
        @endforeach
    </div>
    

</body>

</html>