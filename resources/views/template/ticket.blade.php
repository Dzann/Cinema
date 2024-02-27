<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ticket</title>
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
        /* background: linear-gradient(135deg, #8e44ad, #3498db);
        color: white; */
        
    }

    .invoice-header {
        text-align: center;
        margin-top: -20px;
        margin-left: 100px;
    }
    .invoice-header b{
        color: red;
    }

    hr {
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
                <img src="img/logo1.png" width="15%" alt="" style="margin-right: 25em"> 
                <h2>| AniPlex Cinema | <b>{{ $ticket->seat }} </b></h2>
            </div>
            <hr>
            <div class="invoice-details">        
                <p><strong>Tanggal</strong>: {{ $ticket->created_at->format('Y-m-d')}}</p>
                <p><strong>Film</strong>: {{ $purchase->movie->name }}</p>
                <p><strong>Waktu</strong>: {{ $purchase->time }}</p>
                <p><strong>Seats</strong>: {{ $ticket->seat }}</p>
                <p><strong>Invoice</strong>: {{ $ticket->code }} </p>
            </div>
        </div>
        @endforeach
    </div>
    

</body>

</html>