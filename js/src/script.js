var site = {

    // Variables
    base_url : 'http://localhost/wordpress-starter-v2/',

    mobileMenuStarted : false,

    mobileMenuPaused : false,

    mobileMenuWidth : 820,


    // Util : JS global
    util : {

        divers : function() {

            // Déclanchement de la lightbox
            $('.lightbox').nivoLightbox({
                effect: 'fall'
            });

            // Déclanchement du slider
            $('.bxslider').bxSlider();

            // Masquage des alertes de formulaires
            $('.wpcf7 .wpcf7-response-output').hover(function () {
                $(this).fadeOut();
            });

            // Création des custom selects
            $('.wpcf7 select').customSelect();

            // Player video responsive
            $('.ytplayer, .vimeoplayer').fitVids();

            // Le fallback pour les img en svg vers du PNG
            if (!Modernizr.svg) {
                $('img[src*="svg"]').attr('src', function () {
                    return $(this).attr('src').replace('.svg', '.png');
                });
            }
        },

        map : function() {

            function render_map( $el ) {

                // var
                var $markers = $el.find('.marker');

                // vars
                var args = {
                    zoom		: 16,
                    center		: new google.maps.LatLng(0, 0),
                    mapTypeId	: google.maps.MapTypeId.ROADMAP
                };

                // create map
                var map = new google.maps.Map( $el[0], args);

                // add a markers reference
                map.markers = [];

                // add markers
                $markers.each(function(){

                    add_marker( $(this), map );

                });

                // center map
                center_map( map );

            }

            function add_marker( $marker, map ) {

                // var
                var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

                // create marker
                var marker = new google.maps.Marker({
                    position	: latlng,
                    map			: map
                });

                // add to array
                map.markers.push( marker );

                // if marker contains HTML, add it to an infoWindow
                if( $marker.html() )
                {
                    // create info window
                    var infowindow = new google.maps.InfoWindow({
                        content		: $marker.html()
                    });

                    // show info window when marker is clicked
                    google.maps.event.addListener(marker, 'click', function() {

                        infowindow.open( map, marker );

                    });
                }

            }

            function center_map( map ) {

                // vars
                var bounds = new google.maps.LatLngBounds();

                // loop through all markers and create bounds
                $.each( map.markers, function( i, marker ){

                    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                    bounds.extend( latlng );

                });

                // only 1 marker?
                if( map.markers.length === 1 )
                {
                    // set center of map
                    map.setCenter( bounds.getCenter() );
                    map.setZoom( 16 );
                }
                else
                {
                    // fit to bounds
                    map.fitBounds( bounds );
                }

            }

            $('.acf-map').each(function(){
                render_map( $(this) );
            });
        },

        tab : function() {
            $('.tabs a').click(function(e){
                e.preventDefault();
                $(this).parent().siblings().children('a').removeClass('current');
                $(this).addClass('current');
                $(this).parent().parent().next('.panes').children('.pane').addClass('pane--inactive');
                $(this).parent().parent().next('.panes').children('.pane').eq($(this).parent().index()).removeClass('pane--inactive');
            });
        },

        mobile : function() {

            if($(window).width() < site.mobileMenuWidth && !site.mobileMenuStarted) {

                // SnapJS
                site.util.mobile.snapper = new Snap({
                    element: document.getElementById('page--content'),
                    disable: "right"
                });

                // Délenchement de snapJS
                $('.snap--switch').on('click', function(){
                    if( site.util.mobile.snapper.state().state === "left" ){

                        site.util.mobile.snapper.close();
                    } else {
                        site.util.mobile.snapper.open('left');
                    }
                });

                site.mobileMenuStarted = true;
            }

            // Le menu est démarré, pas en pause et l'écran est trop grand
            if (site.mobileMenuStarted && !site.mobileMenuPaused && $(window).width() > site.mobileMenuWidth) {

                site.util.mobile.snapper.disable();

                site.mobileMenuPaused = true;


            } // le menu est démarré, en pause et l'écran est trop petit
            else if (site.mobileMenuStarted && site.mobileMenuPaused && $(window).width() < site.mobileMenuWidth) {

                site.util.mobile.snapper.enable();

                site.mobileMenuPaused = false;

            }

        },

        init : function() {
            this.map();
            this.divers();
            this.tab();
            this.mobile();
            $(window).smartresize(function(){
                site.util.mobile();
            });
        }
    },

    // JS par pages
    pages : {

        home : {

            /* autre fonction js si nécessaire */


            /* fonction lancée au chargement de la page */
            layout : function() {

            },

            init : function(){

            }
        },

        events : {
            init : function(){
                var titleArticle = $('.events__article .events__title').html();
                $('.events__asideArticleTitle').each(function(){
                    if($(this).text() === titleArticle) {
                        $(this).parent().addClass('active');
                    }
                });
            }
        },


        /* Initalisation des pages */
        init : function(){
            this.page = $('#page').attr('data-page');

            if(this[this.page] !== undefined) {
                this[this.page].init();
            }
        }
    },

    init : function() {
        this.util.init();
        this.pages.init();
    }
};


jQuery(function(){
    site.init();


});
