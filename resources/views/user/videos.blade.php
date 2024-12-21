<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog-Z Videos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <style>
        .tm-btn-small {
    font-size: 15px; /* Set the font size to 15px */
    padding: 5px 10px; /* Adjust the padding to make it a smaller button */
    line-height: 1.2; /* Ensure the text is vertically centered */
}
/* Modal container */
.tm-video-item video {
    cursor: pointer; /* Show pointer when hovering over the video */
}


/* Adjusting modal content on smaller screens */
@media screen and (max-width: 700px) {
    .modal-content {
        width: 100%; /* Make it full width */
    }
}
/* Ensure the figure and image stay clickable */
.tm-video-item img {
    position: relative;
    z-index: 1; /* Make sure the image is on top of the figcaption */
    cursor: pointer; /* Show pointer when hovering over the image */
}

/* Style the figcaption without blocking the image click */
.tm-video-item figcaption {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2; /* Higher than image but will not block clicks */
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(0, 0, 0, 0.5); /* Optional: Add background to make text readable */
    color: white; /* Make text readable on the background */
    pointer-events: none; /* Allow clicks to pass through to the image */
}

.tm-video-item h2, .tm-video-item a {
    margin: 0;
    pointer-events: auto; /* Allow text links inside figcaption to be clickable */
}


    </style>
<!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
</head>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <i class="fas fa-film mr-2"></i>
                Artisano-Pro
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1" href="index.html">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-1" href="index.html">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link nav-link-2 active" href="{{ route('showVideos') }}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4" href="contact.html">Contact</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" id="tm-video-container">
        <video autoplay muted loop id="tm-video">
            <source src="video/hero.mp4" type="video/mp4">
        </video>  
        <i id="tm-video-control-button" class="fas fa-pause"></i>
        <form class="d-flex position-absolute tm-search-form" method="GET" action="{{ route('user.videos') }}">
    <input class="form-control tm-search-input" type="search" name="query" placeholder="chercher" aria-label="Search" value="{{ request()->input('query') }}">
    <button class="btn btn-outline-success tm-search-btn" type="submit">
        <i class="fas fa-search"></i>
    </button>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Latest Videos
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
    <form action="{{ url()->current() }}" method="GET" class="tm-text-primary">
        Page 
        <input type="number" name="page" value="{{ $data->currentPage() }}" size="1" class="tm-input-paging tm-text-primary" min="1" max="{{ $data->lastPage() }}">
        of {{ $data->lastPage() }}
        <!--<button type="submit" class="btn btn-primary ml-2 tm-btn-small">Go</button>-->
    </form>
</div>


        
        <div class="row tm-mb-90 tm-gallery">
        <div class="row tm-mb-90 tm-gallery">
        @foreach($data as $video)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
        <figure class="effect-ming tm-video-item">
            <!-- Instead of an image, embed the video -->
            <video height="400px" width="400px" controls preload="auto" class="img-fluid img-thumbnail">
                <source src="/productvideo/{{ $video->video }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
           
        </figure>
        <div class="d-flex justify-content-between tm-text-gray">
            <span>{{ $video->description }}</span>
            <span>10,460 views</span>
        </div>
    </div>
    @endforeach
</div>



</div>

<!-- The Modal for Videos -->
<div id="videoModal" class="modal" style="display:none;">
    <span class="close" onclick="closeVideoModal()">&times;</span>
    <video class="modal-content" id="modalVideo" controls></video>
</div>


        </div> <!-- row -->
       
        <div class="row tm-mb-90">
    <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
        <!-- Previous Button -->
        @if ($data->onFirstPage())
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
        @else
            <a href="{{ $data->previousPageUrl() }}" class="btn btn-primary tm-btn-prev mb-2">Previous</a>
        @endif

        <!-- Page Number Links -->
        <div class="tm-paging d-flex">
            @for ($i = 1; $i <= $data->lastPage(); $i++)
                <a href="{{ $data->url($i) }}" class="tm-paging-link {{ $data->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor
        </div>

        <!-- Next Button -->
        @if ($data->hasMorePages())
            <a href="{{ $data->nextPageUrl() }}" class="btn btn-primary tm-btn-next">Next Page</a>
        @else
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-next disabled">Next Page</a>
        @endif
    </div>
</div>

    </div> <!-- container-fluid, tm-container-content -->

    <div class="tm-bg-gray pt-5 pb-3 tm-text-gray">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4">About Catalog-Z</h3>
                    <p>Catalog-Z is free Bootstrap 5 Alpha 2 HTML Template for video and photo websites. You can freely use this TemplateMo layout for a front-end integration with any kind of CMS website.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2020 Catalog-Z Company. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/plugins.js"></script>
    <script>
    function openVideoModal(videoSrc) {
        var modal = document.getElementById("videoModal");
        var modalVideo = document.getElementById("modalVideo");
        modal.style.display = "block"; // Show the modal
        modalVideo.src = "/productvideo/" + videoSrc; // Set the video in the modal
    }

    function closeVideoModal() {
        var modal = document.getElementById("videoModal");
        modal.style.display = "none"; // Hide the modal
    }
</script>


    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });

        $(function(){
            /************** Video background *********/

            function setVideoSize() {
                const vidWidth = 1280;
                const vidHeight = 720;
                const maxVidHeight = 400;
                let windowWidth = window.innerWidth;
                let newVidWidth = windowWidth;
                let newVidHeight = windowWidth * vidHeight / vidWidth;
                let marginLeft = 0;
                let marginTop = 0;
            
                if (newVidHeight < maxVidHeight) {
                    newVidHeight = maxVidHeight;
                    newVidWidth = newVidHeight * vidWidth / vidHeight;
                }
            
                if(newVidWidth > windowWidth) {
                    marginLeft = -((newVidWidth - windowWidth) / 2);
                }
            
                if(newVidHeight > maxVidHeight) {
                    marginTop = -((newVidHeight - $('#tm-video-container').height()) / 2);
                }
            
                const tmVideo = $('#tm-video');
            
                tmVideo.css('width', newVidWidth);
                tmVideo.css('height', newVidHeight);
                tmVideo.css('margin-left', marginLeft);
                tmVideo.css('margin-top', marginTop);
            }

            setVideoSize();

            // Set video background size based on window size
            let timeout;
            window.onresize = function () {
                clearTimeout(timeout);
                timeout = setTimeout(setVideoSize, 100);
            };

            // Play/Pause button for video background      
            const btn = $("#tm-video-control-button");

            btn.on("click", function (e) {
                const video = document.getElementById("tm-video");
                $(this).removeClass();

                if (video.paused) {
                    video.play();
                    $(this).addClass("fas fa-pause");
                } else {
                    video.pause();
                    $(this).addClass("fas fa-play");
                }
            });
        });
    </script>
</body>
</html>