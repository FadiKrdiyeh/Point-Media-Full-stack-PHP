<?php
$pageTitle = 'Point Media';
include "init.php";
// include $langs_path . "ar.php";
// include $templates_path . "header.php";
?>
<!-- Start Home -->
<div class="slider home" id="home">
  <!-- slides -->
  <div class="slider__slides">
    <div class="slide s--active">
      <div class="slide__inner main-slider">
        <!-- <div class="slide__content">
          <h2 class="slide__heading">Clip-Path Revealing Slider</h2>
          <p class="slide__text">Greetings, Traveler!</p>
        </div> -->
        <div class="custom-btn">
          <a href="#" class="btn-get-offer"><?php echo t("Get Offer"); ?></a>
        </div>
      </div>
    </div>
    <div class="slide">
      <div class="slide__inner"></div>
    </div>
    <div class="slide">
      <div class="slide__inner"></div>
    </div>
    <div class="slide">
      <div class="slide__inner"></div>
    </div>
    <div class="slide s--prev">
      <div class="slide__inner"></div>
    </div>
  </div>
  <!-- slides end -->
  <div class="slider__control">
    <div class="slider__control-line"></div>
    <div class="slider__control-line"></div>
  </div>
  <div class="slider__control slider__control--right m--right">
    <div class="slider__control-line"></div>
    <div class="slider__control-line"></div>
  </div>
</div>
<!-- End Home -->

<!-- Start Our Services -->
<section class="our-services">
  <div class="container">
    <div class="our-services-icon">
      <i class="fa fa-circle"></i>
    </div>
    <div class="our-services-title wow animate__animated animate__bounceIn" data-wow-duration="1s" data-wow-offset="50"><?php echo t("Our Services"); ?></div>
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="our-services-card">
          <div class="our-services-icons our-services-image">
            <img src="./layouts/images/our-services/icons-04.png" alt="Graphic Design Icon" />
          </div>
        </div>
        <div class="our-srvices-btn">
          <a href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=gd" class="our-services-btn-content"><?php echo t("Graphic Design"); ?></a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="our-services-card">
          <div class="our-services-icons our-services-image">
            <img src="./layouts/images/our-services/icons-08.png" alt="Marketing and Advertising Icon" />
          </div>
        </div>
        <div class="our-srvices-btn">
          <a href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=maa" class="our-services-btn-content"><?php echo t("Marketing and Advertising"); ?></a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="our-services-card">
          <div class="our-services-icons our-services-image">
            <img src="./layouts/images/our-services/icons-06.png" alt="Websites Development Icon" />
          </div>
        </div>
        <div class="our-srvices-btn">
          <a href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=wd" class="our-services-btn-content"><?php echo t("Websites development"); ?></a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="our-services-card">
          <div class="our-services-icons our-services-image">
            <img src="./layouts/images/our-services/icons-02.png" alt="Photography And Editing Icon" />
          </div>
        </div>
        <div class="our-srvices-btn">
          <a href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=pae" class="our-services-btn-content"><?php echo t("Photography and editing"); ?></a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="our-services-card">
          <div class="our-services-icons our-services-image">
            <img src="./layouts/images/our-services/icons-05.png" alt="Translation Services Icon" />
          </div>
        </div>
        <div class="our-srvices-btn">
          <a href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=ts" class="our-services-btn-content"><?php echo t("Translation Services"); ?></a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="our-services-card">
          <div class="our-services-icons our-services-image">
            <img src="./layouts/images/our-services/icons-03.png" alt="Engineering Services Icon" />
          </div>
        </div>
        <div class="our-srvices-btn">
          <a href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=es" class="our-services-btn-content"><?php echo t("engineering services"); ?></a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="our-services-card">
          <div class="our-services-icons our-services-image">
            <img src="./layouts/images/our-services/icons-07.png" alt="Training Courses Icon" />
          </div>
        </div>
        <div class="our-srvices-btn">
          <a href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=tc" class="our-services-btn-content"><?php echo t("Training Courses"); ?></a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="our-services-card">
          <div class="our-services-icons our-services-image">
            <img src="./layouts/images/our-services/icons-01.png" alt="Non-Profit Services Icon" />
          </div>
        </div>
        <div class="our-srvices-btn">
          <a href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=nps" class="our-services-btn-content"><?php echo t("Non-Profit Services"); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Our Services -->

