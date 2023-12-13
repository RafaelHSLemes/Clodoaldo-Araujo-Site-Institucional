<?php

include_once("empresas/ca3.php");
include_once("empresas/ca3_steel.php");
include_once("empresas/circuit.php");

// Verifica se o botão foi clicado
if (isset($_POST['rocketLaunch'])) {
  echo '<script>
          document.addEventListener("DOMContentLoaded", function() {
              document.getElementById("popup-container").style.display = "block";
          });
      </script>';
}

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pagina Inicial || Clodoaldo Araújo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/dist/css/swiper-bundle.min.css">

  <style>
    .container-quem-sou {
      display: flex;
      margin-top: 40px;
      font-family: Montserrat, sans-serif;
      background-color: #e2e2e2;
    }

    h1 {
      font-family: Montserrat, sans-serif;
    }

    .div-quem-sou {
      flex: 1;
      box-sizing: border-box;
      margin: 0px 20px 0px 20px;
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      justify-content: center;
    }

    .div_lista_empresas {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #c9d6ff;
    }

    .div_lista_empresas button {
      width: 400px;
      height: 100px;
      margin: 10px;
    }

    .titulo_principal {
      padding: 20px;
      text-align: center;
    }

    .gallery {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      background-color: #c9d6ff;
    }

    .image {
      display: inline-block;
      margin: 1px;
      cursor: pointer;
    }

    .image img {
      height: 250px;
    }

    .lst-image {
      filter: blur(3px);
      display: inline-block;
      margin: 1px;
      cursor: pointer;
    }

    .overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 24px;
      font-weight: bold;
      color: white;
      text-align: center;
      filter: none;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
      display: block;
      max-width: 90%;
      max-height: 90%;
      margin: auto;
    }

    .close {
      position: absolute;
      top: 10px;
      right: 10px;
      color: white;
      font-size: 30px;
      cursor: pointer;
    }

    #overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      align-items: center;
      justify-content: center;
      z-index: 1000;
      /* Ajuste o valor de z-index conforme necessário */
    }

    #popup {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      transform: scale(0.8);
      transition: transform 0.5s ease-in-out;
      z-index: 1001;
      /* Valor maior que o z-index do overlay */
    }

    #popup.show {
      transform: perspective(800px) rotateX(0deg) scale(1);
    }

    #closeBtn {
      background-color: #c10109;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .texto-de-abertura {
      padding: 10px 20px;
    }

    .dez-ferramentas {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
    }

    .titulo-btn-dez-ferramentas {
      display: flex;
      flex-direction: column;
      font-family: 'Montserrat', sans-serif;
      color: #c10109;
      text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.6);
      text-align: center;
      margin-right: 25%;
    }

    .dez-ferramentas-img img {
      width: 75%;
      height: 75%;
    }

    .container {
      padding: 50px;
    }

    .container h1 {
      text-align: center;
      font-family: 'Montserrat', sans-serif;
      font-size: 36px;
      color: #c10109;
      text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.6);
    }

    #catalog-container {
      width: 80%;
      margin: 20px auto;
      overflow: hidden;
      position: relative;
    }

    #course-list {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .course-card {
      width: 200px;
      margin-right: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-left: 90px;
    }

    .course-card:hover {
      transform: scale(1.1);
    }

    #prevBtn,
    #nextBtn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 18px;
      cursor: pointer;
      background-color: #f1f1f1;
      padding: 10px;
      border: none;
      outline: none;
      z-index: 1;
    }

    #prevBtn {
      left: 0;
    }

    #nextBtn {
      right: 0;
    }

    .depoimentos {
      padding-top: 100px;
    }

    .depoimentos .col-3 {
      text-align: center;
      padding: 40px 20px;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
      cursor: pointer;
      display: inline-block;
    }

    .col-3 {
      flex-basis: 30%;
      max-width: 250px;
      margin-bottom: 30px;
    }

    .col-3 img {
      width: 100%;
      object-fit: cover;
      object-position: center;
    }

    .depoimentos .col-3:hover {
      transform: scale(1.1);
    }

    .depoimentos .col-3 img {
      width: 50px;
      border-radius: 50%;
      margin-top: 20px;
      border: 2px solid #c10109;
    }

    .depoimento-icone {
      font-size: 34px;
      color: #c10109;
    }

    .col-3 p {
      font-size: 13px;
      color: #c10109;
      margin: 12px 0;
    }

    .depoimentos .col-3 h3 {
      font-size: 16px;
      font-weight: 600;
      color: #282828;
    }

    .classificacao ion-icon {
      color: #c10109;
    }

    #btn-know-more {
      margin-bottom: 20px;
    }
  </style>

  <script>

    function expandImage(imgElement) {
      var modal = document.getElementById('modal');
      var expandedImg = document.getElementById('expanded-image');

      modal.style.display = 'block';
      expandedImg.src = imgElement.src;
      expandedImg.style.height = '80%';
      expandedImg.style.width = 'auto';

      // Centraliza horizontalmente e verticalmente
      expandedImg.style.display = 'block';
      expandedImg.style.margin = '0 auto';
      expandedImg.style.position = 'relative';
      expandedImg.style.top = '50%';
      expandedImg.style.transform = 'translateY(-50%)';
    }

    function closeModal() {
      var modal = document.getElementById('modal');
      modal.style.display = 'none';
    }

    document.addEventListener("DOMContentLoaded", function () {
      // Mostrar o popup ao carregar a página
      document.getElementById("overlay").style.display = "flex";

      // Adicionar evento de clique ao botão de fechar
      document.getElementById("closeBtn").addEventListener("click", function () {
        // Adicionar classe para aplicar os efeitos de rotação e perspectiva
        document.getElementById("popup").classList.add("show");
        // Ocultar o popup ao clicar no botão
        document.getElementById("overlay").style.display = "none";
        // Emitir som de foguete
        playRocketSound();
      });
    });

    function playRocketSound() {
      // Criar elemento de áudio
      var audio = new Audio('../sounds/rocket_sound.mp3');
      // Reproduzir o som
      audio.play();
    }

    let currentIndex = 0;

    function moveCatalog(direction) {
      const courseList = document.getElementById('course-list');
      const courseCards = document.querySelectorAll('.course-card');
      const cardWidth = courseCards[0].offsetWidth + 20; // Considerando a largura do cartão mais a margem

      currentIndex = (currentIndex + direction + courseCards.length) % courseCards.length;
      const translateValue = -currentIndex * cardWidth + 'px';
      courseList.style.transform = 'translateX(' + translateValue + ')';
    }

  </script>
