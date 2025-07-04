<?php
require_once '../config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn->connect_error) {
    $pagina = 'index';
    $ip = $_SERVER['REMOTE_ADDR'];
    $conn->query("INSERT INTO acessos (pagina, ip) VALUES ('$pagina', '$ip')");
}

$result = $conn->query("SELECT COUNT(*) AS total FROM acessos WHERE pagina = 'index'");
$total = $result ? $result->fetch_assoc()['total'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style.css?v=<?= filemtime('style.css') ?>">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


  <title>Seven Motos</title>
</head>
<body>
  <!-- HEADER -->
  <div class="bg-home">
    <header>

      <nav class="header-content container">
        <div class="header-icons" data-aos="fade-down">
          <a href="https://www.instagram.com/seven_motos7/" target="_blank">
           <i class="fa-brands fa-instagram fa-2x"></i>   
          </a>
          <a href="https://www.youtube.com/@seven_motospgm" target="_blank">
            <i class="fa-brands fa-youtube fa-2x"></i>   
          </a>
          <a href="https://www.tiktok.com/@seven_motos?_t=8k1ei5FLohi&_r=1" target="_blank">
            <i class="fa-brands fa-tiktok fa-2x"></i>   
          </a>
        </div>

        <div class="header-logo" data-aos="fade-up" data-aos-delay="300">
          <img 
            data-aos="flip-up"
            data-aos-delay="300"
            data-aos-duration="1500"
            src="assets/logo.svg" 
            alt="Logo Seven Motos"
          />
        </div>

        <div data-aos="fade-down">
          <a class="header-button" href="https://wa.me/5591985595471" target="_blank">
            Entrar em Contato
          </a>
        </div>

      </nav>

      <main class="hero container" data-aos="fade-up" data-aos-delay="400">
        <h1>OFICINA ESPECIALIZADA COM A QUALIDADE QUE SUA MOTO MERECE.</h1>
        <!-- <p>Horário de funcionamento: 08:00 ás 18:00</p> -->
        <a 
          href="https://wa.me/5591985595471" 
          class="button-contact" 
          target="_blank"
        >
          Entrar em Contato
        </a>
      </main>

    </header>

  </div>

  <!-- ABOUT -->
  <section class="about">
    <div class="container about-content">
      <div data-aos="zoom-in" data-aos-delay="100">
        <img 
          src="assets/images.svg" 
          alt="Imagem sobre a oficina"
        />
      </div>

      <div 
        class="about-description"
        data-aos="zoom-out-left" data-aos-delay="250"
      >
        <h2>Sobre</h2>
        <p>Em 2024, Matias Cavalcante deu início à jornada da Seven Motos, trazendo consigo sua paixão pelas motos e sua vasta experiência no ramo. Conhecido como um mecânico excepcional, Matias construiu a Seven Motos com o compromisso de oferecer serviços e peças de alta qualidade, visando sempre superar as expectativas dos clientes. Com uma variedade de motos de diferentes cilindradas, estamos sempre em busca da melhor solução para garantir a plena satisfação de nossos clientes.</p>
        <p>
          <strong>Horários de funcionamento:</strong> <br>
          <strong>Domingo: </strong>08:00 às 12:00 <br> 
          <strong>Segunda-Quinta: </strong>08:00 às 18:00 <br> 
          <strong>Sexta-Feira: </strong>08:00 às 17:00
        </p>
      </div>

    </div>
  </section>

  <!-- SERVICES -->

  <section class="services">

    <div class="services-content container">
      <h2>Serviços Seven</h2>
      <p>Com a Seven Motos o atendimento é diferenciado colocando o cliente em contato direto com todos os serviços executados, gerando transparência e comprometimento. Tornando-se referência em qualidade de serviços e atendimento.</p>
    </div>

    <section class="haircuts">

      <div class="haircut" data-aos="fade-up" data-aos-delay="150">
        <img
          src="assets/service-motor.jpg"
          alt="Motor de moto"
        />
        <div class="haircut-info">
          <strong>Montagem de Motor</strong>
            <button>
              Qualidade
            </button>
        </div>
      </div>

      <div class="haircut" data-aos="fade-up" data-aos-delay="250">
        <img
          src="assets/service-injecao.jpg"
          alt="Injeção Eletrônica"
        />
        <div class="haircut-info">
          <strong>Injeção Eletrônica</strong>
          <button>
            Eficiência
          </button>
        </div>
      </div>

      <div class="haircut" data-aos="fade-up" data-aos-delay="400">
        <img
          src="assets/service-eletrica.jpg"
          alt="Parte Elétrica"
        />
        <div class="haircut-info">
          <strong>Parte Elétrica</strong>
          <button>
            Segurança
          </button>
        </div>
      </div>
    </section>  
    
    <section class="haircuts">

      <div class="haircut" data-aos="fade-up" data-aos-delay="150">
        <img
          src="assets/service-revisao.jpg"
          alt="Revisão de Moto"
        />
        <div class="haircut-info">
          <strong>Revisão Premium</strong>
            <button>
              Garantia
            </button>
        </div>
      </div>

      <div class="haircut" data-aos="fade-up" data-aos-delay="250">
        <img
          src="assets/service-diagnostico.jpg"
          alt="Diagnóstico de peças"
        />
        <div class="haircut-info">
          <strong>Diagnóstico Completo</strong>
          <button>
            Excelência
          </button>
        </div>
      </div>

      <div class="haircut" data-aos="fade-up" data-aos-delay="400">
        <img
          src="assets/service-pecas.jpg"
          alt="Peças e Acessórios"
        />
        <div class="haircut-info">
          <strong>Peças e Acessórios</strong>
          <button>
            Padronizado
          </button>
        </div>
      </div>

    </section>

  </section>

  <!-- MARCAS -->

  <section id="marcas" class="marcas">
    <div class="marcas-content">
      <h2>Marcas</h2>
      <p>Aqui na Seven Motos trabalhamos com as melhores marcas</p>
    </div>

    <div>
      <ul class="clients-grid grid-6">
        <li><a href="#marcas"><img src="assets/marcas/1.png" alt="Motul"></a></li>
        <li><a href="#marcas"><img src="assets/marcas/2.png" alt="Magnetron"></a></li>
        <li><a href="#marcas"><img src="assets/marcas/3.png" alt="Cofap"></a></li>
        <li><a href="#marcas"><img src="assets/marcas/4.png" alt="Nakata"></a></li>
        <li><a href="#marcas"><img src="assets/marcas/5.png" alt="Heliar"></a></li>
        <li><a href="#marcas"><img src="assets/marcas/6.png" alt="Philips"></a></li>
        <li><a href="#marcas"><img src="assets/marcas/7.png" alt="Scud"></a></li>
        <li><a href="#marcas"><img src="assets/marcas/8.png" alt="Levorin"></a></li>
        <li><a href="#marcas"><img src="assets/marcas/9.png" alt="Gow"></a></li>
        <li><a href="#marcas"><img src="assets/marcas/10.png" alt="Riffel"></a></li>
        <li><a href="#marcas"><img src="assets/marcas/11.png" alt="Cobreq"></a></li>
        <li><a href="#marcas"><img src="assets/marcas/12.png" alt="Max"></a></li>
      </ul>      
    </div>
  </section>

  <!-- GAMES -->

  <section class="games-section">
    <div class="games-title">
      <h2>Seven Games</h2>
      <p>Se divirta e ganhe descontos com os jogos da Seven Motos</p>
    </div>

    <div class="ranking">
      <h3>Ranking Seven Games</h3>
      <ul id="ranking-list">
      </ul>
    </div>

    <div class="participar">
      <button id="login-google">Participar do Seven Games</button>
      <a href="ranking.php">Seven Ranking</a>
    </div>
  </section>

  <!-- DEPOIMENTOS -->

  <section class="testimonials-section">
    <div class="testimonials-title">
      <h2>Depoimentos</h2>
      <p>O que falam sobre a gente</p>
    </div>

    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide">
          <h4>Eduardo Gomes</h4>
          <p>
            “Atendimento muito bom, é um trabalho excelente.”
          </p>
          <div class="stars">⭐⭐⭐⭐⭐</div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide">
          <h4>Camila Morais</h4>
          <p>
            “Melhor atendimento da cidade, serviços de qualidade e excelência.”
          </p>
          <div class="stars">⭐⭐⭐⭐⭐</div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide">
          <h4>Edinaldo Gomes</h4>
          <p>
            “Serviço de qualidade.”
          </p>
          <div class="stars">⭐⭐⭐⭐⭐</div>
        </div>

        <!-- Slide 4 -->
        <div class="swiper-slide">
          <h4>Mateus Lima</h4>
          <p>
            “A melhor oficina de moto da cidade, com os melhores especialistas.”
          </p>
          <div class="stars">⭐⭐⭐⭐⭐</div>
        </div>

      </div>

      <!-- Botões de navegação -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>

  <!-- GALERIA -->

  <section class="carrossel">
    <div class="galeria">
      <h2>Galeria Seven</h2>
      <p>Inauguração da Seven Motos</p>
    </div>

    <div class="carousel" id="carousel1">
      <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./assets/galeria/inauguracao/1.png" alt="Foto 1">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/2.png" alt="Foto 2">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/3.png" alt="Foto 3">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/4.png" alt="Foto 4">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/5.png" alt="Foto 5">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/6.png" alt="Foto 6">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/7.png" alt="Foto 7">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/8.png" alt="Foto 8">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/9.png" alt="Foto 9">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/10.png" alt="Foto 10">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/11.png" alt="Foto 11">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/12.png" alt="Foto 12">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/13.png" alt="Foto 13">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/inauguracao/14.png" alt="Foto 14">
          </div>
      </div>
      <button class="prev" onclick="prevSlide('carousel1')">&#10094;</button>
      <button class="next" onclick="nextSlide('carousel1')">&#10095;</button>
    </div>

    <div class="galeria">
      <p>Peças e acessórios de qualidade</p>
    </div>

    <div class="carousel" id="carousel2">
      <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./assets/galeria/acessorios/1.png" alt="Foto 1">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/2.png" alt="Foto 2">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/3.png" alt="Foto 3">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/4.png" alt="Foto 4">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/5.png" alt="Foto 5">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/6.png" alt="Foto 6">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/7.png" alt="Foto 7">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/8.png" alt="Foto 8">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/9.png" alt="Foto 9">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/10.png" alt="Foto 10">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/11.png" alt="Foto 11">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/12.png" alt="Foto 12">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/13.png" alt="Foto 13">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/acessorios/14.png" alt="Foto 14">
          </div>
      </div>
      <button class="prev" onclick="prevSlide('carousel2')">&#10094;</button>
      <button class="next" onclick="nextSlide('carousel2')">&#10095;</button>
    </div>

    <div class="galeria">
      <p>Novo local para melhor atendimento</p>
    </div>

    <div class="carousel" id="carousel3">
      <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./assets/galeria/loja/1.jpg" alt="Foto 1">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/loja/2.jpg" alt="Foto 2">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/loja/3.jpg" alt="Foto 3">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/loja/4.jpg" alt="Foto 4">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/loja/5.jpg" alt="Foto 5">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/loja/6.jpg" alt="Foto 6">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/loja/7.jpg" alt="Foto 7">
          </div>
          <div class="carousel-item">
            <img src="./assets/galeria/loja/8.jpg" alt="Foto 8">
          </div>
      </div>
      <button class="prev" onclick="prevSlide('carousel3')">&#10094;</button>
      <button class="next" onclick="nextSlide('carousel3')">&#10095;</button>
    </div>

  </section>

  <!-- MAPS -->

  <section>
    <div class="maps">
      <h2>Venha conhecer</h2>
    </div>

    <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d575.416978755925!2d-47.37830394490215!3d-2.998621402554381!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x92b761abf04e6fad%3A0x3e8ab413672d6dfe!2sSeven%20Motos!5e0!3m2!1spt-BR!2sbr!4v1714395485804!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>

  <!-- FOOTER -->

  <footer class="footer">
    <div class="footer-icons">
      <a href="https://www.instagram.com/seven_motos7/" target="_blank">
        <i class="fa-brands fa-instagram fa-2x"></i>   
       </a>
       <a href="https://www.youtube.com/@seven_motospgm" target="_blank">
         <i class="fa-brands fa-youtube fa-2x"></i>   
       </a>
       <a href="https://www.tiktok.com/@seven_motos?_t=8k1ei5FLohi&_r=1" target="_blank">
         <i class="fa-brands fa-tiktok fa-2x"></i>   
       </a>
    </div>

    <div>
      <img 
        src="assets/logo.svg" 
        alt="Logo Seven Motos"
      />
    </div>

    <div class="footer-dev">
      <p>Desenvolvido por:</p>
      <a href="https://sergio-slima.github.io/page-links" target="_blank"><p class="devapp">Dev<span>App</span></p></a>
    </div>

    <p>Copyright 2025 | Todos direitos reservados.</p>
    <span class="acessos">Total de acessos ao site: <?= $total ?></span>
  </footer>

  <!-- Button Whatsapp -->

  <a 
   href="https://wa.me/5591985595471" 
   class="btn-whatsapp"
   target="_blank"
   data-aos="zoom-in-up" data-aos-delay="400"
  >
    <img src="assets/whatssapp.svg" alt="Botao whatsapp" />
    <span class="tooltip-text">Entrar em Contato</span>
  </a>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Firebase SDK (adicione no head ou antes do </body>) -->
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth.js"></script>

  <script type="module" src="games.js"></script>

  <script src="script.js"></script>

</body>
</html>