<!-- Start About Us -->
<section class="about-us" id="aboutUs">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex justify-content-center align-items-center">
        <div class="about-us-image">
          <img class="img-thumbnail wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50" src="./layouts/images/about-us/right.png" alt="About Us Image">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="about-us-title">
          <span>POINT MEDIA COMPANY - </span>
          <?php echo t("A leading company in the development of commercial and business activities."); ?> - <?php echo t("Point Media provides its services globally online. Its administrative headquarters are in Syria, and it has sub-centers for service in (Dubai - Abu Dhabi - Cairo - Saudi Arabia)."); ?> <br />
          <?php echo t("Here at Point Media, we offer our clients the best services that are loaded with years of experience and hard work. We know the requirements of your business and we know how to put our customers in the forefront through an integrated business plan, starting with designing a visual identity, passing through the design of a distinctive website, then managing digital content, and ending with preparing a marketing plan that gives them a competitive advantage in their markets, and ensures them increase the number of those interested in their business and thus increase in their sales and profits.") ?><br /><br /><br />
          <small class="text-center d-block"><?php echo t("Learn about our services and join our training courses today."); ?></small>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End About Us -->

<!-- Start Our Works -->
<section class="our-works" id="ourWorks">
  <div class="container">
    <div class="our-works-title wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="50"><?php echo t("Our Works"); ?></div>
    <div class="row">
      <div class="col-md-4 mb-10 wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="50">
        <div class="our-works-item">
          <div class="our-works-image" style="background-image: url('./layouts/images/carousel/2.png');">
            <!-- <img src="./layouts/images/our-services/1.png" alt=""> -->
          </div>
        </div>
        <div class="our-works-btn">
          <a href="#" class="our-works-btn-content"><?php echo t("Visual Identity Design"); ?></a>
        </div>
      </div>
      <div class="col-md-4 mb-10 wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="50">
        <div class="our-works-item">
          <div class="our-works-image" style="background-image: url('./layouts/images/carousel/2.png');">
            <!-- <img src="./layouts/images/our-services/1.png" alt=""> -->
          </div>
        </div>
        <div class="our-works-btn">
          <a href="#" class="our-works-btn-content"><?php echo t("Logofolio Design"); ?></a>
        </div>
      </div>
      <div class="col-md-4 mb-10 wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="50">
        <div class="our-works-item">
          <div class="our-works-image" style="background-image: url('./layouts/images/carousel/2.png');">
            <!-- <img src="./layouts/images/our-services/1.png" alt=""> -->
          </div>
        </div>
        <div class="our-works-btn">
          <a href="#" class="our-works-btn-content"><?php echo t("Social Media Designs"); ?></a>
        </div>
      </div>
      <div class="col-md-6 mb-10 wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="50">
        <div class="our-works-item">
          <div class="our-works-image" style="background-image: url('./layouts/images/carousel/2.png');">
            <!-- <img src="./layouts/images/our-services/1.png" alt=""> -->
          </div>
        </div>
        <div class="our-works-btn">
          <a href="#" class="our-works-btn-content"><?php echo t("Product Photography"); ?></a>
        </div>
      </div>
      <div class="col-md-6 mb-10 wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="50">
        <div class="our-works-item">
          <div class="our-works-image" style="background-image: url('./layouts/images/carousel/2.png');">
            <!-- <img src="./layouts/images/our-services/1.png" alt=""> -->
          </div>
        </div>
        <div class="our-works-btn">
          <a href="#" class="our-works-btn-content"><?php echo t("Promotional Videos"); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Our Works -->

<!-- Start See Our Works -->
<section class="see-our-works">
  <div class="overlay"></div>
  <div class="see-our-works-btn wow animate__animated animate__zoomInDown" data-wow-duration="2s" data-wow-offset="50">
    <a href="#" class="see-our-works-btn-content"><?php echo t("See Our Works"); ?></a>
  </div>
</section>
<!-- End See Our Works -->

