<div id="messageMail"></div>
<input type="text" id="emailValue" placeholder="Email"/>

<script>
    (function() {
        var httpRequest;
        document.getElementById("emailValue").oninput = function() {
            var mail = document.getElementById("emailValue").value;
            makeRequest('verifier_email.php', mail);
        };

        function makeRequest(url, mail) {
            httpRequest = new XMLHttpRequest();

            if (!httpRequest) {
                alert("Erreur lors de la création de l'instance de XMLHTTP");
                return false;
            }
            httpRequest.onreadystatechange = afficher_message;
            httpRequest.open('POST', url);
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpRequest.send('email=' + encodeURIComponent(mail));
        }

        function afficher_message() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    var response = JSON.parse(httpRequest.responseText);
                    document.getElementById("messageMail").innerHTML = response.message;
                } else {
                    alert('Erreur lors de la requête. Contacter Yann ROUBEAU.');
                }
            }
        }
    })
    ();
</script>
