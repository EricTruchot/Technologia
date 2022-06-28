<form action="index.php?controller=user&task=login" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Mot de passe:</label>
    <input type="password" name="mdp" required>
    <!-- <input type="text" hidden name="idUser" value=""> -->
    <button type="submit">Connexion</button>
</form>





<!-- ==============================================================================================

    <form id="form" method="POST">
            <label><b>Email:</b></label>
            <input type="text" name="email" required>
            <label><b>Mot de passe:</b></label>
            <input type="password" name="mdp" required>
            <button id="button" class="btn" type="submit">Connexion</button>
        </form>
        <p id="error"></p>

<script>
        document.getElementById('button').addEventListener('click', (event) => {
        event.preventDefault();

        let URL = "index.php?controller=user&task=login"
        let form = document.getElementById('form')
        let formData = new FormData(form)
       
        fetch(URL, {
                body: formData,
                method: "post"
            })
            .then(function(response) {
                return response.json()
            })
            .then(function(data) {

                if(data == true ){
                    document.location.href = "index.php?controller=article&task=index"
                        alert("vous êtes connecté")
                }else

document.getElementById('error').innerText = data
                
            })
    })
    </script> -->