<!-- Start Our Clients -->
<section class="our-clients">
  <div class="our-clients-title wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50"><?php echo t("Our Customers Opinions"); ?></div>
  <div class="slider--clients">
    <div class="slider--clients__client">
      <ul id="list" class="cf">
        <li class="our-clients-slider">
          <figure class="active">
            <div class="our-client-image-container">
              <div class="our-client-image"></div>
            </div>
            <figcaption>
              <h2><?php echo t("Fadi Kardaghly:"); ?></h2>
              <p><?php echo t("High morals, commendable efforts, ambitious youth and professional work."); ?></p>
            </figcaption>
          </figure>
        </li>
        <li class="our-clients-slider">
          <figure>
            <div class="our-client-image-container">
              <div class="our-client-image"></div>
            </div>
            <figcaption>
              <h2><?php echo t("Rama Al-Ahmad:"); ?></h2>
              <p><?php echo t("Creative team, demonstrated interest in the success and development of client ideas."); ?></p>
            </figcaption>
          </figure>
        </li>
        <li class="our-clients-slider">
          <figure>
            <div class="our-client-image-container">
              <div class="our-client-image"></div>
            </div>
            <figcaption>
              <h2><?php echo t("Elias Gerges:"); ?></h2>
              <p><?php echo t("I enjoyed the experience with you, I advise the budding entrepreneurs of Point Media to develop your business quickly."); ?></p>
            </figcaption>
          </figure>
        </li>
        <li class="our-clients-slider">
          <figure>
            <div class="our-client-image-container">
              <div class="our-client-image"></div>
            </div>
            <figcaption>
              <h2><?php echo t("Khalil Ibrahim:"); ?></h2>
              <p><?php echo t("The training trip with you was very fruitful, I attended a free workshop on managing small and medium enterprises and I will repeat it."); ?></p>
            </figcaption>
          </figure>
        </li>
        <li class="our-clients-slider">
          <figure>
            <div class="our-client-image-container">
              <div class="our-client-image"></div>
            </div>
            <figcaption>
              <h2><?php echo t("Ramadan Younes:"); ?></h2>
              <p><?php echo t("I was pleased to deal with your work team, what I liked most about the quick response, wonderful directions during work and credibility, your services are worth more than the requested price."); ?></p>
            </figcaption>
          </figure>
        </li>
        <li class="our-clients-slider">
          <figure>
            <div class="our-client-image-container">
              <div class="our-client-image"></div>
            </div>
            <figcaption>
              <h2><?php echo t("Daher Gerakas:"); ?></h2>
              <p><?php echo t("Thank you so much for everything you did..a great experience worth repeating."); ?></p>
            </figcaption>
          </figure>
        </li>
        <li class="our-clients-slider">
          <figure>
            <div class="our-client-image-container">
              <div class="our-client-image"></div>
            </div>
            <figcaption>
              <h2><?php echo t("Maysa Bobo:"); ?></h2>
              <p><?php echo t("Really the most wonderful company and team, I did not expect this professionalism for the required price, I advise everyone to deal with you."); ?></p>
            </figcaption>
          </figure>
        </li>
        <li class="our-clients-slider">
          <figure>
            <div class="our-client-image-container">
              <div class="our-client-image"></div>
            </div>
            <figcaption>
              <h2><?php echo t("Ali Tawalo:"); ?></h2>
              <p><?php echo t("The beginning of our success was with you, good luck, God willing."); ?></p>
            </figcaption>
          </figure>
        </li>
      </ul>
    </div>
  </div>
  <!-- <div class="slider-indicators">
    <span class="indicators active" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></span>
    <span class="indicators active" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></span>
    <span class="indicators active" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></span>
    <span class="indicators active" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></span>
  </div> -->
</section>
<section class="under-our-clients">
  <img class="under-our-clients-image" src="./layouts/images/our-clients/bg.png" alt="...">
</section>
<!-- Start Our Clients -->

