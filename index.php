<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dejeu Crew</title>
    <link rel="stylesheet" href="assets/landingPage.css">
    <link rel="stylesheet" href="assets/landing-page-nav.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php" title="Home">D | C</a></li>
        <li><a href="about.php" title="About">ABOUT</a></li>
        <li><a href="photo.php" title="Photo">PHOTO</a></li>
        <li><a href="film.php" title="Film">FILM</a></li>
        <li><a href="contact.php" title="Contact">CONTACT</a></li>
        <li><a href="info.php" title="Info">INFO</a></li>
    </ul>
</nav>
<div class="video-wrapper">
    <video autoplay muted loop id="video">
        <source src="assets/videos/background.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

<div class="container">
    <div class="title">
        <h1>Dejeu Crew</h1><br>

        <!--        <h2>Film & Photo</h2>-->
        <h2>
            <div class="typewrite" data-period="3000"
                 data-type='[ "Film & Photo" ]'>
            </div>
            <span class="wrap"></span>
        </h2>
    </div>
</div>

<script>
    var TxtType = function (el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 3000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function () {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        // if (this.isDeleting) {
        //     delta /= 2;
        // }
        //
        // if (!this.isDeleting && this.txt === fullTxt) {
        //     delta = this.period;
        //     this.isDeleting = true;
        // } else if (this.isDeleting && this.txt === '') {
        //     this.isDeleting = false;
        //     this.loopNum++;
        //     delta = 500;
        // }

        setTimeout(function () {
            that.tick();
        }, delta);
    };

    window.onload = function () {
        var elements = document.getElementsByClassName('typewrite');
        for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        // css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>
</body>
</html>