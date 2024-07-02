<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('adminn.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('adminn.sidebar')
      <!-- partial -->
      @include('adminn.header')
        <!-- partial -->
       @include('adminn.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('adminn.js')
    <!-- End custom js for this page -->
  </body>
</html>
