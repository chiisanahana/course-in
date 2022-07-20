<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- displays site properly based on user's device -->

  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/qrcode.css')}}" />
  <title>CourseIn - QR Payment</title>

  <!-- Feel free to remove these styles or customise in your own stylesheet 👍 -->
  
</head>
<body>
  <div class="card shadow mt-1 mb-5 border-0" style="width:30rem;">
    <img class="card-img-top w-50 mx-auto" src="{{asset('assets/contohqris.jpg')}}" alt="Card image cap">
    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-qr-code mx-auto" viewBox="0 0 16 16">
        <path d="M2 2h2v2H2V2Z"/>
        <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"/>
        <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"/>
        <path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"/>
        <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"/>
    </svg> --}}
    <div class="card-body">
      <h1 class="heading"><strong>Scan this QRIS Code with your phone</strong></h1>
      <p class="card-text">Once you've done your payment, click below to proceed.</p>
      <div class="d-flex justify-content-center">
        <a href="/qr-verify" class="btn btn-primary w-100">DONE</a>
      </div>
    </div>
  </div>
</body>
</html>