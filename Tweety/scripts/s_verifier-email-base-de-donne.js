(function() {
    var httpRequest;
    document.getElementById("email").oninput = function() {
        var mail = document.getElementById("email").value;
        makeRequest('verifier-email-base-de-donne.php', mail);
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

    function afficher_message()
    {
        if (httpRequest.readyState === XMLHttpRequest.DONE)
        {
            if (httpRequest.status === 200)
            {
                var response = JSON.parse(httpRequest.responseText);
                document.getElementById("messageMail").innerHTML = response.message;
                if(response.message === "")
                {
                    document.getElementById("messageMail").style.border="none";
                }
                else
                {
                    document.getElementById("messageMail").style.borderStyle="solild";
                }
            }
            else {
                alert('Erreur lors de la requête. Contacter Yohann Vitale.');
            }
        }
    }
})
();


