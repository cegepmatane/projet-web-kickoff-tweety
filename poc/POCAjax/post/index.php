<label>Votre nom :
    <input type="text" id="nomTextbox" />
</label>
<span id="bouton" style="cursor: pointer; text-decoration: underline">
  Lancer une requête
</span>

<script>
    (function() {
        var httpRequest;
        document.getElementById("bouton").onclick = function() {
            var nom = document.getElementById("nomTextbox").value;
            makeRequest('test.php', nom);
        };

        function makeRequest(url, nom) {
            httpRequest = new XMLHttpRequest();

            if (!httpRequest) {
                alert('Impossible de créer une instance de XMLHTTP');
                return false;
            }
            httpRequest.onreadystatechange = alertContents;
            httpRequest.open('POST', url);
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpRequest.send('nom=' + encodeURIComponent(nom));
        }

        function alertContents() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    var response = JSON.parse(httpRequest.responseText);
                    alert(response.computedString);
                } else {
                    alert('Un problème est survenu avec la requête.');
                }
            }
        }
    })();
</script>
