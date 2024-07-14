


const body = document.body;
const theme = localStorage.getItem('theme')

if (theme)
    document.documentElement.setAttribute('data-bs-theme', theme)



// var owl = $('.product-carousel');
// owl.owlCarousel({
//     rtl:true,
//     loop:true,
//     dots: true,
//     autoplay:true,
//     margin:8,
//     nav:false,
//     navText : ['<i class="fas fa-arrow-right btn-outline-dark rounded p-2"></i>','<i class="fas fa-arrow-left btn-outline-dark rounded p-2"></i>'],
//     autoplayHoverPause:true,
//     responsive:{
//         0:{
//             items:2
//         },
//         600:{
//             items:3
//         },
//         1000:{
//             items:5
//         }
//     }
// })

