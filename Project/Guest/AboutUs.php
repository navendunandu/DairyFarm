<?php
include("../Assets/Connection/Connection.php");
?>
<html>
<head>
    <title>About Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-color: #28a745; /* Green background */
            color: white; /* White text for readability */
        }
        .container {
            background-color: white; /* White background for content */
            color: black; /* Black text inside the container */
            padding: 20px;
            border-radius: 8px; /* Rounded corners for the container */
        }
    </style>
</head>
<body>

<div class="container bg-white p-4 rounded">
    <!-- Welcome Heading -->
    <h1 class="text-center text-success my-5"><strong><u>WELCOME TO DAIRY FRESH</u></strong></h1>
    
    <!-- About Dairy Farm & History -->
    <section>
        <h2 class="mb-4">Know About Our Dairy Farm & Our History</h2>
        <ul class="list-unstyled">
            <li class="mb-3">
                <strong>
                    "Dairy Fresh is a family-owned and operated dairy farm and processing facility, dedicated to delivering exceptional, organic, and healthy dairy products. Nestled on 20 acres of lush pastures, our state-of-the-art facility is home to 500+ Holstein cows. We offer certified organic and wholesome products crafted with care for discerning customers."
                </strong>
            </li>
        </ul>
    </section>
    
    <!-- Our Legacy -->
    <section>
        <h2 class="my-4">Our Legacy</h2>
        <p>
            <strong>Dairy Fresh</strong> was founded in 2010 by John, inspired by a passion for sustainable farming. Our family's generations-old commitment to quality serves as the foundation for our success.
        </p>
    </section>

    <!-- Our Farm -->
    <section>
        <h2 class="my-4">Our Farm</h2>
        <p>Our picturesque 20-acre farm is home to 500+ contented cattle, raised with utmost care and fed organic, non-GMO feed. We follow sustainable farming practices to ensure:</p>
        <ul class="list-group mb-3">
            <li class="list-group-item">Sustainable farming practices</li>
            <li class="list-group-item">Organic and non-GMO feed</li>
            <li class="list-group-item">Humane animal treatment</li>
        </ul>
    </section>

    <!-- Awards and Accolades -->
    <section>
        <h2 class="my-4">Awards and Accolades</h2>
        <ul class="list-group mb-3">
            <li class="list-group-item">National Dairy Farm Award (2022)</li>
            <li class="list-group-item">Organic Farming Certification (2020)</li>
            <li class="list-group-item">Best Local Dairy Producer (2018)</li>
            <li class="list-group-item">USDA Organic Certification (2014)</li>
            <li class="list-group-item">Certified Humane, Humane Farm Animal Care (2011)</li>
            <li class="list-group-item">Top 10 Organic Dairy Brands, Industry Magazine</li>
        </ul>
    </section>

    <!-- Processing Facility and Quality Testing -->
    <section>
        <h2 class="my-4">Processing Facility and Quality Testing</h2>
        <p>Our facility includes advanced technology to ensure premium quality and hygiene:</p>
        <ul class="list-group mb-3">
            <li class="list-group-item">Milk Pasteurization Units</li>
            <li class="list-group-item">Ultra-High Temperature (UHT) Processing</li>
            <li class="list-group-item">Centrifugal Separators</li>
            <li class="list-group-item">Cheese Culturing and Aging Tanks</li>
            <li class="list-group-item">Yogurt Incubation and Packaging Lines</li>
            <li class="list-group-item">Butter Churning and Wrapping Machines</li>
            <li class="list-group-item">Microfiltration/Ultrafiltration Systems</li>
        </ul>
        <p>Rigorous quality testing includes:</p>
        <ul class="list-group mb-3">
            <li class="list-group-item">Microbial analysis</li>
            <li class="list-group-item">Somatic cell count</li>
            <li class="list-group-item">Milk composition analysis</li>
            <li class="list-group-item">Sensory evaluation</li>
        </ul>
    </section>

    <!-- Delivery Network -->
    <section>
        <h2 class="my-4">Delivery Network</h2>
        <ul class="list-group mb-3">
            <li class="list-group-item">Refrigerated transportation</li>
            <li class="list-group-item">Insulated packaging</li>
            <li class="list-group-item">Real-time tracking</li>
        </ul>
    </section>

    <!-- What Makes Us Different -->
    <section>
        <h2 class="my-4">What Makes Us Different?</h2>
        <ul class="list-group mb-3">
            <li class="list-group-item">Organic and sustainable practices</li>
            <li class="list-group-item">Exceptional product quality</li>
            <li class="list-group-item">Uncompromising freshness</li>
            <li class="list-group-item">Gluten-free, non-GMO products</li>
            <li class="list-group-item">Stringent quality control</li>
            <li class="list-group-item">Advanced processing with minimal human contact</li>
            <li class="list-group-item">Convenient, real-time tracked delivery</li>
        </ul>
    </section>

    <!-- Closing Statement -->
    <div class="text-center mt-5">
        <h4><u><em>Join the Dairy Fresh family and discover a better dairy experience.</em></u></h4>
    </div>
</div>

</body>
</html>
