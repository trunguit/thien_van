<footer class="footer_background">
    <footer class="footer" role="contentinfo">
        <h2 class="footer-title-sr-only">Footer Start</h2>
        <div class="container">
            <div class="row">
                <!-- footer contact  -->
                <div class="col-lg-4 col-md-4 foot-sec">
                    <article class="footer-info-col footer-info-col--small" data-section-type="storeInfo">
                        <h3 class="footer-info-heading hidden-cont">Info<button class="toggle collapsed"
                                data-toggle="collapse" data-target="#contact"></button></h3>
                        <h1 class="header-logo foot-logo">
                            <a href="{{ route('home') }}" class="header-logo__link" data-header-logo-link>
                                <img class="header-logo-image-unknown-size" src="{{ asset($setting->logo) }}"
                                    alt="FreshGo-Vegetable" title="FreshGo-Vegetable">
                            </a>
                        </h1>
                        <div class="collapse foot-content" id="contact">
                            <div class="contact-contant">
                                <p>{{ $setting->introduction }}</p>
                            </div>
                            <i class="fa fa-map-marker"></i>
                            <address>{{ $setting->address }}</address>
                            <i class="fa fa-phone"></i>
                            <span class="foot-phone">{{ $setting->phone1 }}</span>
                            <div class="footer-custom-contact">
                                <svg width="20px" height="20px">
                                    <use xlink:href="#footcnt"></use>
                                </svg>
                                <ul>
                                    <li>Have any question please call us</li>
                                    <li class="custom-number">{{ $setting->phone2 }}</li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- footer navigation -->
                <div class="col-lg-2 col-md-2 foot-sec">
                    <article class="footer-info-col footer-info-col--small" data-section-type="footer-webPages">
                        <h3 class="footer-info-heading">Liên kết<button class="toggle collapsed" data-toggle="collapse"
                                data-target="#navigate"></button></h3>
                        <div class="collapse foot-content" id="navigate">
                            <ul class="footer-info-list">
                                <li>
                                    <a href="{{ route('frontend.page', ['alias' => 've-chung-toi']) }}">Về chúng tôi</a>
                                </li>

                            </ul>
                        </div>
                    </article>
                </div>

                <div class="col-lg-2 col-md-2 foot-sec">
                    <article class="footer-info-col footer-info-col--small" data-section-type="footer-brands">
                        <h3 class="footer-info-heading">Danh mục nổi bật<button class="toggle collapsed" data-toggle="collapse" data-target="#brands"></button></h3>
                        <div class="collapse foot-content" id="brands">
                            <ul class="footer-info-list">
                                @foreach ($categories as $item)
                                <li>
                                    <a href="{{ route('category', ['alias' => $item->alias])}}">{{ $item->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                </div>
                <!-- footer newslatter section -->
                <div class="col-lg-4 col-md-4 foot-sec">

                    <article class="footer-info-col footer-info-col--small" data-section-type="footer-brands">
                        <h3 class="footer-info-heading">SIGN UP FOR NEWSLETTER<button class="toggle collapsed"
                                data-toggle="collapse" data-target="#categories"></button></h3>
                        <div class="collapse foot-content" id="categories">
                            <ul class="footer-info-list">
                                <div id="newsletter">
                                    <div class="custom-text-newslatter">
                                        <p>{{$setting->email1}}</p>
                                        <p>{{$setting->email2}}</p>
                                    </div>
                                    <form class="form" action="#" method="post">
                                        <fieldset class="form-fieldset">
                                            <input type="hidden" name="action" value="subscribe">
                                            <input type="hidden" name="nl_first_name" value="bc">
                                            <input type="hidden" name="check" value="1">
                                            <div class="form-field">
                                                <label class="form-label is-srOnly" for="nl_email">Email
                                                    Address</label>
                                                <div class="form-prefixPostfix wrap">
                                                    <input class="form-input" id="nl_email" name="nl_email"
                                                        type="email" value=""
                                                        placeholder="Your email address"
                                                        aria-describedby="alertBox-message-text" aria-required="true"
                                                        required="">
                                                    <input
                                                        class="button button--primary form-prefixPostfix-button--postfix"
                                                        type="submit" value="Subscribe">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <p>To Get the latest news from us please subscribe your email.</p>
                                </div>
                                <div class="list-unstyled foot_img">
                                    <li>
                                        <a href="#"><img
                                                class="img-fluid mx-auto d-block lazyautosizes ls-is-cached lazyloaded"
                                                data-sizes="auto" src="{{asset('frontend/store-logo.png')}}"
                                                data-src="{{asset('frontend/store-logo.png')}}"
                                                alt="" sizes="50px"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img
                                                class="img-fluid mx-auto d-block lazyautosizes ls-is-cached lazyloaded"
                                                data-sizes="auto" src="{{asset('frontend/store-logo.png')}}"
                                                data-src="{{asset('frontend/store-logo.png')}}"
                                                alt="" sizes="50px"></a>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </article>

                </div>
            </div>
            <div class="row foot-category footer-info-list">

                <div class="col-12 col-md-12 second-last-foot">
                    <ul class="list-line">
                        @foreach ($keywords as $item)
                            <li><a
                                    href="{{ route('frontend.search', ['search_query' => $item->keyword]) }}">{{ $item->keyword }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-4 foot-copy">
                        <div class="footer-copyright">
                            <p class="powered-by">{{$setting->copyright}}</p>
                        </div>

                        <div data-content-region="ssl_site_seal--global"></div>
                        <a href="#" id="scroll" title="Scroll to Top" style="display: block;">
                            <i class="fa fa-angle-double-up"></i>
                        </a>
                    </div>
                    <div class="col-4 foot-social">
                        <article class="footer-social" data-section-type="newsletterSubscription">
                            <ul class="socialLinks socialLinks--alt">
                                <li class="socialLinks-item">
                                    <a class="icon icon--twitter" href="http://#" target="_blank" rel="noopener"
                                        title="Twitter">
                                        <span class="aria-description--hidden">Twitter</span>
                                        <svg>
                                            <use xlink:href="#icon-twitter" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="socialLinks-item">
                                    <a class="icon icon--facebook" href="http://#" target="_blank" rel="noopener"
                                        title="Facebook">
                                        <span class="aria-description--hidden">Facebook</span>
                                        <svg>
                                            <use xlink:href="#icon-facebook" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="socialLinks-item">
                                    <a class="icon icon--pinterest" href="http://#" target="_blank" rel="noopener"
                                        title="Pinterest">
                                        <span class="aria-description--hidden">Pinterest</span>
                                        <svg>
                                            <use xlink:href="#icon-pinterest" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="socialLinks-item">
                                    <a class="icon icon--instagram" href="http://#" target="_blank" rel="noopener"
                                        title="Instagram">
                                        <span class="aria-description--hidden">Instagram</span>
                                        <svg>
                                            <use xlink:href="#icon-instagram" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="socialLinks-item">
                                    <a class="icon icon--linkedin" href="http://#" target="_blank" rel="noopener"
                                        title="Linkedin">
                                        <span class="aria-description--hidden">Linkedin</span>
                                        <svg>
                                            <use xlink:href="#icon-linkedin" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </article>
                    </div>
                    <div class="col-4 foot-payment">
                        <div class="footer-payment-icons">
                            <svg class="footer-payment-icon">
                                <use xlink:href="#icon-logo-mastercard"></use>
                            </svg>
                            <svg class="footer-payment-icon">
                                <use xlink:href="#icon-logo-visa"></use>
                            </svg>
                            <svg class="footer-payment-icon">
                                <use xlink:href="#icon-logo-amazonpay"></use>
                            </svg>
                            <svg class="footer-payment-icon">
                                <use xlink:href="#icon-logo-googlepay"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</footer>