<!-- Start Our Blog -->
<section class="our-blog" id="ourBlog">
  <div class="container-lg">
    <div class="our-blog-title text-center"><?php echo t("We Choose For You"); ?></div>
    <div class="row wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50">
      <div class="col-md-4 mb-sm-5">
        <div class="our-blog-item">
          <div class="our-blog-image" style="background-image: url('./layouts/images/carousel/2.png');"></div>
        </div>
        <div class="our-blog-content">
          <h3 class="blog-title"><?php echo t("3 tips to help you create creative content"); ?></h3>
          <div class="blog-date-comments">
            <span class="blog-date">26/03/2022</span> | <span class="blog-comments"><?php echo t("No Comments"); ?></span>
          </div>
          <div class="blog-content"><?php echo limit_text('Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the', 25); ?></div>
          <div class="blog-read-more-btn"><a href="#"><?php echo t("Read More"); ?> <i class="fa fa-angle-double-<?php echo $_COOKIE['language'] == "en" ? 'right' : 'left' ?>"></i></a></div>
        </div>
      </div>
      <div class="col-md-4 mb-sm-5">
        <div class="our-blog-item">
          <div class="our-blog-image" style="background-image: url('./layouts/images/carousel/2.png');">
            <!-- <img src="./layouts/images/our-services/1.png" alt=""> -->
          </div>
        </div>
        <div class="our-blog-content">
          <h3 class="blog-title"><?php echo t("The Importance Of The Website"); ?></h3>
          <div class="blog-date-comments">
            <span class="blog-date">26/03/2022</span> | <span class="blog-comments"><?php echo t("No Comments"); ?></span>
          </div>
          <div class="blog-content"><?php echo limit_text('Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the', 25); ?></div>
          <div class="blog-read-more-btn"><a href="#"><?php echo t("Read More"); ?> <i class="fa fa-angle-double-<?php echo $_COOKIE['language'] == "en" ? 'right' : 'left' ?>"></i></a></div>
        </div>
      </div>
      <div class="col-md-4 mb-sm-5">
        <div class="our-blog-item">
          <div class="our-blog-image" style="background-image: url('./layouts/images/carousel/2.png');">
            <!-- <img src="./layouts/images/our-services/1.png" alt=""> -->
          </div>
        </div>
        <div class="our-blog-content">
          <h3 class="blog-title"><?php echo t("What Is a Brand?!"); ?></h3>
          <div class="blog-date-comments">
            <span class="blog-date">26/03/2022</span> | <span class="blog-comments"><?php echo t("No Comments"); ?></span>
          </div>
          <div class="blog-content"><?php echo limit_text('Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the Hello here is a long sentence that will be truncated by the', 25); ?></div>
          <div class="blog-read-more-btn"><a href="#"><?php echo t("Read More"); ?> <i class="fa fa-angle-double-<?php echo $_COOKIE['language'] == "en" ? 'right' : 'left' ?>"></i></a></div>
        </div>
      </div>
    </div>
    <div class="show-all-blogs-btn">
      <a href="#"><?php echo t("Show All Blogs"); ?></a>
    </div>
  </div>
</section>
<!-- Start Our Blog -->

<!-- Start Why Choose Us -->
<section class="why-choose-us" id="whyChooseUs">
  <div class="why-choose-us-title wow animate__animated animate__backInDown" data-wow-duration="1s" data-wow-offset="50"><?php echo t("Why Choose Us"); ?></div>
  <div class="slider--why-choose-us">
    <div class="slider--why-choose-us__client">
      <ul id="chooseUsList" class="cf">
        <li class="our-why-choose-us-slider">
          <figure class="active">
            <div class="our-client-icon-container">
              <!-- <div class="our-client-image"></div> -->
              <i class="fa fa-handshake-simple our-client-icon"></i>
            </div>
            <figcaption>
              <h2><?php echo t("Technical support continues until after sales"); ?></h2>
              <p><?php echo t("All services provided to you by Point Media Business Development Company include fast and continuous after-sales technical support to solve any problem related to your project, whether it is design, programming, or managing your marketing campaigns."); ?></p>
            </figcaption>
          </figure>
        </li>
        <li class="our-why-choose-us-slider">
          <figure>
            <div class="our-client-icon-container">
              <!-- <div class="our-client-image"></div> -->
              <i class="fa fa-hand-peace our-client-icon"></i>
            </div>
            <figcaption>
              <h2><?php echo t("A skilled multinational team"); ?></h2>
              <p><?php echo t("From designers to developers to writers, our team is equipped with a variety of skills, to provide the best services to our clients."); ?></p>
            </figcaption>
          </figure>
        </li>
        <li class="our-why-choose-us-slider">
          <figure>
            <div class="our-client-icon-container">
              <!-- <div class="our-client-image"></div> -->
              <i class="fa fa-heartbeat our-client-icon"></i>
            </div>
            <figcaption>
              <h2><?php echo t("High quality work"); ?></h2>
              <p><?php echo t("I enjoyed the experience with you, I advise the budding entrepreneurs of Point Media to develop your business quickly."); ?></p>
            </figcaption>
          </figure>
        </li>
        <li class="our-why-choose-us-slider">
          <figure>
            <div class="our-client-icon-container">
              <!-- <div class="our-client-image"></div> -->
              <i class="fa fa-volume-control-phone our-client-icon"></i>
            </div>
            <figcaption>
              <h2><?php echo t("Regular contact with the trainees"); ?></h2>
              <p><?php echo t("Our team works hard to ensure that all of your questions about the course are answered, free consultations are provided and we keep you updated with the latest developments in the field."); ?></p>
            </figcaption>
          </figure>
        </li>
        <li class="our-why-choose-us-slider">
          <figure>
            <div class="our-client-icon-container">
              <!-- <div class="our-client-image"></div> -->
              <i class="fa fa-dollar our-client-icon"></i>
            </div>
            <figcaption>
              <h2><?php echo t("Competitive and thoughtful prices"); ?></h2>
              <p><?php echo t("Despite the many series of services and providing the best to our customers every time, the prices of our services provided remain within the reasonable range and suitable for everyone."); ?></p>
            </figcaption>
          </figure>
        </li>
      </ul>
    </div>
  </div>
