document.addEventListener('DOMContentLoaded', (event) => {
    
    var ele = document.querySelector(".tpgb-scanning-blocks");
    if(ele){
        ele.addEventListener('click', function(event) {
            event.preventDefault();
            let block_type = false;
            
            ele.innerHTML = 'Scanning..';
            jQuery.post( ajaxurl, {
                action: 'tpgb_is_block_used_not',
                nonce: tpgb_disable_block_data.nonce,
                default_block : block_type,
            }, function( response ){
                if(response){
                    ele.parentElement.classList.add('after-scan');
                    let unused_block_count = 0;
                    Object.keys(response).forEach(function(key) {
                        var list_block = document.querySelector('[data-list-block='+key+']');   
                        if(list_block){
                            let newElement = document.createElement('span');
                            if(response[key]===1){
                                newElement.className = "tpgb-used-block";
                                newElement.textContent = 'In Use';
                            }else{
                                newElement.className = "tpgb-unused-block";
                                newElement.textContent = 'Unused';
                                unused_block_count++;
                            }
                            list_block.prepend(newElement)
                        }
                    });
                    ele.insertAdjacentHTML('beforebegin', '<div class="tpgb-unused-block-count">* '+unused_block_count+' Unused Blocks found!</div>');
                
                    var disable_block = document.querySelector(".tpgb-unused-disable-blocks");
                    if(disable_block){
                        disable_block.addEventListener('click', function(e) {
                            event.preventDefault();
                            disable_block.innerHTML = 'Disabling Unused Blocks..';
                            jQuery.post( ajaxurl, {
                                action: 'tpgb_unused_disable_block',
                                blocks: JSON.stringify(response),
                                nonce: tpgb_disable_block_data.disable_nonce,
                                default_block: block_type,
                            }, function( res ){
                                if(res && res==1){
                                    disable_block.innerHTML = 'Disabled Successfully!';
                                    setTimeout(function(){
                                        location.reload(true)
                                    }, 200);
                                }else{
                                    alert('server not found')
                                }
                            });
                        })
                    }
                }
                ele.innerHTML = 'Scan Unused Blocks';
            });
        })
    }
})