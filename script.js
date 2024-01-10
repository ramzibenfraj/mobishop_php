$(document).ready(function () {

    // banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1,
        loop: true,
        autoplay: true
    });

    // top sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // isotope filter
    var $productFilter = $(".product-filter").isotope({
        itemSelector: '.product-filter-item',
        layoutMode: 'fitRows'
    });

    // filter items on button click
    $(".button-group").on("click", "button", function () {
        var filterValue = $(this).attr('data-filter');
        $productFilter.isotope({ filter: filterValue });
    })


    // new phones owl carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // blogs owl carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            }
        }
    })

    // are you sure to delete
    $(".btn-danger").click(function (event) {
        if (!confirm("Are you sure?")) {
            // Prevent default behavior of the button if user clicks "Cancel"
            event.preventDefault();
            return;
        }
    });

    // select all input type file
    var imgInputs = $('input[type="file"][accept="image/*"]');
    imgInputs.each(function () {
        $(this).change(function () {
            var img = $(this).get(0).files[0];
            if (img) {
                var reader = new FileReader();
                reader.onload = function () {
                    $(this).parent().find('img').attr("src", reader.result);
                }.bind(this);
                reader.readAsDataURL(img);
            }
        });
    });


});
