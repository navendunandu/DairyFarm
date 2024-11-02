<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating System in PHP & MySQL using Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4 text-center">Product Rating</h1>
        <div class="card">
            <div class="card-header bg-success text-white">Rating Overview</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <h1 class="text-success mt-4 mb-4">
                            <b><span id="average_rating">4.0</span> / 5</b>
                        </h1>
                        <div class="mb-3">
                            <i class="fas fa-star text-success mr-1"></i>
                            <i class="fas fa-star text-success mr-1"></i>
                            <i class="fas fa-star text-success mr-1"></i>
                            <i class="fas fa-star text-success mr-1"></i>
                            <i class="fas fa-star star-light mr-1"></i>
                        </div>
                        <h5><span id="total_review">123</span> Reviews</h5>
                    </div>
                    <div class="col-sm-4">
                        <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-success"></i></div>
                            <div class="progress-label-right">(<span id="total_five_star_review">45</span>)</div>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 45%;"></div>
                            </div>
                        </p>
                        <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-success"></i></div>
                            <div class="progress-label-right">(<span id="total_four_star_review">35</span>)</div>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 35%;"></div>
                            </div>
                        </p>
                        <p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-success"></i></div>
                            <div class="progress-label-right">(<span id="total_three_star_review">20</span>)</div>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 20%;"></div>
                            </div>
                        </p>
                        <p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-success"></i></div>
                            <div class="progress-label-right">(<span id="total_two_star_review">15</span>)</div>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 15%;"></div>
                            </div>
                        </p>
                        <p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-success"></i></div>
                            <div class="progress-label-right">(<span id="total_one_star_review">8</span>)</div>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 8%;"></div>
                            </div>
                        </p>
                    </div>
                    <div class="col-sm-4 text-center">
                        <!-- Optional: Add more features or styling for reviews -->
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5" id="review_content">
            <h3 class="text-center">Customer Reviews</h3>
            <div class="media mt-3">
                <img src="https://via.placeholder.com/64" class="mr-3 rounded-circle" alt="Customer Image">
                <div class="media-body">
                    <h5 class="mt-0">John </h5>
                    <p>This dairy product is fantastic! The flavor is rich and creamy, and I love how fresh it tastes. Highly recommended!</p>
                </div>
            </div>
            <div class="media mt-3">
                <img src="https://via.placeholder.com/64" class="mr-3 rounded-circle" alt="Customer Image">
                <div class="media-body">
                    <h5 class="mt-0">John</h5>
                    <p>Great quality! I use it in my smoothies every morning, and it adds the perfect texture. Will buy again.</p>
                </div>
            </div>
            <div class="media mt-3">
                <img src="https://via.placeholder.com/64" class="mr-3 rounded-circle" alt="Customer Image">
                <div class="media-body">
                    <h5 class="mt-0">Anagha</h5>
                    <p>I wasn't impressed. The taste was a bit off, and I expected better quality. Maybe I just got a bad batch.</p>
                </div>
            </div>
            <div class="media mt-3">
                <img src="https://via.placeholder.com/64" class="mr-3 rounded-circle" alt="Customer Image">
                <div class="media-body">
                    <h5 class="mt-0">Mathew</h5>
                    <p>Love this product! It has a nice balance of sweetness and creaminess, perfect for my recipes.</p>
                </div>
            </div>
            <div class="media mt-3">
                <img src="https://via.placeholder.com/64" class="mr-3 rounded-circle" alt="Customer Image">
                <div class="media-body">
                    <h5 class="mt-0">john</h5>
                    <p>Very good quality. It made my dishes taste so much better! Will definitely purchase again.</p>
                </div>
            </div>
            <div class="media mt-3">
                <img src="https://via.placeholder.com/64" class="mr-3 rounded-circle" alt="Customer Image">
                <div class="media-body">
                    <h5 class="mt-0">Anagha</h5>
                    <p>Not my favorite. I found it a bit too thick for my liking. I prefer a lighter texture.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<style>
.progress-label-left { float: left; margin-right: 0.5em; line-height: 1em; font-weight: bold; }
.progress-label-right { float: right; margin-left: 0.3em; line-height: 1em; font-weight: bold; }
.star-light { color: #e9ecef; }
</style>