</section>
<!-- End Why Choose Us -->

<!-- Start Statistics -->
<section class="statistics wow animate__animated animate__zoomIn" data-wow-duration="2s" data-wow-offset="50" id="statistics">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
        <div class="number">
          <span class="plus">+</span><span class="number-value" id="statisticsLocation">22</span>
        </div>
        <div class="number-title"><?php echo t("Point Media Creators"); ?></div>
      </div>
      <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
        <div class="number">
          <span class="plus">+</span><span class="number-value">51</span>
        </div>
        <div class="number-title"><?php echo t("Our Clients"); ?></div>
      </div>
      <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
        <div class="number">
          <span class="plus">+</span><span class="number-value">8</span>
        </div>
        <div class="number-title"><?php echo t("Experience Years"); ?></div>
      </div>
      <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
        <div class="number">
          <span class="plus">+</span><span class="number-value">850</span>
        </div>
        <div class="number-title"><?php echo t("Presented Services"); ?></div>
      </div>
    </div>
  </div>
</section>
<!-- End Statistics -->

<!-- Start Our Team -->
<section class="our-team" id="ourTeam">
  <div class="container">
    <h3 class="our-team-title wow animate__animated animate__flipInY" data-wow-duration="1s" data-wow-offset="50"><?php echo t("Our Team"); ?></h3>
    <div class="our-team-items">
      <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8 mb-5">
          <div class="custom-card-container">
            <div class="custom-card boss-card">
              <div class="content">
                <div class="img-box">
                  <img src="<?php echo $images_path; ?>our-team/1-raghad.png" alt="Ms. Raghad Othman" />
                </div>
                <div class="content-box">
                  <h3>
                    <?php echo t("Ms. Raghad Othman"); ?><br />
                    <div class="our-team-items-separetor"></div>
                    <span><?php echo t("Founder and CEO"); ?></span><br />
                    <span>ID CODE: GM000</span><br />
                    <span class="card-email">E-mail: boss@pointmedia.com</span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="our-team-separator d-lg-none"></div>
      </div>
      <div class="row">
        <!-- <div class="col-3"></div> -->
        <div class="col-lg-4 col-sm-6 mb-10">
          <div class="custom-card-container">
            <div class="custom-card">
              <div class="content">
                <div class="img-box">
                  <img src="<?php echo $images_path; ?>our-team/2-aseel.png" alt="Eng. Aseel Mohammed" />
                </div>
                <div class="content-box">
                  <h3>
                    <?php echo t("Eng. Aseel Mohammed"); ?><br />
                    <div class="our-team-items-separetor"></div>
                    <span><?php echo t("Public Relations Manager"); ?></span><br />
                    <span>CODE: PR001 ID</span><br />
                    <span class="card-email">E-mail: pr@pointmedia.com</span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-10">
          <div class="custom-card-container">
            <div class="custom-card">
              <div class="content">
                <div class="img-box">
                  <img src="<?php echo $images_path; ?>our-team/3-ali.png" alt="Mr. Ali Yousef" />
                </div>
                <div class="content-box">
                  <h3>
                    <?php echo t("Mr. Ali Yousef"); ?><br />
                    <div class="our-team-items-separetor"></div>
                    <span><?php echo t("Human Resources Manager"); ?></span><br />
                    <span>CODE: HR002 ID</span><br />
                    <span class="card-email">E-mail: hr@pointmedia.com</span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-10">
          <div class="custom-card-container">
            <div class="custom-card">
              <div class="content">
                <div class="img-box">
                  <img src="<?php echo $images_path; ?>our-team/4-cindia.png" alt="Ms. Cindia Imran" />
                </div>
                <div class="content-box">
                  <h3>
                    <?php echo t("Ms. Cindia Imran"); ?><br />
                    <div class="our-team-items-separetor"></div>
                    <span><?php echo t("Training department manager"); ?></span><br />
                    <span>ID CODE: TC003</span><br />
                    <span class="card-email">E-mail: training@pointmedia.com</span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-10">
          <div class="custom-card-container">
            <div class="custom-card">
              <div class="content">
                <div class="img-box">
                  <img src="<?php echo $images_path; ?>our-team/5-hamza.png" alt="Mr. Hamza Haroun" />
                </div>
                <div class="content-box">
                  <h3>
                    <?php echo t("Mr. Hamza Haroun"); ?><br />
                    <div class="our-team-items-separetor"></div>
                    <span><?php echo t("Customer Service Department Officer"); ?></span><br />
                    <span>ID CODE:CS004</span><br />
                    <span class="card-email">E-mail: contact@pointmedia.com</span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-10">
          <div class="custom-card-container">
            <div class="custom-card">
              <div class="content">
                <div class="img-box">
                  <img src="<?php echo $images_path; ?>our-team/6-amira.png" alt="Ms. Amira Mahmoud" />
                </div>
                <div class="content-box">
                  <h3>
                    <?php echo t("Ms. Amira Mahmoud"); ?><br />
                    <div class="our-team-items-separetor"></div>
                    <span><?php echo t("Legal Affairs Director"); ?></span><br />
                    <span>ID CODE: LM005</span><br />
                    <span class="card-email"></span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-10">
          <div class="custom-card-container">
            <div class="custom-card">
              <div class="content">
                <div class="img-box">
                  <img src="<?php echo $images_path; ?>our-team/7-amr.png" alt="Eng. Amr Othman" />
                </div>
                <div class="content-box">
                  <h3>
                    <?php echo t("Eng. Amr Othman"); ?><br />
                    <div class="our-team-items-separetor"></div>
                    <span><?php echo t("Programming and development department official"); ?></span><br />
                    <span>ID CODE: PM006</span><br />
                    <span class="card-email"></span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-10">
          <div class="custom-card-container">
            <div class="custom-card">
              <div class="content">
                <div class="img-box">
                  <img src="<?php echo $images_path; ?>our-team/8-waad.png" alt="Eng. Waad Alshea" />
                </div>
                <div class="content-box">
                  <h3>
                    <?php echo t("Eng. Waad Alshea"); ?><br />
                    <div class="our-team-items-separetor"></div>
                    <span><?php echo t("Responsible for Digital Marketing and Sales Department"); ?></span><br />
                    <span>ID CODE: MM007</span><br />
                    <span class="card-email"></span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-10">
          <div class="custom-card-container">
            <div class="custom-card">
              <div class="content">
                <div class="img-box">
                  <img src="<?php echo $images_path; ?>our-team/9-tariq.png" alt="Eng. Tariq Al-Abdullah" />
                </div>
                <div class="content-box">
                  <h3>
                    <?php echo t("Eng. Tariq Al-Abdullah"); ?><br />
                    <div class="our-team-items-separetor"></div>
                    <span><?php echo t("Responsible for Languages ​​and Translation Department"); ?></span><br />
                    <span>ID CODE: MM008</span><br />
                    <span class="card-email"></span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3 d-lg-none"></div>
        <div class="col-lg-4 col-sm-6 mb-10">
          <div class="custom-card-container">
            <div class="custom-card">
              <div class="content">
                <div class="img-box">
                  <img src="<?php echo $images_path; ?>our-team/10-karim.png" alt="Eng. Karim Hussein" />
                </div>
                <div class="content-box">
                  <h3>
                    <?php echo t("Eng. Karim Hussein"); ?><br />
                    <div class="our-team-items-separetor"></div>
                    <span><?php echo t("Responsible for advertising design and montage"); ?></span><br />
                    <span>ID CODE:DM009</span><br />
                    <span class="card-email"></span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Start Our Team -->

<!-- Start Our Hopes -->
<section class="our-hopes text-center" id="ourHopes">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="our-hopes-image-container mx-auto wow animate__animated animate__zoomInUp" data-wow-duration="1s" data-wow-offset="50">
          <img src="<?php echo $images_path; ?>/logo/logo-design-mm.png" alt="Point Media">
        </div>
      </div>
      <div class="col-12">
        <div class="our-hopes-text"><?php echo t("If we havent worked together yet... hopefully we will soon"); ?></div>
      </div>
      <div class="col-6 d-flex justify-content-end wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="50">
        <div class="our-hopes-btn">
          <a href="#"><?php echo t("Contact Us"); ?></a>
        </div>
      </div>
      <div class="col-6 d-flex justify-content-start wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="50">
        <div class="our-hopes-btn">
          <a href="#"><?php echo t("Get Offer"); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Start Our Hopes -->

<?php include $templates_path . "footer.php"; ?>