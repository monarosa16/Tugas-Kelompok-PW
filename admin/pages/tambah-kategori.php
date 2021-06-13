Nama Kategori : <input type="text" id="kategori">
<button onclick="insert()">
    Simpan
</button>

<script>
    function insert() {
        let kategori = document.getElementById("kategori").value;

        if (kategori != "") {
            let data = { kategori : kategori };
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "http://localhost/tubes_pw_baru/admin/pages/insertKategori.php", true);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    var response = this.responseText;
                    if(response == 1){
                        alert("Insert successfully.");

                        window.location.replace('?page=kategori');

                        document.getElementById("kategori").value = "";
                    }
                }
            };

            xhttp.setRequestHeader("Content-Type", "application/json");

            xhttp.send(JSON.stringify(data));

        } else {    
            alert('Data Tidak Boleh Kosong');
        }

    }
</script>