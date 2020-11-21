
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 " src="{{ productImage('blog/carousel-img1.jpg') }}" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <h5 class="display-4 text-dark">Laravel Ecommerce</h5>
            <p class="lead text-dark d-inline-block">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                 Accusantium, aspernatur illum error vero quisquam architecto
                  ipsam natus enim at delectus! Cupiditate iste aliquid expedita
                   dicta doloremque eos, unde ullam alias perspiciatis quam non
                   laboriosam animi delectus id ex autem repellat sit, dolorem laborum
                   , atque dolore consectetur assumenda molestiae vitae! Eos.
            </p>
          </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ productImage('blog/carousel-img2.jpg') }}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ productImage('blog/carousel-img3.jpg') }}" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
