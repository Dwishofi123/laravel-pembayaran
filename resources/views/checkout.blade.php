<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key=config('midtrans.client_key')></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
    <h1>Hello, world!</h1>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  <table>
    <tr>
        <td>nama</td>
        <td>{{$order->name}}</td>
    </tr>
    <tr>
        <td>alamat</td>
        <td>{{$order->address}}</td>
    </tr>
    <tr>
        <td>no hp</td>
        <td>{{$order->phone}}</td>
    </tr>
    <tr>
        <td>jumlah</td>
        <td>{{$order->qty}}</td>
    </tr>
    <tr>
        <td>total harga</td>
        <td>{{$order->total_price}}</td>
    </tr>
  </table>
    <button class="btn btn-primary" id="pay-button">bayar sekarang</button>

    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        // window.snap.pay('{{$snapToken}}');

        window.snap.pay('{{$snapToken}}', {
  onSuccess: function(result){
    /* You may add your own implementation here */
    alert("payment success!"); console.log(result);
  },
  onPending: function(result){
    /* You may add your own implementation here */
    alert("wating your payment!"); console.log(result);
  },
  onError: function(result){
    /* You may add your own implementation here */
    alert("payment failed!"); console.log(result);
  },
  onClose: function(){
    /* You may add your own implementation here */
    alert('you closed the popup without finishing the payment');
  }
})

        
        // customer will be redirected after completing payment pop-up
      });
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>