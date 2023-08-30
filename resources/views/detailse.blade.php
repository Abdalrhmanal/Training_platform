<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container">
        @foreach($sessions as $session)
<div class="row">   
    <div class="col-xl-12 col-md-6 d-flex align-items-stretch" style="margin-top: 5px;" data-aos="zoom-in" data-aos-delay="100">
            <div class="card" style="width: 100%;">
            <iframe width="100%" height="500" src="{{ $session->description }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <div class="card-body">
                    <h5 class="card-title">{{ $session->title }}</h5>
                    <h5>Course :{{ $session->course_id }}</h5>
                    <h5>notify :{{ $session->notify }}</h5>
                    <!-- <p class="card-text">{{ $session->description }}</p> -->
                </div>
        </div>
    </div>
   </div> 
   @endforeach

</div>
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>
