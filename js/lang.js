function chooselang(value) {

            // set expiry date
            var expires = ""; 

            document.cookie = 'language = ' + value +'; expires=' + expires;

            window.location.reload();
} 


