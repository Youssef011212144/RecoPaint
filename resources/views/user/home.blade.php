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
        .navbar-brand svg {
    vertical-align: middle;
    margin-right: 8px;
}

.navbar-brand {
    display: flex;
    align-items: center;
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

        .tm-btn-small {
    font-size: 15px; /* Set the font size to 15px */
    padding: 5px 10px; /* Adjust the padding to make it a smaller button */
    line-height: 1.2; /* Ensure the text is vertically centered */
}
/* Modal container */
.modal {
    display: none; /* Hidden by default */
    position: fixed; 
    z-index: 1000; /* Sits on top of everything */
    padding-top: 100px; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    background-color: rgba(0,0,0,0.8); /* Black background with opacity */
}

/* Modal content (the image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%; 
    max-width: 700px; /* Limit max width */
}

/* The close button */
.close {
    position: absolute;
    top: 50px;
    right: 100px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" width="50" height="50" style="margin-right: 8px;">
        <!-- Trunk -->
        <rect x="90" y="100" width="20" height="80" fill="#8B4513" />
        
        <!-- Roots -->
        <path d="M100,180 Q90,190 80,180 Q70,170 60,180 Q50,190 40,180" fill="none" stroke="#8B4513" stroke-width="4" />
        <path d="M100,180 Q110,190 120,180 Q130,170 140,180 Q150,190 160,180" fill="none" stroke="#8B4513" stroke-width="4" />

        <!-- Branches -->
        <circle cx="100" cy="80" r="40" fill="#FFC107" />
        <circle cx="80" cy="60" r="20" fill="#FF5722" />
        <circle cx="120" cy="60" r="20" fill="#4CAF50" />
        <circle cx="60" cy="80" r="15" fill="#03A9F4" />
        <circle cx="140" cy="80" r="15" fill="#E91E63" />
    </svg>
    {{ __('Artisano-Pro') }}
</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" data-translate-key="Photos" href="index.html">{{ __('Photos') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-translate-key="Products" href="{{ route('showProducts') }}">{{ __('Products') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-translate-key="Videos" href="{{ route('showVideos') }}">{{ __('Videos') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-translate-key="About" href="about.html">{{ __('About') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-translate-key="Contact" href="contact.html">{{ __('Contact') }}</a>
                </li>
                <ul>
        <!--<p>Current locale: {{ App::getLocale() }}</p>
        <p>Session locale: {{ session('locale') }}</p>-->
    </ul>
            </ul>
            <div class="language-switcher">
    <button data-locale="en">English</button>
    <button data-locale="ar">Arabic</button>
</div>
        </div>
    </div>
</nav>


    <div class="tm-hero d-flex justify-content-center align-items-center" id="tm-video-container">
        <video autoplay muted loop id="tm-video">
            <source src="video/hero.mp4" type="video/mp4">
        </video>  
        <i id="tm-video-control-button" class="fas fa-pause"></i>
        <form class="d-flex position-absolute tm-search-form" method="GET" action="{{ route('user.home') }}">
    <input class="form-control tm-search-input" type="search" name="query" placeholder="chercher" aria-label="Search" value="{{ request()->input('query') }}">
    <button class="btn btn-outline-success tm-search-btn" type="submit">
        <i class="fas fa-search"></i>
    </button>
</form>


    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Latest Videos @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
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
        @foreach($data as $product)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
        <figure class="effect-ming tm-video-item">
            <img height="400px" width="400px" src="/productimage/{{ $product->img }}" alt="Image" class="img-fluid img-thumbnail" onclick="openModal('{{ $product->img }}', event)">
            <figcaption class="d-flex align-items-center justify-content-center">
                <h2>{{ $product->title }}</h2>
            </figcaption>
        </figure>
        <div class="d-flex justify-content-between tm-text-gray">
            <span>{{ $product->description }}</span>
            <span>10,460 views</span>
        </div>
    </div>
@endforeach



</div>

<!-- Modal HTML -->
<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImg">
</div>

        </div> <!-- row -->
       
        <div class="row tm-mb-90">
    <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
        <!-- Previous Button -->
        @if ($data->onFirstPage())
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
        @else
            <a href="{{ $data->appends(['query' => request()->input('query')])->previousPageUrl() }}" class="btn btn-primary tm-btn-prev mb-2">Previous</a>
        @endif

        <!-- Page Number Links -->
        <div class="tm-paging d-flex">
            @for ($i = 1; $i <= $data->lastPage(); $i++)
                <a href="{{ $data->appends(['query' => request()->input('query')])->url($i) }}" class="tm-paging-link {{ $data->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor
        </div>

        <!-- Next Button -->
        @if ($data->hasMorePages())
            <a href="{{ $data->appends(['query' => request()->input('query')])->nextPageUrl() }}" class="btn btn-primary tm-btn-next">Next Page</a>
        @else
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-next disabled">Next Page</a>
        @endif
    </div>
</div>

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
    // Open the modal and show the clicked image
    function openModal(imageSrc, event) {
        event.preventDefault();      // Prevent default link behavior
        event.stopPropagation();     // Stop the event from bubbling up

        var modal = document.getElementById("imageModal");
        var modalImg = document.getElementById("modalImg");
        modal.style.display = "block"; // Show the modal
        modalImg.src = "/productimage/" + imageSrc; // Set the image in the modal
    }

    // Close the modal when the close button is clicked
    function closeModal() {
        var modal = document.getElementById("imageModal");
        modal.style.display = "none"; // Hide the modal
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.language-switcher button', function () {
        const locale = $(this).data('locale'); // Get the selected language
        $.ajax({
            url: "{{ route('change-language') }}", // Your route name for language change
            type: "POST",
            data: {
                locale: locale, // Send the selected locale
                _token: "{{ csrf_token() }}" // Include CSRF token
            },
            success: function (response) {
                if (response.success) {
                    // Reload the page to apply the new language
                    location.reload();
                } else {
                    alert('Language change failed.');
                }
            },
            error: function () {
                alert('An error occurred while changing the language.');
            }
        });
    });
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