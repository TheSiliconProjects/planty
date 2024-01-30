// Js For Splide Slider
let slideStore = new Map();

document.addEventListener('DOMContentLoaded', function() {
    var scope = document.querySelectorAll('.tpgb-carousel');
    if(scope){
        scope.forEach(function(obj){
            splide_init(obj)
        });
    }
});

function splide_init(ele){
    var slide = new Splide( ele ).mount( ( window.splide && window.splide !== undefined && window.splide.Extensions) ? window.splide.Extensions : '' );
	slideStore.set( ele, slide);
}