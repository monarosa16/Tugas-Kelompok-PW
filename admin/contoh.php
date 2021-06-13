<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<li>
    <a id="home" class="nav-menu">
        Home
    </a>
</li>
<li>
    <a id="link" class="nav-menu">
        Link
    </a>
</li>
    
<hr>

<div id="konten">

</div>

<script>
    let navMenu = document.getElementsByClassName("nav-menu");

    let xhr = new window.XMLHttpRequest();

    for (let i = 0; i < navMenu.length; i++) {
        navMenu[i].addEventListener("click", function() {
            let menu = navMenu[i].getAttribute("id");

            xhr.open("GET", menu+'.php', true);
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let response = this.responseText;

                    document.getElementById("konten").innerHTML = response;
                }
            }
            xhr.send();
        });
    }
</script>

</body>
</html>