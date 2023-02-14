<?php
// $pageTitle = 'Our Services';
// include "init.php";
// include $langs_path . "ar.php";
// include $templates_path . "header.php";

/**
 * gd   => GRAPHIC DESIGN
 * maa  => MARKETING AND ADVERTISING
 * wd   => WEBSITES DEVELOPMENT
 * pae  => PHOTOGRAPHY AND EDITING
 * ts   => TRANSLATION SERVICES
 * es   => ENGINEERING SERVICES
 * tc   => TRAINING COURSES
 * nps  => NON-PROFIT SERVICES
 */

$location = '';

$location = isset($_GET['service']) && $_GET['service'] != '' ? $_GET['service'] : 'gd';;

// Markiting And Advertising
if ($location === 'maa') {
  $pageTitle = 'Markiting And Advertising';
  include "init.php";
?>
  <!-- Start Markiting And Advertising -->
  <section class="our-services-parts" id="markitingAndAdvertising">
    <div class="our-services-parts-title-area d-flex justify-content-center align-items-center flex-column">
      <div class="overlay"></div>
      <div class="title-description-container text-center wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50">
        <h3 class="our-services-parts-main-title"><?php echo t('Marketing and Digital Content Management'); ?></h3>
        <p class="our-services-parts-main-description"><?php echo t('Point Media is a company that offers you a variety of services in one place. If you are looking for an e-marketing company that uses unconventional strategies in e-marketing according to multiple marketing channels on various platforms, and keeps pace with the changes taking place in this field permanently, you are in the right place.'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Writing And Managing Digital Vontent According To SEO Rules'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Managing Social Networks'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Search Engine Marketing (SEO)'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Social Media Marketing'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Content Marketing'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Building Brand Awareness'); ?>
          </li>
        </ul>
      </div>
      <!--  wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50" -->
      <div class="col-md-6 px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Right' : 'Left' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 d-none d-md-block px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Write And Build A Deployment Plan'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Development Of The Marketing Strategy'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Launch Advertising Campaigns'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Economic Feasibility Study For The Commercial Project'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Competitor Analysis And Market Study'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Writing And Revising SEO Friendly Blogger Articles'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 d-md-none px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
    </div>
  </section>
  <!-- End Markiting And Advertising -->
<?php
} elseif ($location === 'wd') {
  $pageTitle = 'Websites Development';
  include "init.php";
?>
  <!-- Start Websites Development -->
  <section class="our-services-parts" id="websitesDevelopment">
    <div class="our-services-parts-title-area d-flex justify-content-center align-items-center flex-column">
      <div class="overlay"></div>
      <div class="title-description-container text-center wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50">
        <h3 class="our-services-parts-main-title"><?php echo t('Development of Websites and Applications'); ?></h3>
        <p class="our-services-parts-main-description text-center"><?php echo t('We use the latest technologies to support the browsing speed of all the sites that we do, and we rely on clean and solid codes, and we offer you the best services for designing mobile applications and online stores in terms of quality and the most appropriate in terms of prices. Point Media offers you an integrated set of web services that make you reassuring when building your project to become integrated in all its aspects.'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Reservation of hosting and domain for websites'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Website Design'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('App Design'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Right' : 'Left' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 d-none d-md-block px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Online Store Design'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Corporate Website Design'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Securing Business Emails That Match Your Domain'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 d-md-none px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
    </div>
  </section>
  <!-- End Websites Development -->
<?php
} elseif ($location === 'pae') {
  $pageTitle = 'Photography And Editing';
  include "init.php";
?>
  <!-- Start Photography And Editing -->
  <section class="our-services-parts" id="photographyAndEditing">
    <div class="our-services-parts-title-area d-flex justify-content-center align-items-center flex-column">
      <div class="overlay"></div>
      <div class="title-description-container text-center wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50">
        <h3 class="our-services-parts-main-title"><?php echo t('Product Photography and Video Editing'); ?></h3>
        <p class="our-services-parts-main-description text-center"><?php echo t('Pictures and videos have a great power and influence on the behavior of the online buyer in making a product purchase decision, and there are already proven facts and theories that indicate that product images play the biggest role in selling products if they are professional, versatile and beautiful. It helps to better communicate information about your products to shoppers.'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Photographer'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Product Photography'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Edit Videos'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Right' : 'Left' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 d-none d-md-block px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Designing An Advertising Video'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Designed By Intro Motion'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 d-md-none px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
    </div>
  </section>
  <!-- End Photography And Editing -->
<?php
} elseif ($location === 'ts') {
  $pageTitle = 'Translation Services';
  include "init.php";
?>
  <!-- Start Translation Services -->
  <section class="our-services-parts" id="translationServices">
    <div class="our-services-parts-title-area d-flex justify-content-center align-items-center flex-column">
      <div class="overlay"></div>
      <div class="title-description-container text-center wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50">
        <h3 class="our-services-parts-main-title"><?php echo t('Translation'); ?></h3>
        <p class="our-services-parts-main-description text-center"><?php echo t('Point Media offers a professional translation service that depends on a thorough understanding of the wording. All this according to an agreed timetable. Speed and punctuality are our goal and your time is very important to us. Also, we are not satisfied with providing translation services only, but we also work on modifying your projects to suit multilingualism by restructuring designs to suit the language of your target audience.'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Translating, revising and writing content in both Arabic and English'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Audiovisual Subtitling (Arabic - English - French)'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Right' : 'Left' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 d-none d-md-block px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Closed Captioning (Arabic - English - French)'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 d-md-none px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
    </div>
  </section>
  <!-- End Translation Services -->
<?php
} elseif ($location === 'es') {
  $pageTitle = 'Engineering Services';
  include "init.php";
?>
  <!-- Start Engineering Services -->
  <section class="our-services-parts" id="engineeringServices">
    <div class="our-services-parts-title-area d-flex justify-content-center align-items-center flex-column">
      <div class="overlay"></div>
      <div class="title-description-container text-center wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50">
        <h3 class="our-services-parts-main-title"><?php echo t('Engineering Services'); ?></h3>
        <p class="our-services-parts-main-description text-center"><?php echo t('A team of Syrian and Arab engineers gathered to draw the engineering elegance from architectural design, decorative design, structural, electrical, mechanical, sewage and water supply plans, landscaping, and all engineering directing and 3D modeling works.'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Drawing Architectural Plans For The Project'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Modeling And Uploading Architectural Plans For 3D Blocks'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Interior Design For Residential Or Commercial Building'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Design Of 3D Interfaces And External Perspectives'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Drawing Executive Construction Plans At An Economic Cost'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Right' : 'Left' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 d-none d-md-block px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Drawing Mechanics, Sewage And Water Supply Plans'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Drawing Electrical Diagrams'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Executing System Analyses For Project Analysis And Scheduling'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Engineering Supervision On Projects'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 d-md-none px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
    </div>
  </section>
  <!-- End Engineering Services -->
<?php
} elseif ($location === 'tc') {
  $pageTitle = 'Training Courses';
  include "init.php";
?>
  <!-- Start Training Courses -->
  <section class="our-services-parts" id="trainingCourses">
    <div class="our-services-parts-title-area d-flex justify-content-center align-items-center flex-column">
      <div class="overlay"></div>
      <div class="title-description-container text-center wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50">
        <h3 class="our-services-parts-main-title"><?php echo t('Courses'); ?></h3>
        <p class="our-services-parts-main-description text-center"><?php echo t('With the development that is happening around us, distance learning has become much easier than before, as it gives the learner room for creativity, greater freedom than traditional education, and our belief in its importance, we have created for you a digital global space that allows learning by the best trainers, with the possibility to meet with them virtually Or on private groups during and after the training course to answer all your inquiries, review the jobs of the trainees, and discuss the field.'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Advertising Design'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Content Industry'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Freelance Trip'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Self Marketing'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('E-Marketing'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Human Resources Management HR'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Small and Medium Enterprises Management'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Communication And Employment Skills'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Leadership And Teamwork Skills'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Right' : 'Left' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 d-none d-md-block px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Learn Microsoft Office Suite'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Learn AutoCad'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Learn advanced Microsoft Excel'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Learn Adobe Photoshop'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Learn Adobe Illustrator'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Learn Adobe InDesign'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Learn Adobe Lightroom'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Learn Adobe XD'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 d-md-none px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
    </div>
  </section>
  <!-- End Training Courses -->
<?php
} elseif ($location === 'nps') {
  $pageTitle = 'Non-Profit Services';
  include "init.php";
?>
  <!-- Start Non-Profit Services -->
  <section class="our-services-parts" id="nonProfitServices">
    <div class="our-services-parts-title-area d-flex justify-content-center align-items-center flex-column">
      <div class="overlay"></div>
      <div class="title-description-container text-center wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50">
        <h3 class="our-services-parts-main-title"><?php echo t('Unpaid Services'); ?></h3>
        <p class="our-services-parts-main-description text-center"><?php echo t('Out of our belief in the charity and creative spirit of our team, and in support of non-profit organizations and youth. We serve these institutions with all our energy with non-profit services, support the causes we believe in and enhance the presence of these groups through:'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Periodic Workshops To Qualify Young People To Enter The Labor Market'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Providing Advice And Advice To Non-profit Organizations And Institutions'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Providing Free Consultations To Emerging And Freelance Entrepreneurs'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Supporting Volunteer And Youth Teams From The Media Point Of View'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Right' : 'Left' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 d-none d-md-block px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Reviewing And Evaluating The Digital Activity Of Online Businesses'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Writing Or Evaluating A CV To Apply For A Job'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Providing Training Opportunities For Employees Wishing To Join Our Team'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 d-md-none px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
    </div>
  </section>
  <!-- End Non-Profit Services -->
<?php
} else {
  $pageTitle = 'Graphic Design';
  include "init.php";
?>
  <!-- Start Graphic Design -->
  <section class="our-services-parts" id="graphicDesign">
    <div class="our-services-parts-title-area d-flex justify-content-center align-items-center flex-column">
      <div class="overlay"></div>
      <div class="title-description-container text-center wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-offset="50">
        <h3 class="our-services-parts-main-title"><?php echo t('Graphic Design'); ?></h3>
        <p class="our-services-parts-main-description text-center"><?php echo t('Point Media Company has been distinguished by providing the best to its clients in all its relevant fields. Choosing a company that provides distinctive design services is an inevitable and important stage to ensure the success of your project idea, and to represent its visual identity accurately and professionally according to international standards.'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Visual Identity Design'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Logo Design'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Social Media Design'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Printing Design'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('UI/UX'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Right' : 'Left' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 d-none d-md-block px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
      <div class="col-md-6 px-0 d-flex align-items-center">
        <ul class="our-services-parts-list <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-2">
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Advertising and Packaging Design'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Book Covers and Content Design'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Infographic Design'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Motion Graphic'); ?>
          </li>
          <li class="our-services-parts-list-items">
            <i class="fa fa-check-circle our-services-parts-list-icon <?php echo $_COOKIE['language'] == "en" ? 'me' : 'ms' ?>-3"></i>
            <?php echo t('Designing Educational Presentations'); ?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 d-md-none px-0">
        <div class="our-services-parts-image wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50"></div>
      </div>
    </div>
  </section>
  <!-- End Graphic Design -->
<?php
}
?>
<section class="example-for-our-works">
  <div class="container">
    <div class="example-for-our-works-title"><?php echo t('Examples Of Our Work'); ?></div>
    <div class="example-for-our-works-divider"></div>
    <!-- <div class="row text-center wow animate__animated animate__slideIn<?php echo $_COOKIE['language'] == "en" ? 'Left' : 'Right' ?>" data-wow-duration="1s" data-wow-offset="50">
      <div class="col-md-6 col-lg-4">
        <div class="example-for-our-works-video">
          <iframe src="https://www.youtube.com/embed/YajM38Dc3Qk?list=PLDoPjvoNmBAxdiBh6J62wOzEnvC4CNuFU" title="eCommerce Shop in Arabic #001 - Introduction about the Course" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="example-for-our-works-video">
          <iframe src="https://www.youtube.com/embed/YajM38Dc3Qk?list=PLDoPjvoNmBAxdiBh6J62wOzEnvC4CNuFU" title="eCommerce Shop in Arabic #001 - Introduction about the Course" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-3 d-md-block d-none d-lg-none"></div>
      <div class="col-md-6 col-lg-4">
        <div class="example-for-our-works-video">
          <iframe src="https://www.youtube.com/embed/YajM38Dc3Qk?list=PLDoPjvoNmBAxdiBh6J62wOzEnvC4CNuFU" title="eCommerce Shop in Arabic #001 - Introduction about the Course" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div> -->
    <a href="#" class="see-all-works-link">
      <div class="see-all-works-btn">
        <?php echo t('See All Works'); ?>
      </div>
    </a>
  </div>
</section>
<?php
include $templates_path . "footer.php";
