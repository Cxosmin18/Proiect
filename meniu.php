<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8" />
  <title>Vezi Meniul - Monte Carlo</title>
  <link rel="icon" type="image/png" href="imagini/logoMonteCarlo_transparent.png">
  <link rel="stylesheet" href="css/style.css" />
  
<style>
  body {
    background-image: url("imagini/veziMeniulFundal.jpg");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

  main {
    max-width: 1000px;
    margin: 40px auto;
    padding: 20px;
    padding-top: 100px;
    background-color: rgba(0, 0, 0, 0.7);
    border-radius: 10px;
    color: yellow;
}

  main h2 {
    text-align: center;
    margin-top: -50px;
}

  .fel-mancare {
    display: flex;
    align-items: center;
    background-color: rgba(255, 255, 255, 0.05);
    margin: 15px 0;
    padding: 12px;
    border-radius: 8px;
}

  .fel-mancare img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    margin-right: 20px;
    border-radius: 6px;
}

  .detalii-fel {
    flex: 1;
    font-size: 1.1rem;
}

  .pret {
    font-size: 1.2rem;
    font-weight: bold;
    color: #ffde59;
}

.dropdown-wrapper {
  position: relative;
  width: 220px;
  margin: 0 auto 30px auto;
  text-align: left;
  font-weight: bold;
}

.dropdown-btn {
  background-color: yellow;
  color: black;
  padding: 12px;
  border-radius: 8px;
  cursor: pointer;
  box-shadow: 2px 2px 5px black;
  text-align: center;
}

.dropdown-btn:hover {
  background-color: orange;
  color: white;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 220px;
  border-radius: 8px;
  box-shadow: 0px 8px 16px rgba(0,0,0,0.3);
  z-index: 999;
  overflow: hidden;
}

.dropdown-content div {
  padding: 12px;
  cursor: pointer;
  color: black;
}

.dropdown-content div:hover {
  background-color: #eee;
}

.meniu-controls {
  display: flex;
  justify-content: space-between;
  max-width: 1000px;
  margin: 0 auto;
  padding: 20px;
}

.btn-cos {
  background-color: yellow;
  color: black;
  padding: 12px 16px;
  border-radius: 8px;
  font-weight: bold;
  box-shadow: 2px 2px 5px black;
  cursor: pointer;
}

.btn-cos:hover {
  background-color: orange;
  color: white;
}

.btn-adauga {
  background-color: green;
  color: white;
  padding: 6px 12px;
  border-radius: 6px;
  font-weight: bold;
  border: none;
  cursor: pointer;
}

.btn-adauga:hover {
  background-color: darkgreen;
}

#dropdown-content {
  display: none;
}
#dropdown-content.show {
  display: block;
}

#cos-produse {
    display: none;
}


</style>
</head>

<body>
  <header>
    <img src="imagini/logoMonteCarlo_transparent.png" alt="Logo Monte Carlo" class="logo" />
    <h1>Monte Carlo</h1>
    <nav>
      <a href="index.php">Acasa</a>
      <a href="meniu.php" class="activ">Vezi meniul</a>
      <a href="despre.php">Despre Noi</a>
	  <a href="programare.php">Programare</a>
      <a href="contact.php">Contact</a>
    </nav>
  </header>
  
  <div class="meniu-controls">
  <div class="dropdown">
    <div class="dropdown-btn" onClick="toggleDropdown()">Alege categoria</div>
    <div class="dropdown-content" id="dropdown-content">
      <div onClick="filtreaza('toate')">Toate</div>
      <div onClick="filtreaza('Feluri principale')">Feluri principale</div>
      <div onClick="filtreaza('Pizza')">Pizza</div>
      <div onClick="filtreaza('Bauturi')">Bauturi</div>
    </div>
  </div>

  <button class="btn-cos" onClick="deschideCos()">Vezi cosul</button>
