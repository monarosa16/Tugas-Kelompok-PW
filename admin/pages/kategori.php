<table>
    <tr>
        <td>Nama Kategori</td>
        <td>:</td>
        <td>
            <input type="hidden" id="kategori_id">
            <input type="text" id="kategori">
        </td>
    </tr>
    <tr>
        <td>
            <button id="btn" onclick="insert()">
                Tambah
            </button>
            <button onclick="send_update()" id="btn_update" hidden>
                Update
            </button>
        </td>
    </tr>
</table>

<hr>

<table id="data" border="1" cellspacing="0" cellpadding="10">
    <thead style="background-color: #B0E0E6;">
        <tr>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="table_data">

    </tbody>
</table>

<script>
    function load_data() {
        var xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const table = document.getElementById('table_data')
                const res = JSON.parse(this.responseText)

                table.innerHTML = null

                for (let key in res) {
                    var tr = document.createElement('tr')
                    var td_kat = document.createElement('td')
                    var td_aksi = document.createElement('td')
                    var upbtn = document.createElement('button')
                    var delbtn = document.createElement('button')
                    var data = res[key]

                    if (res.hasOwnProperty(key)) { 
                        upbtn.textContent = "Edit"
                        delbtn.textContent = "Delete"

                        upbtn.setAttribute('onclick', `update(${data['kategori_id']},'${data['kategori']}')`)
                        delbtn.setAttribute('onclick', `del(${data['kategori_id']})`)

                        td_aksi.append(upbtn, delbtn)
                        td_kat.textContent = data['kategori']

                        tr.append(td_kat, td_aksi)

                    }

                    table.append(tr)
                }

            }
        };
        xhttp.open("GET", "http://localhost/tubes_pw_baru/admin/pages/ajax/get-data.php", true);
        xhttp.send();
    }

    function update(id, kat) {
        const id_kat = document.getElementById('kategori_id')
        const kategori = document.getElementById('kategori')
        let btn = document.getElementById("btn");
        let btn_update = document.getElementById("btn_update");

        btn.hidden = true;
        btn_update.hidden = false;
        id_kat.value = id
        kategori.value = kat
    }

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

    function send_update() {
        var xhttp = new XMLHttpRequest();
        const id_kat = document.getElementById('kategori_id');
        const kategori = document.getElementById('kategori');
        let btn = document.getElementById("btn");
        let btn_update = document.getElementById("btn_update");

        
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                id_kat.value = null
                kategori.value = null
                alert('Berhasil Diupdate')
                load_data()

                btn.hidden = false;
                btn_update.hidden = true;
            }
        };
        xhttp.open("POST", "http://localhost/tubes_pw_baru/admin/pages/ajax/edit-kategori.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`id=${id_kat.value}&kategori=${kategori.value}`);
    }

    function del(id) {
        var xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert('Berhasil Dihapus')
                load_data()
            }
        };
        xhttp.open("POST", "http://localhost/tubes_pw_baru/admin/pages/ajax/delete-kategori.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`id=${id}`);
    }

    load_data()
</script>