</head>

<body>
  <!-- MENU SUPERIOR -->
  <?php include("header.php"); ?>
  <!--INÍCIO POPUP-->
  <div id="overlay">
    <div id="popup">
      <h1><b>VOCÊ QUER SER MILIONÁRIO? VENHA COMIGO</b></h1>
      <button id="closeBtn">QUERO!</button>
    </div>
  </div>
  <!--FIM POPUP-->

  <!-- CARROSEL - INICIO -->
  <div id="carouselExampleDark" class="carousel carousel-dark slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="../logos/Linkedin.JPG" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <!--<h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
            <a><button>Botão</button></a>-->
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="../logos/Linkedin.JPG" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <!--<h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
            <a><button>Botão</button></a>-->
        </div>
      </div>
      <div class="carousel-item">
        <img src="../logos/Linkedin.JPG" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <!--<h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
            <a><button>Botão</button></a>-->
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- CARROSEL - FINAL -->

  <!--INÍCIO TEXTO DE ABERTURA-->
  <div class="texto-de-abertura">
    <p>What is Lorem Ipsum?
      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
      standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
      type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
      remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
      Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions
      of Lorem Ipsum.

      Why do we use it?
      It is a long established fact that a reader will be distracted by the readable content of a page when looking at
      its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
      opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing
      packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will
      uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by
      accident, sometimes on purpose (injected humour and the like).</p>
  </div>
  <!--FIM TEXTO DE ABERTURA-->

  <!--INÍCIO 10 FERRAMENTAS-->
  <div class="dez-ferramentas">
    <div class="dez-ferramentas-img">
      <img src="../logos/dez-ferramentas.jpg" alt="" width="75%" height="75%">
    </div>
    <div class="titulo-btn-dez-ferramentas">
      <h1><b>100 FERRAMENTAS GRATUITAS</b> QUE TE DARÃO O PRIMEIRO MILHÃO</h1>
      <a href="../screens/ferramentas_ebook.php"><button class="btn btn-dark">Ferramentas grátis aqui!</button></a>
    </div>
  </div>
  </div>
  <!--FIM 10 FERRAMENTAS-->

  <!--INÍCIO PLIARES-->
  <div class="pilares-do-sucesso">
    <div class="container">
      <h1>PILARES DO SUCESSO</h1>
    </div>
  </div>
  <!--FIM PLIARES-->

  <!--INÍCIO CATÁLOGO DE CURSOS-->

  <div id="catalog-container">
    <button id="prevBtn" onclick="moveCatalog(-1)">❮</button>
    <div id="course-list">
      <div class="course-card"><img src="../logos/mapadosucesso.jpg" alt="" width="270px" height="270px"><br>
        <center>
          <h3>Curso Mapa do sucesso</h3>
        </center><br><a href="#"><button class="btn btn-dark" id="btn-know-more">Saiba mais</button></a>
      </div>
      <div class="course-card"><img src="../logos/ede.jpg" alt="" width="270px" height="270px"><br>
        <center>
          <h3>Curso Empreendedores de elite</h3>
        </center><br><a href="#"><button class="btn btn-dark" id="btn-know-more">Saiba mais</button></a>
      </div>
      <div class="course-card"><img src="../logos/mma.jpg" alt="" width="270px" height="270px"><br>
        <center>
          <h3>Curso MMA: Mindset, Metas, Ação</h3>
        </center><br><a href="#"><button class="btn btn-dark" id="btn-know-more">Saiba mais</button></a>
      </div>
    </div>
    <button id="nextBtn" onclick="moveCatalog(1)">❯</button>
  </div>

  <!--FIM CATÁLOGO DE CURSOS-->

  <!--INÍCIO DEPOIMENTOS-->
  <div class="depoimentos">
    <div class="corpo-depoimentos">
      <div class="linha">
        <!--INÍCIO ITEM DEPOIMENTOS-->
        <div class="col-3">
          <h2>Depoimento 1</h2>
          <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.</p>
          <div class="classificacao">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
          </div>
          <img src="../logos/cliente1.png" alt="">
          <h3>Joelma Kelmon</h3>
        </div>
        <!--FIM ITEM DEPOIMENTOS-->
        <!--INÍCIO ITEM DEPOIMENTOS-->
        <div class="col-3">
          <h2>Depoimento 2</h2>
          <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.</p>
          <div class="classificacao">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
          </div>
          <img src="../logos/cliente2.png" alt="">
          <h3>Inês Jurema</h3>
        </div>
        <!--FIM ITEM DEPOIMENTOS-->
        <!--INÍCIO ITEM DEPOIMENTOS-->
        <div class="col-3">
          <h2>Depoimento 3</h2>
          <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.</p>
          <div class="classificacao">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
          </div>
          <img src="../logos/cliente3.png" alt="">
          <h3>Keli Guiça</h3>
        </div>
        <!--FIM ITEM DEPOIMENTOS-->
        <!--INÍCIO ITEM DEPOIMENTOS-->
        <div class="col-3">
          <h2>Depoimento 4</h2>
          <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.</p>
          <div class="classificacao">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
          </div>
          <img src="../logos/cliente4.png" alt="">
          <h3>Nicéia Oliveira</h3>
        </div>
        <!--FIM ITEM DEPOIMENTOS-->
        <!--INÍCIO ITEM DEPOIMENTOS-->
        <div class="col-3">
          <h2>Depoimento 5</h2>
          <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.</p>
          <div class="classificacao">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
          </div>
          <img src="../logos/cliente5.png" alt="">
          <h3>Ademir Bellomono</h3>
        </div>
        <!--FIM ITEM DEPOIMENTOS-->
      </div>
    </div>
  </div>
  <!--FIM DEPOIMENTOS-->

  <!-- QUEM EU SOU? - INICIO -->
  <div class="container-quem-sou">
    <div class="div-quem-sou">
      <h2 style="text-align: center;">Mentor</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
        mollit anim id est laborum.</p>
      <a href="../screens/quem_sou.php"><button type="button" class="btn btn-dark">Quem eu sou?</button></a>
    </div>
    <div class="div-quem-sou">
      <img src="../img/fotoimprensa3.jpg" alt="Imagem 2" style="width: 100%;">
    </div>
  </div>
  <!-- QUEM EU SOU? - FINAL -->

  <!-- EMPRESAS - INICIO -->
  <h1 style="text-align: center; margin-top: 40px;"> Minhas empresas </h1>
  <div class="lista_empresas">
    <div class="div_lista_empresas">
      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ca3Modal"><img
          src="../logos/logo-ca3.png" alt="ca3" style="height: 70px;"></button>
      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ca3_steelModal"><img
          src="../logos/logo-ca3_steel.png" alt="ca3 steel" style="height: 70px;"></button>
      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#circuitModal"><img
          src="../logos/logo-circuit.png" alt="circuit" style="height: 70px;"></button>
    </div>
    <div style="text-align: center;">
      <a href="../screens/empresas.php"><button type="button" class="btn btn-dark">Empresas</button></a>
    </div>
  </div>
  <!-- EMPRESAS - FINAL -->

  <!-- PAISES QUE EU VISITEI - INICIO -->
  <div class="container-quem-sou">
    <div class="div-quem-sou">
      <img src="../img/mapa_mundi.avif" alt="Imagem 2" style="width: 100%;">
    </div>
    <div class="div-quem-sou">
      <h2 style="text-align: center;">Paises que eu visitei</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
        mollit anim id est laborum.</p>
      <a href="../screens/mapa_mundi.php"><button type="button" class="btn btn-dark">Países que eu
          visitei</button></a>
    </div>
  </div>
  <!-- PAISES QUE EU VISITEI - FINAL -->

  <!-- GALERIA - INICIO -->
  <h1 class="titulo_principal">Galeria</h1>
  <div class="gallery">
    <div class="image">
      <img src="../img/1.jpg" alt="Imagem 1" onclick="expandImage(this)">
    </div>
    <div class="image">
      <img src="../img/2.jpg" alt="Imagem 2" onclick="expandImage(this)">
    </div>
    <div class="image">
      <img src="../img/3.jpg" alt="Imagem 3" onclick="expandImage(this)">
    </div>
  </div>
  <div class="gallery">
    <div class="image">
      <img src="../img/4.jpg" alt="Imagem 1" onclick="expandImage(this)">
    </div>
    <div class="image">
      <img src="../img/5.jpg" alt="Imagem 2" onclick="expandImage(this)">
    </div>
    <div class="lst-image">
      <div class="overlay">+50</div>
      <a href="galeria.php">
        <img src="../img/6.jpg" alt="Imagem 3">
    </div>
  </div>

  <!-- IMAGEM DESTACADA - INICIO -->
  <div class="modal" id="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="expanded-image">
  </div>
  <!-- IMAGEM DESTACADA - FINAL -->

  <!--<script src="script.js"></script>-->
  <!-- GALERIA - FINAL -->

  <!-- RODAPÉ -->
  <?php include("footer.php"); ?>
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/swiper-bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>