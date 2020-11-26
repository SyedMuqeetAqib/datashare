
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

     
    <title>DataShare | Share your data on same Network    </title>
</head>
<link rel="stylesheet" href="css/datastyle.css">


<body class="pb-4 mb-4">

    <!-- <span class="fixed-top"> -->
        <span>
    <nav class="navbar navbar-expand-lg  bg-custom-green navbar-light border">
  <a class="navbar-brand font-weight-bold text-white" href="#">Data Share</a>
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
     
    </ul>
    <form class="d-none form-inline my-lg-0 text-dark font-weight-bold" action="uploadImage2.php" method="post" enctype="multipart/form-data">
                
                <label class="mr-2 ">Select File: </label>
                <input class="p-0 m-0 rounded-lg" type="file" name="insertFile[]" multiple="" id="filesToUpload" onchange="form.submit()">
                
                <input class="rounded-lg bg-light" type="submit" name="fileSubmit" value="Upload" id="fileSubmit">
    </form>
  </div>
</nav>