/**
 * Social Feed
 */
document.addEventListener('DOMContentLoaded', () => {
    let allSocFeed = document.querySelectorAll('.tpgb-social-feed');
    if(allSocFeed){
        allSocFeed.forEach((sf)=>{
            let BoxID = sf.getAttribute("data-id"),
                Setting = (sf.getAttribute("data-fancy-option")) ? JSON.parse(sf.getAttribute("data-fancy-option")) : '',
                Get_SN = (sf.getAttribute("data-scroll-normal")) ? JSON.parse(sf.getAttribute("data-scroll-normal")) : '';

            jQuery('[data-fancybox="'+BoxID+'"]', this).fancybox({
                buttons : Setting.button,
                image: { 
                    preload: 0 
                },
                loop: Setting.loop,
                infobar: Setting.infobar,
                animationEffect: Setting.animationEffect,
                animationDuration: Setting.animationDuration,
                transitionEffect: Setting.transitionEffect,
                transitionDuration: Setting.transitionDuration,
                arrows: Setting.arrows,
                clickContent: Setting.clickContent,
                clickSlide: Setting.slideclick,
                dblclickContent: false,
                dblclickSlide: false,
                smallBtn: false,
                iframe : {
                    preload : 0
                },
                youtube : {
                    autoplay : 0
                },
                vimeo : {
                    autoplay : 0
                },
                mp4 : {
                    autoplay : 0
                },                    
                video: {
                    autoStart: 0
                },
            });

            let gridItem = sf.querySelectorAll('.grid-item.feed-Facebook');
            if(gridItem){
                gridItem.forEach((gi)=>{
                    let itemindex = gi.getAttribute('data-index');
                    jQuery('[data-fancybox="album-'+itemindex+'-'+BoxID+'"]',this).fancybox({
                        buttons : Setting.button,
                        image: { preload: true },
                        loop: Setting.loop,
                        infobar: Setting.infobar,
                        animationEffect:  Setting.animationEffect,
                        animationDuration: Setting.animationDuration,
                        transitionEffect: Setting.transitionEffect,
                        transitionDuration: Setting.transitionDuration,
                        arrows: Setting.arrows,
                        clickContent: Setting.clickContent,
                        clickSlide: Setting.slideclick,
                        dblclickContent: false,
                        dblclickSlide: false,
                    });
                })
            }

            if(Get_SN && Get_SN.ScrollOn === true && Get_SN.TextLimit === false) {
                let SF_Text = sf.querySelectorAll('.tpgb-message');
                if(SF_Text){
                    SF_Text.forEach(function(textElement) {
                        if (textElement.clientHeight >= Get_SN.Height) {
                            textElement.classList.add(Get_SN.className);
                            textElement.style.height = Get_SN.Height+"px";
                        }
                    });
                }
            }

            if (Get_SN.FancyScroll === true && Get_SN.TextLimit === false) {
                let SF_FyText = sf.querySelectorAll('.fancybox-si .tpgb-message');
                SF_FyText.forEach(function(textElement) {
                    textElement.classList.add(Get_SN.Fancyclass);
                    textElement.style.height = Get_SN.FancyHeight+"px";
                });
            }

            document.addEventListener('click', function(event) {
                readmoreText(event);
            });  

            function readmoreText(event){
                var target = event.target;
                if (target.classList.contains('readbtn') && target.closest('.tpgb-social-feed')) {
                    let getCsEl = target.closest('.tpgb-social-feed');
                    console.log(getCsEl);
                    let gtCuText =  target.getAttribute('aria-label');
                    var div = target.closest('.tpgb-message');
                    var container = div.closest('.tpgb-isotope .post-loop-inner');
                    var scrollNormal = Get_SN;
                    var showText = div.querySelector('.showtext');
            
                    if(div.classList.contains('show-text')) {
                        div.classList.remove('show-text', 'show-less');
                        target.innerHTML = gtCuText;
                        div.querySelector('.sf-dots').style.display = 'inline';
            
                        if (scrollNormal.ScrollOn === true && scrollNormal.TextLimit === true) {
                            showText.classList.remove(scrollNormal.className);
                            showText.removeAttribute('style');
                        }
                    }else{
                        div.classList.add('show-text', 'show-less');
                        target.innerHTML = 'Show Less';
                        div.querySelector('.sf-dots').style.display = 'none';
            
                        var SF_Text = sf.querySelectorAll('.showtext');
                        if (scrollNormal.ScrollOn === true && scrollNormal.TextLimit === true && SF_Text) {
                            SF_Text.forEach(function(textElement) {
                                if (textElement.clientHeight >= scrollNormal.Height) {
                                    showText.classList.add(scrollNormal.className);
                                    showText.style.height = scrollNormal.Height+"px";
                                }
                            });
                        }
                    }
            
                    if (container) {
                        var isotope = new Isotope(container, {
                            itemSelector: ".grid-item",
                            resizable: true,
                            sortBy: "original-order"
                        });
                        isotope.layout();
                    }
                }

                if (target.classList.contains('readbtn') && target.closest('.fancybox-si')) {
                    console.log('ccc');
                    let div = target.closest('.tpgb-message');
                    let Scroll = Get_SN;
                    let FcyMsg = target.closest('.tpgb-message');
            
                    if (div.classList.contains('show-text')) {
                        div.classList.remove('show-text', 'show-less');
                        target.innerHTML = 'Show More';
                        div.querySelector('.sf-dots').style.display = 'inline';
            
                        if (Scroll.FancyScroll === 'true' && Scroll.TextLimit === 'true') {
                            FcyMsg.classList.remove(Scroll.Fancyclass);
                            FcyMsg.removeAttribute('style');
                        }
                    } else {
                        div.classList.add('show-text', 'show-less');
                        target.innerHTML = 'Show Less';
                        div.querySelector('.sf-dots').style.display = 'none';
            
                        if (Scroll.FancyScroll === 'true' && Scroll.TextLimit === 'true') {
                            Array.from(FcyMsg).forEach(function(item) {
                                if (item.clientHeight >= Scroll.FancyHeight) {
                                    item.classList.add(Scroll.Fancyclass);
                                    item.style.height = Scroll.FancyHeight+"px";
                                }
                            });
                        }
                    }
                }
                this.removeEventListener('click',()=>{
                    readmoreText(event);
                })
            }             
        });
    }
});