<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_SANDBOX_CLIENT_ID')}}&currency=USD"></script>

</head>
<body>
    <form action="{{route('processPaypal')}}" method="get">
        @csrf
        <input type="number" name="amount" placeholoder="$00.00" required>
        <!-- <a class="btn btn-primary" href="{{route('processPaypal')}}">PayPal</a> -->
        <input type="submit" class="btn btn-success" value="PayPal">
    </form>

    @if(Session::has('error'))
         <div class="alert alert-danger">{{ Session::get('error') }}</div>
         {{Session::forget('error') }}
    @endif

    @if(Session::has('success'))
         <div class="alert alert-success">{{ Session::get('success') }}</div>
         {{Session::forget('success') }}
    @endif

</body>
</html>