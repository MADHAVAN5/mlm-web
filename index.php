<?php
require_once("resources/connection_build.php");
// require_once("resources/check_login.php");
require_once("resources/function.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>

    <?php require_once("resources/header_links.php"); ?>
</head>

<body>


    <?php require_once("resources/header_home.php"); ?>

    <!-- <div class="row" style="margin-top: 60px;">
        <div class="col-lg-12">

        
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/img/slides-1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/slides-2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/slides-3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>
        </div>
    </div> -->

    <div id="carousel" style="margin-top: 60px;" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="6" aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="7" aria-label="Slide 8"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="8" aria-label="Slide 9"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="9" aria-label="Slide 10"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="10" aria-label="Slide 11"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="11" aria-label="Slide 12"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/slides-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides-3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides-4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides-5.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides-6.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides-7.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides-8.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides-9.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides-10.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides-11.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides-12.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="section container">
        <!-- Reports -->
        <div class="row">
            <div class="col-12">
                <div class="card" style="margin-top: 60px;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Reports</h5>

                        <!-- Line Chart -->
                        <div id="reportsChart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#reportsChart"), {
                                    series: [{
                                        name: 'Sales',
                                        data: [31, 40, 28, 51, 42, 82, 56],
                                    }, {
                                        name: 'Revenue',
                                        data: [11, 32, 45, 32, 34, 52, 41]
                                    }, {
                                        name: 'Customers',
                                        data: [15, 11, 32, 18, 9, 24, 11]
                                    }],
                                    chart: {
                                        height: 350,
                                        type: 'area',
                                        toolbar: {
                                            show: false
                                        },
                                    },
                                    markers: {
                                        size: 4
                                    },
                                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                    fill: {
                                        type: "gradient",
                                        gradient: {
                                            shadeIntensity: 1,
                                            opacityFrom: 0.3,
                                            opacityTo: 0.4,
                                            stops: [0, 90, 100]
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        curve: 'smooth',
                                        width: 2
                                    },
                                    xaxis: {
                                        type: 'datetime',
                                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                    },
                                    tooltip: {
                                        x: {
                                            format: 'dd/MM/yy HH:mm'
                                        },
                                    }
                                }).render();
                            });
                        </script>
                        <!-- End Line Chart -->

                    </div>

                </div>
            </div><!-- End Reports -->

            <div id="about"></div>
            <div class="card" style="margin-top: 60px;">
                <div class="card-body text-center">
                    <h5 class="card-title">ABOUT</h5>
                    <p>
                        3T money would என்பது உங்கள் எதிர்காலத்தை பிரகாசமாக்க ஒரு சிறந்த வாய்ப்பை வழங்கும் டிஜிட்டல் தளமாகும். அதன்
                        பின்னால் இருப்பவர்கள் நெட்வொர்க் மார்க்கெட்டிங்கில் அறிவும் கொண்டவர்கள். இன்றைய நவீன பியர்-டு-பியர்
                        தொழில்நுட்பம் மற்றும் டிஜிட்டல் தளத்தின் உதவியுடன் நிறைய பேரை நிதி ரீதியாக மேம்படுத்துவதே எங்கள் பார்வை.
                        நாங்கள் உங்களுக்கு ஒரு வலுவான தளத்தையும் வேலை செய்வதற்கும் சிறந்த விஷயங்களைச் சாதிப்பதற்கும் வாய்ப்பையும்
                        வழங்குகிறோம், மேலும் மகிழ்ச்சியான வாழ்க்கையை உருவாக்க உங்களுக்கு உதவுகிறோம். இது ஒரு business மட்டுமல்ல, 3T
                        குடும்பம்
                    </p>

                    <p>
                        3T money would is a digital platform that offers a great opportunity to brighten your future. The people
                        behind it are knowledgeable and knowledgeable in network marketing. Our vision is to uplift a lot of people
                        financially with the help of today's modern peer-to-peer technology and digital platform. We give you a strong
                        platform and the opportunity to work and achieve great things and help you build a happier life. It's not just
                        a business it is your family it is 3T to family
                    </p>

                    <p>
                        നിങ്ങളുടെ ഭാവി ശോഭനമാക്കാനുള്ള മികച്ച അവസരം നൽകുന്ന ഒരു ഡിജിറ്റൽ പ്ലാറ്റ്‌ഫോമാണ് 3T മണി വുഡ്. നെറ്റ്‌വർക്ക്
                        മാർക്കറ്റിംഗിൽ അറിവും അറിവും ഉള്ളവരാണ് ഇതിന് പിന്നിൽ. ഇന്നത്തെ ആധുനിക പിയർ-ടു-പിയർ സാങ്കേതികവിദ്യയുടെയും
                        ഡിജിറ്റൽ പ്ലാറ്റ്‌ഫോമിന്റെയും സഹായത്തോടെ ധാരാളം ആളുകളെ സാമ്പത്തികമായി ഉയർത്തുക എന്നതാണ് ഞങ്ങളുടെ കാഴ്ചപ്പാട്.
                        ഞങ്ങൾ നിങ്ങൾക്ക് ശക്തമായ ഒരു പ്ലാറ്റ്‌ഫോമും പ്രവർത്തിക്കാനും മഹത്തായ കാര്യങ്ങൾ നേടാനുമുള്ള അവസരവും നൽകുകയും
                        സന്തോഷകരമായ ജീവിതം കെട്ടിപ്പടുക്കാൻ നിങ്ങളെ സഹായിക്കുകയും ചെയ്യുന്നു. ഇത് ഒരു ബിസിനസ്സ് മാത്രമല്ല, നിങ്ങളുടെ
                        കുടുംബമാണ്, കുടുംബത്തിന് 3T ആണ്
                    </p>

                    <p>
                        3T ಹಣವು ಡಿಜಿಟಲ್ ವೇದಿಕೆಯಾಗಿದ್ದು ಅದು ನಿಮ್ಮ ಭವಿಷ್ಯವನ್ನು ಉಜ್ವಲಗೊಳಿಸಲು ಉತ್ತಮ ಅವಕಾಶವನ್ನು ನೀಡುತ್ತದೆ. ಇದರ ಹಿಂದಿರುವ
                        ಜನರು ನೆಟ್‌ವರ್ಕ್ ಮಾರ್ಕೆಟಿಂಗ್‌ನಲ್ಲಿ ಜ್ಞಾನ ಮತ್ತು ಜ್ಞಾನವನ್ನು ಹೊಂದಿದ್ದಾರೆ. ಇಂದಿನ ಆಧುನಿಕ ಪೀರ್-ಟು-ಪೀರ್ ತಂತ್ರಜ್ಞಾನ
                        ಮತ್ತು ಡಿಜಿಟಲ್ ವೇದಿಕೆಯ ಸಹಾಯದಿಂದ ಬಹಳಷ್ಟು ಜನರನ್ನು ಆರ್ಥಿಕವಾಗಿ ಮೇಲಕ್ಕೆತ್ತುವುದು ನಮ್ಮ ದೃಷ್ಟಿಯಾಗಿದೆ. ನಾವು ನಿಮಗೆ ಬಲವಾದ
                        ವೇದಿಕೆಯನ್ನು ನೀಡುತ್ತೇವೆ ಮತ್ತು ಕೆಲಸ ಮಾಡಲು ಮತ್ತು ಉತ್ತಮ ವಿಷಯಗಳನ್ನು ಸಾಧಿಸಲು ಮತ್ತು ಸಂತೋಷದ ಜೀವನವನ್ನು ನಿರ್ಮಿಸಲು ನಿಮಗೆ
                        ಸಹಾಯ ಮಾಡಲು ಅವಕಾಶವನ್ನು ನೀಡುತ್ತೇವೆ. ಇದು ಕೇವಲ ವ್ಯವಹಾರವಲ್ಲ ಅದು ನಿಮ್ಮ ಕುಟುಂಬ, ಕುಟುಂಬಕ್ಕೆ 3T
                    </p>

                    <p>
                        3T मनी एक डिजिटल प्लेटफॉर्म है जो आपको अपना भविष्य उज्जवल करने का एक शानदार अवसर देता है। इसके पीछे जो लोग हैं
                        वे नेटवर्क मार्केटिंग के भी जानकार हैं। हमारी दृष्टि आज की आधुनिक पीयर-टू-पीयर तकनीक और डिजिटल प्लेटफॉर्म की
                        मदद से बहुत से लोगों को आर्थिक रूप से सशक्त बनाना है। हम आपको काम करने और महान चीजें हासिल करने के लिए एक
                        मजबूत मंच और अवसर प्रदान करते हैं और आपको एक खुशहाल जीवन बनाने में मदद करते हैं। यह सिर्फ एक बिजनेस नहीं है,
                        यह एक 3T परिवार है
                    </p>
                </div>
            </div>

            <div id="version"></div>
            <div class="card" style="margin-top: 60px;">
                <div class="card-body text-center">
                    <h5 class="card-title">VERSION</h5>
                    Our vision is to provide even illiterate people with a monthly salary that is more than what one earns working
                    in an IT company through our company. So far you may join other crowdfunding business and lose your money.Such
                    crowdfunding business is not our business.Our only vision is to give you confidence and high income in our
                    business..
                </div>
            </div>

            <div id="mission"></div>
            <div class="card" style="margin-top: 60px;">
                <div class="card-body text-center">
                    <h5 class="card-title">MISSION</h5>
                    Help millions of people around the world through the success crowd funding platform. Our company is not only
                    for you to earn but also to help the needy you may not be able to help someone but through our company you can
                    help the needy.
                </div>
            </div>

            <div id="policy"></div>
            <div class="card" style="margin-top: 60px;">
                <div class="card-body text-center">
                    <h5 class="card-title">RETURN & REFUND POLICY</h5>
                    Return and Refund Policy For SBO Save Green Products

                    Thank you for shopping at school of business organization.
                    If, for any reason, You are not completely satisfied with a purchase We invite You to review our policy on
                    refunds and returns. This Ploicy Terms & Conditions not Accpted Our E-Services. This Return and Refund Policy
                    has been created with the help of the Return and Refund Policy Generator.
                    The following terms are applicable for any products that You purchased with Us.

                    Interpretation and Definitions
                    Interpretation

                    The words of which the initial letter is capitalized have meanings defined under the following conditions. The
                    following definitions shall have the same meaning regardless of whether they appear in singular or in plural.

                    Definitions
                    For the purposes of this Return and Refund Policy:

                    Company (referred to as either "the Company", "We", "Us" or "Our" in this Agreement)

                    Goods refer to the items offered for sale on the Service.

                    Orders mean a request by You to purchase Goods from Us.

                    Service refers to the Website.

                    Website refers to school of business organization, accessible from 3T MONEYWORLD

                    You means the individual accessing or using the Service, or the company, or other legal entity on behalf of
                    which such individual is accessing or using the Service, as applicable.

                    Your Order Cancellation Rights

                    You are entitled to cancel Your Order within 14 days without giving any reason for doing so.
                    The deadline for cancelling an Order is 14 days from the date on which You received the Goods or on which a
                    third party you have appointed, who is not the carrier, takes possession of the product delivered.
                    In order to exercise Your right of cancellation, You must inform Us of your decision by means of a clear
                    statement. You can inform us of your decision by:


                    By email: 


                    We will reimburse You no later than 14 days from the day on which We receive the returned Goods. We will use
                    the same means of payment as You used for the Order, and You will not incur any fees for such reimbursement.

                    Conditions for Returns

                    In order for the Goods to be eligible for a return, please make sure that:
                    The Goods were purchased in the last 14 days
                    The Goods are in the original packaging
                    The following Goods cannot be

                    returned:

                    The supply of Goods made to Your specifications or clearly personalized.

                    The supply of Goods which according to their nature are not suitable to be returned, deteriorate rapidly or
                    where the date of expiry is over.

                    The supply of Goods which are not suitable for return due to health protection or hygiene reasons and were
                    unsealed after delivery.

                    The supply of Goods which are, after delivery, according to their nature, inseparably mixed with other items.

                    We reserve the right to refuse returns of any merchandise that does not meet the above return conditions in
                    our sole discretion.

                    Returning Goods

                    You are responsible for the cost and risk of returning the Goods to Us. You should send the Goods at the
                    following address:


                    We cannot be held responsible for Goods damaged or lost in return shipment. Therefore, We recommend an insured
                    and trackable mail service. We are unable to issue a refund without actual receipt of the Goods or proof of
                    received return delivery.

                    Gifts

                    If the Goods were marked as a gift when purchased and then shipped directly to you, You’ll receive a gift
                    credit for the value of your return. Once the returned product is received, a gift certificate will be mailed
                    to You.

                    If the Goods weren’t marked as a gift when purchased, or the gift giver had the Order shipped to themselves to
                    give it to You later, We will send the refund to the gift giver.
                    <br>
                    Contact Us

                    If you have any questions about our Returns and Refunds Policy, please contact us:

                    By email:
                </div>
            </div>

        </div>
    </section>

    <section class="section contact container" id="contact">
        <div class="row gy-4">
            <h5 class="card-title text-center" style="margin-top: 60px;">CONTACT</h5>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-box card"> <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <p>A108 Adam Street,<br>New York, NY 535022</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-box card"> <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-box card"> <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@example.com<br>contact@example.com</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-box card"> <i class="bi bi-clock"></i>
                            <h3>Open Hours</h3>
                            <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card p-4">
                    <form action="request_handler.php" method="post" class="form_">
                        <div class="row gy-4">
                            <div class="col-md-6"> <input type="text" name="name" class="form-control" placeholder="Your Name" required></div>
                            <div class="col-md-6 "> <input type="email" class="form-control" name="email" placeholder="Your Email" required></div>
                            <div class="col-md-12"> <input type="text" class="form-control" name="phone" placeholder="Phone" required></div>
                            <div class="col-md-12"><textarea type="text" class="form-control" name="question" rows="6" placeholder="question" required></textarea></div>
                            <div class="col-md-12 text-center">
                                <button name="ques" type="submit" style="background: #4154f1; border: 0; padding: 10px 30px; color: #fff; transition: 0.4s; border-radius: 4px;">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <style>
        .bottomright {
            position: absolute;
            position: fixed;
            bottom: 75px;
            right: 16px;
            font-size: 15px;
        }

        .bottomright a {
            padding: 5px;
            border-radius: 10px;
            background-color: #4154f1;
            color: white;
        }
    </style>
    <div class="bottomright">
        <a href="mailto:asmoneyworldttt@gmail.com?subject=REPORT">REPORT</a>
    </div>

    <footer id="" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>2022</span></strong>
        </div>
        <div class="credits">
            <a href="https://www.instagram.com/asmoneyworld/"><i style="font-size: 20px; padding-right:5px;" class="bi bi-instagram"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100087956473989&mibextid=ZbWKwL"><i style="font-size: 20px; padding-right:5px;" class="bi bi-facebook"></i></a>
            <a href="https://t.me/+Up1GHCQS78o2MTFl"><i style="font-size: 20px; padding-right:5px;" class="bi bi-telegram"></i></a>
            <a href="https://youtube.com/@asmoneyworld"><i style="font-size: 20px;" class="bi bi-youtube"></i></a>
        </div>
    </footer><!-- End Footer -->

    <!-- ======= Footer ======= -->
    <?php
    // require_once("resources/footer.php");
    require_once("resources/footer_links.php");
    ?>

</body>

</html>