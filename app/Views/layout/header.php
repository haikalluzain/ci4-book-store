<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $this->renderSection('title')  ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="/assets/modules/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="/assets/modules/dropify/css/dropify.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/components.css">
  <link rel="stylesheet" href="/assets/css/custom.css">

  <style>
    #pdf-preview {
      width: 1000px;
      height: 1200px;
      overflow: hidden;
      /* display: block; */
      margin: auto;
      text-align: center;
      -moz-transform: scale(0.5, 0.5);
      -webkit-transform: scale(0.5, 0.5);
      -o-transform: scale(0.5, 0.5);
      -ms-transform: scale(0.5, 0.5);
      transform: scale(0.5, 0.5);
      -moz-transform-origin: top left;
      -webkit-transform-origin: top left;
      -o-transform-origin: top left;
      -ms-transform-origin: top left;
      transform-origin: top left;
    }
  </style>

</head>

<body>