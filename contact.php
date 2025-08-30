<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <title>Contact - Monte Carlo</title>
  <link rel="icon" type="image/png" href="imagini/logoMonteCarlo_transparent.png">
  <style>
    body {
      margin: 0;
      padding: 0;
      background: url('imagini/contactFundal.jpg') no-repeat center center fixed;
      background-size: cover;
      background-color: black;
      min-height: 100vh;
    }

    main h2 {
      color: yellow;
      text-align: center;
      margin-top: 20px;
    }

    .container-contact {
      display: flex;
      justify-content: space-between;
      gap: 40px;
      padding: 50px;
      max-width: 1000px;
      margin: 0 auto;
      color: yellow;
      background-color: rgba(0, 0, 0, 0.7);
      border-radius: 10px;
      align-items: stretch;
    }

    .formular-contact {
      flex: 1;
      padding-right: 50px;
      border-right: 3px solid #ffde59; /* linie verticala galbena */
    }

    .informatii-contact {
      flex: 1;
      padding-left: 20px;
    }

    .formular-contact h3,
    .informatii-contact h3 {
      margin-bottom: 20px;
      color: #ffde59;
    }

    .formular-contact form label {
      display: block;
      margin-top: 10px;
    }

    .formular-contact input,
    .formular-contact textarea {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 5px;
      border: none;
      font-size: 1rem;
    }

    .formular-contact textarea {
      margin-bottom: 20px;
    }

    .formular-contact button,
    .formular-contact .btn-inapoi {
      display: inline-block;
      width: 120px;
      padding: 10px 0;
      margin-right: 15px;
      background-color: #ffde59;
      color: black;
      border: none;
      border-radius: 10px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .formular-contact button:hover,
    .formular-contact .btn-inapoi:hover {
      background-color: #e6c200;
    }
  </style>
</head>

<body>
  <main>
    <h2>Contacteaza-ne</h2>
    <div class="container-contact">
      <!-- Form mesaj -->
      <div class="formular-contact">
        <h3>Trimite-ne un mesaj!</h3>
        <form id="formular-contact">
          <label for="nume">Nume <span style="color:red">*</span></label>
          <input type="text" id="nume" name="nume" required>

          <label for="email">Adresa de email <span style="color:red">*</span></label>
          <input type="email" id="email" name="email" required>

          <label for="subiect">Subiect <span style="color:red">*</span></label>
          <input type="text" id="subiect" name="subiect" required>

          <label for="mesaj">Mesaj <span style="color:red">*</span></label>
          <textarea id="mesaj" name="mesaj" rows="5" required></textarea>

          <button type="submit">Trimite</button>
          <a href="index.php" class="btn-inapoi">Inapoi</a>
        </form>
      </div>

      <!-- Informatii contact -->
      <div class="informatii-contact">
        <h3>Detalii:</h3>
        <p><strong>Contact:</strong><br>07123 456 025<br>restaurantmontecarlos@yahoo.com</p>
        <p><strong>Adresa noastra:</strong><br>Strada Birlad, Nr. 6<br>Galati</p>
      </div>
    </div>
  </main>

  <script>
  document.getElementById("formular-contact").addEventListener("submit", function (event) {
    event.preventDefault();

    const nume = document.getElementById("nume").value.trim();
    const email = document.getElementById("email").value.trim();
    const subiect = document.getElementById("subiect").value.trim();
    const mesaj = document.getElementById("mesaj").value.trim();

    if (!nume || !email || !subiect || !mesaj) {
      alert("Te rugam sa completezi toate campurile.");
      return;
    }

    const formData = new FormData();
    formData.append("nume", nume);
    formData.append("email", email);
    formData.append("subiect", subiect);
    formData.append("mesaj", mesaj);

    fetch("trimite_mesaj.php", {
      method: "POST",
      body: formData
    })
    .then(response => response.text())
    .then(data => {
  const mesajSucces = document.createElement("div");
  mesajSucces.textContent = data;
  mesajSucces.style.backgroundColor = "#dff0d8";
  mesajSucces.style.color = "black";
  mesajSucces.style.padding = "10px";
  mesajSucces.style.marginTop = "15px";
  mesajSucces.style.borderRadius = "5px";
  document.getElementById("formular-contact").appendChild(mesajSucces);

  document.getElementById("formular-contact").reset();
  
  //Sterge mesajul dupa 5 secunde
  setTimeout(() => mesajSucces.remove(), 5000);
})

    .catch(error => {
      console.error("Eroare la trimiterea formularului:", error);
      alert("A aparut o eroare. Incearca din nou.");
    });
  });
</script>

</body>
</html>
