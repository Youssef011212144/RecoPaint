<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<div class="container">
    <h2>{{ $video->title }}</h2>
    <video width="100%" controls>
        <source src="/productvideo/{{ $video->video }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>


</body>
</html>