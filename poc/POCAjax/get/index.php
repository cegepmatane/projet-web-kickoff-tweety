<button id="bouton" type="button">Faire une requête</button>

<script>
    (function() {
        var httpRequest;
        document.getElementById("bouton").addEventListener('click', makeRequest);

        function makeRequest() {
            httpRequest = new XMLHttpRequest();

            if (!httpRequest) {
                alert('Impossible de créer une instance de XMLHTTP');
                return false;
            }
            httpRequest.onreadystatechange = alertContents;
            httpRequest.open('GET', 'test.php');
            httpRequest.send();
        }

        function alertContents() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    alert(httpRequest.responseText);
                } else {
                    alert('Il y a eu un problème avec la requête.');
                }
            }
        }
    })();
</script>
