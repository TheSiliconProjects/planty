/**
 * Post Image
 */
document.addEventListener('DOMContentLoaded', () => {
    let postImg = document.querySelectorAll('.tpgb-post-image');
    if(postImg){
        postImg.forEach((pi)=>{
            if(pi.classList.contains('post-img-bg')){
                let setting = pi.dataset.setting;
                setting = JSON.parse(setting);
                
                if (setting.imgType === 'background' && setting.imgLocation === 'section') {
                    var closestSection = pi.closest('.tpgb-section');
                    if (closestSection) {
                        closestSection.insertAdjacentHTML('afterbegin', tpOuterHTML(pi));
                    } else {
                        pi.closest('.tpgb-container-row').insertAdjacentHTML('afterbegin', tpOuterHTML(pi));
                    }
                    pi.remove();
                } else if (setting.imgType === 'background' && setting.imgLocation === 'column') {
                    var closestColumn = pi.closest('.tpgb-column');
                    if (closestColumn) {
                        closestColumn.insertAdjacentHTML('afterbegin', tpOuterHTML(pi));
                    } else {
                        pi.closest('.tpgb-container-col').insertAdjacentHTML('afterbegin', tpOuterHTML(pi));
                    }
                    pi.remove();
                }
            }

            if(pi.classList.contains('tpgb-fancy-add')){
                let BoxID = pi.dataset.id, 
                    Setting = JSON.parse(pi.dataset.fancyOption);
				jQuery('[data-fancybox="postImg-'+BoxID+'"]').fancybox({
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
function tpOuterHTML(element) {
    var wrapper = document.createElement('div');
    wrapper.appendChild(element.cloneNode(true));
    return wrapper.innerHTML;
}