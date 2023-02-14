<!-- <div class="loading-container" dir="ltr">
    <div class="loader">
        <div class="ring"></div>
        <div class="ring"></div>
        <div class="ring"></div>
        <p>loading...</p>
    </div>
</div> -->
<footer class="footer" id="footer">
    <div class="main-footer">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 col-lg-4">
                    <div class="footer-logo">
                        <img src="<?php echo $images_path; ?>logo/white-logo.png" alt="Point Media" />
                    </div>
                    <div class="footer-contact-icons">
                        <ul class="contact-list">
                            <li class="social-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="social-item">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="social-item">
                                <a href="#">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <div class="d-sm-none d-md-block d-lg-none breakline"></div>
                            <li class="social-item">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="social-item">
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li class="social-item">
                                <a href="#">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <li class="social-item">
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 mt-4">
                    <div class="row">
                        <div class="col-md-12 col-lg-5 mb-3">
                            <div class="content pe-5">
                                <span class="footer-icons">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <span class="footer-info footer-info-number me-2">
                                    00963-980-5300-47
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-7 mb-3">
                            <div class="content pe-5">
                                <span class="footer-icons">
                                    <i class="fa fa-map"></i>
                                </span>
                                <span class="footer-info me-2">
                                    Odabaşı Mah. Mehmet Beyazıt Blok No: 11, iç kapı No: 5 Antakya/ Hatay
                                </span>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="content pe-5">
                                <span class="footer-icons">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <span class="footer-info footer-info-description me-2">
                                    contact@pointmedia.com
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copy-right text-center">All Copyright Reserved To &copy; Point Media</div>
</footer>
<!-- jQuery -->
<script src="<?php echo $packages_path; ?>jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo $packages_path; ?>bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- WayPoints -->
<script src="<?php echo $packages_path; ?>waypoints/lib/noframework.waypoints.min.js"></script>
<!-- WOW.js -->
<script src="<?php echo $packages_path; ?>wowjs/dist/wow.min.js"></script>
<!-- Vanilla.js -->
<script src="<?php echo $packages_path; ?>vanilla-tilt/dist/vanilla-tilt.min.js" type="text/javascript"></script>
<script>
    // new WOW().init();
    $(function() {
        new WOW().init();
    });
    //also at the window load event
    $(window).on('load', function() {
        new WOW().init();
    });
</script>
<!-- My -->
<script src="<?php echo $js_path; ?>main.js"></script>
<script src="<?php echo $js_path; ?>manage/works.js"></script>
<script src="<?php echo $js_path; ?>manage/blog.js"></script>
<script src="<?php echo $js_path; ?>manage/courses.js"></script>
</body>

</html>
<?php ob_end_flush() ?>