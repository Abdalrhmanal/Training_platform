<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <h1>welcoom in our Courses</h1>
<div class="container">
    <div class="row">
    <div class="col-xl-12 col-md-6 d-flex align-items-stretch" style="margin-top: 5px;" data-aos="zoom-in" data-aos-delay="100">
        <div class="card" style="width: 80%;">
        <img src="{{ $course->img }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">{{ $course->name }}</h4>
                <h4>Teachar :{{ $course->teacher->name }}</h4>
                <h4>Date :{{ $course->course_date }}</h4>
                <h4>Price :{{ $course->price }}$</h4>
                <p class="card-text">{{ $course->descrebtion }}</p>
                 <a href="/co/{{ $course->id }}/s" class="btn btn-primary">Go Course</a> 
                 <a href="/co/{{ $course->id }}/std" class="btn btn-primary">Viuo Studente</a> 
            </div>
           
        </div>
    </div>
    
</div> 
</div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>