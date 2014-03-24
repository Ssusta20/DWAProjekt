<!DOCTYPE html> 
<html>
    <head>
        <link href="css/all.css" rel="stylesheet" type="text/css"/>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <style media="all" type="text/css">
        </style>
        <title>Lead - detalji </title>
    </head>
    <body>
        <form class="unos" action="" method="POST">
            <h1>Leadovi detalji</h1>
            <button> Ažuriraj </button>
            <button> Obriši </button>
            <br>
            <label>Šifra:</label>
            <input type="text" name="sifra" value="" required />
            <br>
            <label>Ime:</label>
            <input type="text" name="ime" value="" required />
            <br>
            <label>Prezime:</label>
            <input type="text" name="prezime" value="" required />
            <br>
            <label>Email:</label>
            <input type="email" name="email" value="" required />
            <br>
            <label>Telefon:</label>
            <input type="text" name="telefon" value="" required />
            <br>
            <label>Napomena:</label>
            <textarea name="telefon" value="" cols = "30" rows = "6" maxlength = "2000" required></textarea> 
            <br>
            <label>Kvalifikacija:</label>
            <select>
                <!-- Popunjavanje iz baze-->
                <option value="1">Test1</option>
                <option value="2">Test2</option>
                <option value="3">Test3</option>
                <option value="4">Test4</option>
            </select>
            
            <!-- Fale još stvari oko adrese. To će se napraviti kada se ažurira baza-->
            
        </form>
    </body>
</html>