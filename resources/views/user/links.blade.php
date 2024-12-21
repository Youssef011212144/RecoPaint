<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>links</title>
    <style>
        /* Modal Styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
}

.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
}

.close:hover, .close:focus {
    color: #999;
    text-decoration: none;
    cursor: pointer;
}


    </style>
</head>
<body>




<div class="row">
    @foreach($images as $image)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <!-- Image with onclick event -->
                <img 
                    height="400px" 
                    width="400px" 
                    src="/productimage/{{ $image->img }}" 
                    alt="{{ $image->title }}" 
                    class="img-fluid img-thumbnail"
                    style="cursor: pointer;" 
                    onclick="openModal('{{ $image->img }}', '{{ $image->title }}')">  <!-- Trigger modal on click -->
            </figure>
        </div>
    @endforeach
</div>
<!-- Modal Structure -->
<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImg">
    <a id="seeMoreBtn" class="btn btn-primary" href="#" target="_blank">See More</a>
</div>







<script>
    function openModal(imageSrc, title) {
        console.log("Opening modal for image:", imageSrc);  // Debugging output

        // Get modal elements
        var modal = document.getElementById("imageModal");
        var modalImg = document.getElementById("modalImg");
        var seeMoreBtn = document.getElementById("seeMoreBtn");

        // Show the modal
        modal.style.display = "block";
        modalImg.src = "/productimage/" + imageSrc;

        // Link the "See More" button to the video based on the image title
        var videos = @json($videos);  // Pass the video data from PHP to JavaScript
        var found = false;

        // Loop through videos to find the one that matches the title
        videos.forEach(function(video) {
            if (video.title === title) {
                seeMoreBtn.href = "/video/" + video.id;  // Set the "See More" button URL
                found = true;
            }
        });

        if (!found) {
            seeMoreBtn.href = "#";  // If no video is found, disable the button
            seeMoreBtn.classList.add('disabled');
        }
    }

    function closeModal() {
        var modal = document.getElementById("imageModal");
        modal.style.display = "none";  // Hide the modal
    }
</script>







    



</body>
</html>