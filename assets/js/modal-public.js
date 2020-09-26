{

    function getJSONP(url, success) {

        var ud = '_' + +new Date,
            script = document.createElement('script'),
            head = document.getElementsByTagName('head')[0] 
                || document.documentElement;

        window[ud] = function(data) {
            head.removeChild(script);
            success && success(data);
        };

        script.src = url.replace('callback=?', 'callback=' + ud);
        head.appendChild(script);

    }

    function autoFancybox() {

        let fileElements = document.querySelectorAll( 'a[href*=".mp4"], a[href*=".png"], a[href*=".gif"], a[href*=".jpg"], a[href*=".jpeg"], a[href*="youtube.com"], a[href*="youtu.be"], a[href*="vimeo.com"], a[href*="google.com/maps"]' );

        Array.prototype.forEach.call( fileElements, function ( fileElement ) {

            if ( ! fileElement.classList.contains( "ignore-fancybox" ) && ! fileElement.classList.contains( "cancel-fancybox" ) && ! fileElement.hasAttribute( 'data-fancybox' ) ) {

                fileElement.setAttribute( "data-fancybox", "" );

            }

        } );

        let classElements = document.querySelectorAll( '[class*=modal-popup-]' );

        Array.prototype.forEach.call( classElements, function ( classElement ) {

            let classes = classElement.className.split( " " ),
                inlineContent;

            var elementID,
                elementContent = '',
                elementGroup = '';

            for ( let i = 0; i < classes.length; i++ ) {

                if ( classes[i].startsWith( "modal-popup-" ) ) {

                    elementID = classes[i].split( "modal-popup-" )[1];

                    classElement.classList.remove( classes[i] );
                    classElement.classList.add( "wp-post-modal-inline-link" );

                    classElement.setAttribute( "data-src", "#modal-popup-" + elementID );
                    classElement.setAttribute( "data-touch", "false" );
                    classElement.setAttribute( "data-fancybox", "" );
                    classElement.style.cursor = "pointer";

                    inlineContent = document.createElement( "div" );
                    inlineContent.classList.add( "wp-post-modal-inline-content" );
                    inlineContent.id = "modal-popup-" + elementID;
                    inlineContent.style.display = "none";
                    inlineContent.innerHTML = '<span class="loading-dots">Loading</span>';
                    document.body.appendChild( inlineContent );

                    fetch( 
                        document.location.origin + "/wp-json/wp/v2/modal-popup/" + elementID, 
                        {
                            method: 'GET'
                        } 
                    ).then( 
                        
                        function ( response ) {

                            if ( response.ok ) {

                                return response.json();

                            } else {

                                return Promise.reject( response );

                            }

                        } 
                    
                    ).then(
                        
                        function ( data ) {
                            
                            classElement.setAttribute( "data-fancybox", data.modal_group_id );
                            inlineContent.innerHTML = data.content.rendered;

                        }
                    
                    ).catch(
                        
                        function ( err ) {

                            console.warn( 'Something went wrong.', err );

                        } 

                    );

                }

            }

        } );

    }

    autoFancybox();

}
