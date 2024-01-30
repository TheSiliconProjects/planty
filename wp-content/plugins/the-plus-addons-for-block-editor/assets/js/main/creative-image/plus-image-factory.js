/**
 * Creative Image
 */
document.addEventListener('DOMContentLoaded', () => {
    let creaImg = document.querySelectorAll('.tpgb-creative-image');
    if(creaImg){
        creaImg.forEach((ci)=>{
            /**Fancybox*/
            let tpImg = ci.querySelector('.tpgb-animate-image.tpgb-fancy-add');
            if(tpImg) {
                let BoxID = tpImg.dataset.id,
                    Setting = JSON.parse(tpImg.dataset.fancyOption);

                jQuery('[data-fancybox="fancyImg-'+BoxID+'"]').fancybox({
                    buttons : Setting && Setting.button ?  Setting.button : '',
                    image: {
                        preload: true
                    },
                    loop: true,
                    animationEffect:  (Setting.animationEffect=='none' ? false : Setting.animationEffect),
                    animationDuration: Setting.animationDuration,

                    clickContent:'next',
                    clickSlide:'close',
                    dblclickContent: false,
                    dblclickSlide: false,
                });
            }

        });
    }
});