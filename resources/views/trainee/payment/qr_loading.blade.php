<?php
    header( "refresh:5;url='/dashboard'" );
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- displays site properly based on user's device -->

  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/qrcode.css')}}" />
  <title>CourseIn - Verifying Payment</title>
  

  <!-- Feel free to remove these styles or customise in your own stylesheet 👍 -->
  
</head>
<body>
  <div class="card shadow mt-1 mb-5 border-0" style="width:30rem;">
    {{-- <img class="card-img-top" src="{{asset('assets/logo.png')}}" alt="Card image cap"> --}}
      <img src="{{asset('assets/loading.gif')}}" alt="loading" width="200" class="mx-auto">
    <div class="card-body mx-auto">
      <h1 class="heading"><strong>Please wait for the verification</strong></h1>
      <p class="card-text">You will be redirected in a few...</p>
      {{-- <div class="btn btn-primary d-flex justify-content-center">
        <button style="border:none; background:transparent;"><a href="" style="text-decoration: none; color:white">DONE</a></button>
      </div> --}}
    </div>
  </div>
</body>
</html>