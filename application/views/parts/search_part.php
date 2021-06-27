<!-- Feature Product Section Start -->
<style>
    .card-arrow {
        width: 60px;
        height: 60px;
        /* background-color: #eeeeee; */
        position: absolute;
        top: 5px;
        left: -45px;
        text-align: center;
        line-height: 60px;
    }

    .ml4 {
        position: relative;
        font-weight: 500;
        font-size: 1.5em;
    }

    .ml4 .letters {
        position: absolute;
        margin: auto;
        left: 0;
        top: 0.3em;
        right: 0;
        opacity: 0;
    }

    .has-search .form-control {
        padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }

    .avatar-img {
        height: 40px;
        width: 40px;
    }

    .card-title {
        margin-top: 7px;
        margin-bottom: 0px !important;
    } 
</style>

<link rel="stylesheet" href="<?=base_url()?>assets/css/stagger.css">
<div class="product-section section mt-40">
    <div class="container">
        <div class="row">

            <!-- Section Title Start -->
            <div class="col-12 mb-40">
                <div class="section-title-one" data-title="SEARCH PARTS">
                    <h1>SEARCH PARTS</h1>
                </div>
            </div><!-- Section Title End -->

        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <div class="avatar mr-10 pull-left">
                            <img src="<?= base_url('assets/images/find_product/1.png') ?>" alt="user" class="avatar-img rounded-circle">
                        </div>
                        <h4 class="card-title pull-left"> &nbsp;Select Brand</h4>
                    </div>

                    <div class="list-group list-group-flush">
                        <?php foreach ($brands as $key => $b) { ?>
                            <a href="javascript:void(0)" onclick="get_series(<?= $b['id'] ?>)" class="list-group-item list-group-item-action hvr-shadow-radial animate__animated animate__fadeInUp _<?=$key+1?>"><?= $b['name'] ?></a>
                        <?php } ?>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-arrow animate__animated animate__fadeInLeft" id="seriex-arrow-div"><i id="seriex-arrow" class="fa fa-arrow-right text-danger" style="font-size:22px"></i></div>
                        <div class="avatar mr-10 pull-left">
                            <img src="<?= base_url('assets/images/find_product/2.png') ?>" alt="user" class="avatar-img rounded-circle">
                        </div>
                        <h4 class="card-title">Select Series</h4>
                    </div>
                    <div class="list-group list-group-flush" id="seriex">

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-arrow animate__animated animate__fadeInLeft" id="modelsx-arrow-div"><i id="modelsx-arrow" class="fa fa-arrow-right text-danger" style="font-size:22px"></i></div>
                        <div class="avatar mr-10 pull-left">
                            <img src="<?= base_url('assets/images/find_product/3.png') ?>" alt="user" class="avatar-img rounded-circle">
                        </div>
                        <h4 class="card-title">Select Model</h4>
                    </div>
                    <div class="list-group list-group-flush" id="modelsx">
                    </div>
                </div>
            </div>
            <div class="col-md-3 hidden" id="search_card">
                <div class="card">
                    <div class="card-header">
                        <div class="card-arrow animate__animated animate__fadeInLeft" id="search-arrow-div"><i id="search-arrow" class="fa fa-arrow-right text-danger" style="font-size:22px"></i></div>
                        <div class="avatar mr-10 pull-left">
                            <img src="<?= base_url('assets/images/find_product/4.png') ?>" alt="user" class="avatar-img rounded-circle">
                        </div>
                        <p class="card-title">Cannot Fing Your Model?</p>

                    </div>
                    <!-- Actual search box -->
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button class="btn btn-outline-warning btn-block">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature Product Section End -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script>
    function get_series(brand_id) {
        $.ajax({
            url: "<?= base_url('part/ajax_get_series/') ?>" + brand_id,
            type: "POST",
            beforeSend: function() {
                $('#seriex').html('<h5 class="ml4 text-center list-group-item list-group-item-action">' +
                    '<span class="letters letters-1">Loading...</span>' +
                    '<span class="letters letters-2">Loading...</span>' +
                    '<span class="letters letters-3">Loading...</span>' +
                    '</h5>');
                start_animation();
            },
            success: function(response) {
                $('#seriex-arrow-div').removeClass('animate__fadeInLeft');
                $('#seriex-arrow-div').addClass('animate__fadeOutRight');
                setTimeout(function() {
                    $('#seriex-arrow').removeClass('text-danger');
                    $('#seriex-arrow').addClass('text-success');
                    $('#seriex-arrow-div').removeClass('animate__fadeOutRight');
                    $('#seriex-arrow-div').addClass('animate__fadeInLeft');
                }, 500);
                $('#seriex').html(response);
            }
        });
    }

    function get_models(series_id) {
        $.ajax({
            url: "<?= base_url('part/get_models/') ?>" + series_id,
            type: "POST",
            beforeSend: function() {
                $('#modelsx').html('<h5 class="ml4 text-center">' +
                    '<span class="letters letters-1">Loading...</span>' +
                    '<span class="letters letters-2">Loading...</span>' +
                    '<span class="letters letters-3">Loading...</span>' +
                    '</h5>');
                start_animation();
            },
            success: function(response) {
                $('#modelsx-arrow-div').removeClass('animate__fadeInLeft');
                $('#modelsx-arrow-div').addClass('animate__fadeOutRight');
                setTimeout(function() {
                    $('#modelsx-arrow').removeClass('text-danger');
                    $('#modelsx-arrow').addClass('text-success');
                    $('#modelsx-arrow-div').removeClass('animate__fadeOutRight');
                    $('#modelsx-arrow-div').addClass('animate__fadeInLeft');
                }, 500);

                $('#search-arrow-div').removeClass('animate__fadeInLeft');
                $('#search-arrow-div').addClass('animate__fadeOutRight');
                setTimeout(function() {
                    $('#search-arrow').removeClass('text-danger');
                    $('#search-arrow').addClass('text-success');
                    $('#search-arrow-div').removeClass('animate__fadeOutRight');
                    $('#search-arrow-div').addClass('animate__fadeInLeft');
                }, 500);
                $('#modelsx').html(response);
                $('#search_card').show(500);

            }
        });
    }


    function search_parts() {

    }
    // Loading Animation Text
    function start_animation() {
        var ml4 = {};
        ml4.opacityIn = [0, 1];
        ml4.scaleIn = [0.2, 1];
        ml4.scaleOut = 3;
        ml4.durationIn = 800;
        ml4.durationOut = 600;
        ml4.delay = 500;

        anime.timeline({
                loop: true
            })
            .add({
                targets: '.ml4 .letters-1',
                opacity: ml4.opacityIn,
                scale: ml4.scaleIn,
                duration: ml4.durationIn
            }).add({
                targets: '.ml4 .letters-1',
                opacity: 0,
                scale: ml4.scaleOut,
                duration: ml4.durationOut,
                easing: "easeInExpo",
                delay: ml4.delay
            }).add({
                targets: '.ml4 .letters-2',
                opacity: ml4.opacityIn,
                scale: ml4.scaleIn,
                duration: ml4.durationIn
            }).add({
                targets: '.ml4 .letters-2',
                opacity: 0,
                scale: ml4.scaleOut,
                duration: ml4.durationOut,
                easing: "easeInExpo",
                delay: ml4.delay
            }).add({
                targets: '.ml4 .letters-3',
                opacity: ml4.opacityIn,
                scale: ml4.scaleIn,
                duration: ml4.durationIn
            }).add({
                targets: '.ml4 .letters-3',
                opacity: 0,
                scale: ml4.scaleOut,
                duration: ml4.durationOut,
                easing: "easeInExpo",
                delay: ml4.delay
            }).add({
                targets: '.ml4',
                opacity: 0,
                duration: 500,
                delay: 500
            });
    }
</script>