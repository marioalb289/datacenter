<!DOCTYPE html>
<head>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.5.6/slick.min.js"></script>
<style type="text/css">
    
    /* Slider */
.slick-slider
{
    position: relative;

    display: block;

    -moz-box-sizing: border-box;
         box-sizing: border-box;

    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;

    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;

    display: block;
    overflow: hidden;

    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;

    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;

    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;

    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;

    height: auto;

    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}

</style>

<script type="text/javascript">
    
    function myHandler(e) {
            $('.sliderMain').slick('slickPlay');
            } 

</script>

<style type="text/css">
    
    #slideBox {
        width: 1300px;
        max-height: 500px;
        overflow: hidden;
        margin: 1% auto;
        position: relative;
        top: 1em;
        background-color: #54585A;
        border-radius: .3em;
    }   
    
    video {
        background-color: black;
    }
    
    #slideBox .slick-vertical .slick-slide {
        border: none;
    }

    .sliderSidebar {
        width: 200px;
        height: 500px;
        float: left;
    }
    
    #slideBox .slick-vertical .slick-slide {
        border: none;
    }
    
    
    .sliderMain {
        width: 900px;
        height: 500px;
        position: relative;
        float: left;
    }

</style>
</head>
<body>

    <div id="slideBox">
    <!--Sidebar-->
    <div class="sliderSidebar">
        <div><img src="http://placehold.it/200x100"></div>
        <div><img src="http://placehold.it/200x100"></div>
        <div><img src="http://placehold.it/200x100"></div>
        <div><img src="http://placehold.it/200x100"></div>
        <div><img src="http://placehold.it/200x100"></div>
        <div><img src="http://placehold.it/200x100/C8102E/FFFFFFF?text=Video" /></div>
    </div>  

    <div id="main-image" class="sliderMain">
        <div><img src="http://placehold.it/900x500"></div>
        <div><img src="http://placehold.it/900x500"></div>
        <div><img src="http://placehold.it/900x500"></div>
        <div><img src="http://placehold.it/900x500"></div>
        <div><img src="http://placehold.it/900x500"></div>
        <div id="slide-video">
            <video autoplay loop width="900px">
                <source src="http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4" />
            </video>
        </div>
    </div>

    <script type="text/javascript">

$(document).ready(function(){
            $('.sliderMain').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.sliderSidebar',
                autoplay: true,
                autoplaySpeed: 3000
            });
            $('.sliderSidebar').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '.sliderMain',
                dots: false,
                centerMode: false,
                focusOnSelect: true,
                vertical: true,
                arrows: false
            });
            $('.sliderMain').on('afterChange', function(event, slick, currentSlide){
              if (currentSlide == 5) {
                $('.sliderMain').slick('slickPause');
                theVideo.play();
              }
            });

            document.getElementById('theVideo').addEventListener('ended',myHandler,false);

              

</script>



</body>

</html>