</div>

  <main>
    <h2>Meniul nostru</h2>
    <div class="categorie feluri-principale">
      <h3>Feluri principale</h3>
      <div class="fel-mancare feluri-principale">
        <img src="imagini/sarmale.jpg" alt="Sarmale" />
        <div class="detalii-fel">
          <strong>Sarmale traditionale</strong><br />
          Servit cu mamaliguta
        </div>
        <div class="pret">25 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	  
      <div class="fel-mancare feluri-principale">
        <img src="imagini/piept_pui_gratar.jpeg" alt="Piept de pui la gratar" />
        <div class="detalii-fel">
          <strong>Piept de pui la gratar</strong><br />
          Servit cu cartofi prajiti
        </div>
        <div class="pret">33 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	  
      <div class="fel-mancare feluri-principale">
        <img src="imagini/snitel_pui.jpg" alt="Snitel de pui" />
        <div class="detalii-fel">
          <strong>Snitel de pui</strong><br />
          Crocant si rumenit
        </div>
        <div class="pret">26 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	  
      <div class="fel-mancare feluri-principale">
        <img src="imagini/snitel_porc.jpg" alt="Snitel de porc" />
        <div class="detalii-fel">
          <strong>Snitel de porc</strong><br />
          Clasic si gustos
        </div>
        <div class="pret">27 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	  
      <div class="fel-mancare feluri-principale">
        <img src="imagini/snitel_vienez.jpg" alt="Snitel vienez" />
        <div class="detalii-fel">
          <strong>Snitel vienez</strong><br />
          Specialitate vieneza cu sos lamaie
        </div>
        <div class="pret">34 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	  
      <div class="fel-mancare feluri-principale">
        <img src="imagini/cascaval_pane.jpg" alt="Cascaval pane" />
        <div class="detalii-fel">
          <strong>Cascaval pane</strong><br />
          Crocant si cremos
        </div>
        <div class="pret">31 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	</div>

    <div class="categorie pizza">
      <h3>Pizza</h3>
      <div class="fel-mancare pizza">
        <img src="imagini/pizza_margherita.jpg" alt="Pizza Margherita" />
        <div class="detalii-fel">
          <strong>Pizza Margherita</strong><br />
          Rosii, mozzarella, busuioc
        </div>
        <div class="pret">40 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	  
      <div class="fel-mancare pizza">
        <img src="imagini/pizza_pepperoni.jpg" alt="Pizza Pepperoni" />
        <div class="detalii-fel">
          <strong>Pizza Pepperoni</strong><br />
          Salam picant, mozzarella, sos rosu
        </div>
        <div class="pret">49 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	 </div>

    <div class="categorie bauturi">
      <h3>Bauturi</h3>
      <div class="fel-mancare bauturi">
        <img src="imagini/wine.jpg" alt="Vin rosu" />
        <div class="detalii-fel">
          <strong>Vin rosu</strong><br />
          Pahar de 150 ml
        </div>
        <div class="pret">20 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	  
      <div class="fel-mancare bauturi">
        <img src="imagini/apa.jpg" alt="Apa minerala" />
        <div class="detalii-fel">
          <strong>Apa minerala</strong><br />
          Sticla de 500 ml
        </div>
        <div class="pret">6 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	  
      <div class="fel-mancare bauturi">
        <img src="imagini/apa_plata.jpg" alt="Apa plata" />
        <div class="detalii-fel">
          <strong>Apa plata</strong><br />
          Sticla de 500 ml
        </div>
        <div class="pret">6 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	  
      <div class="fel-mancare bauturi">
        <img src="imagini/bere.jpg" alt="Bere" />
        <div class="detalii-fel">
          <strong>Bere</strong><br />
          Sticla 330 ml
        </div>
        <div class="pret">13 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
	  
      <div class="fel-mancare bauturi">
        <img src="imagini/limonada.jpg" alt="Limonada" />
        <div class="detalii-fel">
          <strong>Limonada</strong><br />
          Bautura racoritoare naturala
        </div>
        <div class="pret">15 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in coș</button>
        </div>
      </div>
	  
      <div class="fel-mancare bauturi">
        <img src="imagini/whiskey.jpg" alt="Whiskey" />
        <div class="detalii-fel">
          <strong>Whiskey</strong><br />
          Pahar de 50 ml
        </div>
        <div class="pret">20 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adaugă în coș</button>
        </div>
      </div>
	  
      <div class="fel-mancare bauturi">
        <img src="imagini/vodka.jpg" alt="Vodka" />
        <div class="detalii-fel">
          <strong>Vodka</strong><br />
          Pahar de 50 ml
        </div>
        <div class="pret">25 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adaugă în cos</button>
        </div>
      </div>
	  
      <div class="fel-mancare bauturi">
        <img src="imagini/cocktails.png" alt="Cocktails" />
        <div class="detalii-fel">
          <strong>Cocktail</strong><br />
          Cu gust de capsuni
        </div>
        <div class="pret">35 RON</div>
		<!--Cant + Adauga in cos -->
		<div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
          <label>Cantitate: </label>
          <input type="number" min="1" value="1" class="cantitate" style="width: 50px;" />
          <button class="btn-adauga" onClick="adaugaInCos(this)">Adauga in cos</button>
        </div>
      </div>
    </div>
	
  </main>

  <script>
  window.addEventListener('scroll', function () {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
      header.classList.add('shrink');
    } else {
      header.classList.remove('shrink');
    }
  });

  function toggleDropdown() {
  document.getElementById('dropdown-content').classList.toggle('show');
}

function filtreaza(categorie) {
  const feluri = document.querySelectorAll('.fel-mancare');

  if (categorie === 'toate') {
    feluri.forEach(fel => {
      fel.style.display = 'flex';
    });
  } else {
    feluri.forEach(fel => {
      if (fel.classList.contains(categorie.toLowerCase().replace(/\s/g, '-'))) {
        fel.style.display = 'flex'; //afiseaza doar ce e în categorie
      } else {
        fel.style.display = 'none'; //ascunde restul
      }
    });
  }
  //inchide dropdown-ul dupa selectare
  toggleDropdown();
}

  //cosul de cumparaturi
  let cos = [];

  function adaugaInCos(btn) {
    const card = btn.closest('.fel-mancare');
    const nume = card.querySelector('strong').textContent;
    const cantitate = parseInt(card.querySelector('.cantitate').value);

    const existent = cos.find(item => item.nume === nume);
    if (existent) {
      existent.cantitate += cantitate;
    } else {
      cos.push({ nume, cantitate });
    }

    alert(`Adaugat ${cantitate} x ${nume} în cos!`);
  }

  function deschideCos() {
    if (cos.length === 0) {
      alert('Coșul este gol.');
      return;
  }
  
  
  //const cosJSON = JSON.stringify(cos);
  
  //document.getElementById('cos_json').value = cosJSON;
  //Trimit formularul
  //document.getElementById('form-cos').submit();
}

</script>


  <footer>
    <p>&copy; 2025 Monte Carlo</p>
  </footer>
</body>
</html>

