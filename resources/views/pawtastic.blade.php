<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pawtastic</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">
    <style>

        /* Define custom CSS variables */
        :root {
            --button-background-color: white;
            --button-text-color: black;
        }

        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }

        header {
            position: relative;
            text-align: left;
            color: white;
            background-image: url('https://wallpapers.com/images/hd/golden-retriever-dog-playing-with-bubbles-y4a7me3kgkujl5ws.jpg');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-end;
        }

        header h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-right: 20%;
            text-align: left;
        }

        nav {
            text-align: left;
            padding-right: 20%;
        }

        nav a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            text-align: left;
        }

        .content-container {
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-top: -200px;
        }

        .about-section,
        .contact-section {
            display: flex;
            align-items: center;
            height: 100vh;
        }

        .about-text {
            flex: 1;
            width: 15%;
            padding: 0px 5% 0 15%; /* top right bottom left */
            text-align: left;
            margin-top: -250px;
        }

        .about-text h1 {
            font-size: 48px;
        }
        .about-text p {
            font-size: 24px; /* Increase the font size for the paragraph element */
        }

        .about-images {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Use 1fr for equal width columns */
            grid-gap: 20px;
            width: 45%; /* Adjust width */
            padding: 10% 5% 10% 5%; /* top right bottom left */
            height: auto;
        }

        .about-images img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .contact-section {
            display: flex;
            align-items: flex-start; /* Align items to the top */
            height: 100vh;
        }

        .contact-content {
            width: 35%;
            padding: 20px;
            background: url('https://i.pinimg.com/564x/8c/89/53/8c89537d98afe46f7772917bdce5242e.jpg') center/cover no-repeat;
            color: white;
            height: 100%;
        }

        .contact-content h1 {
            font-size: 48px;
            margin-top: 10%;
            margin-bottom: 10px;
            text-align: center;
        }

        .contact-content ul {
            padding-left: 30%; /* Add left padding to create centered appearance */
            margin-top: 10px;
            text-align: left; /* Left-align the list items */
            list-style-type: disc; /* Set bullet point style to disc */
        }

        .contact-content li {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .schedule-visit {
            height:  100%;
            width: 65%;
            background-color: #f4f4f4;
            /* padding: 10% ; */
            border-radius: 5px;
            padding: 0% 10% 2% 10%; /* top right bottom left */
            text-align: left;

        }

        .schedule-visit h1 {
            font-size: 48px;
            margin-top: 10%;
            margin-left: 15%;
            margin-right: 15%;
            padding-bottom: 5%;
        }

        .schedule-button-white{
            background-color: white;
            color: black;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .schedule-button-black {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <div class="content-container">
            <nav>
                <a href="#about">About Us</a>
                <a href="#contact">Schedule a visit</a>
            </nav>
            <h1>{{ $home->header_line }}</h1>
            <a class="schedule-button-white" href="#contact">Schedule a visit</a>
        </div>
    </header>

    <section class="about-section" id="about">
        <div class="about-text">
            <h1>{{ $home->about_title }}</h1>
            <p>{{ $home->about_content }}</p>
            <a class="schedule-button-black" href="#contact">Schedule a visit</a>
        </div>
        <div class="about-images">
            <img src="https://i.pinimg.com/564x/c1/ea/01/c1ea0147b39220bfb0e7c707b8334e22.jpg" alt="Image 1">
            <img src="https://i.pinimg.com/564x/d9/31/0b/d9310b80bc1a86037d7294b3bebd4633.jpg" alt="Image 2">
            <img src="https://i.pinimg.com/564x/45/37/c3/4537c390192d258f3a35ca7517351775.jpg" alt="Image 3">
            <img src="https://i.pinimg.com/564x/32/b9/a0/32b9a0158c8acc11549c9a1b52726d79.jpg" alt="Image 4">
        </div>
    </section>

    <section class="contact-section" id="contact">
        <div class="contact-content">
            <h1>All Services Include</h1>
            <ul>
                @foreach ($services as $service)
                    <li>{{ $service->description }}</li>
                @endforeach
            </ul>
        </div>
        <div class="schedule-visit">
            <h1>We'll take your dog for a walk. Just tell us when!</h1>
            @livewire('schedule-service')

    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts

</body>
</html>
