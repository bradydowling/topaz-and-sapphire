import PropTypes from "prop-types"
import React from "react"

const SearchFormWidget = () => (
  <div class="blocks widgets search-widget">
    <div class="wrapper">
      <form class="block-form float-label search-form" method="get" action="http://topazandsapphire.com/">
        <div class="form-group block">
          <div style={{ position: "relative" }}><input type="text" id="search_widget" class="input" name="s" value="" placeholder="Type your search..." /></div>
          <button type="submit" class="searchbutton" onclick="jQuery('#search-form').submit();"><i class="icon icon-search"></i></button>
        </div>
      </form>
    </div>
  </div>
)


const Sidebar = ({ siteTitle }) => (
  <section id="sidebar" class="site-header">
    <div id="widget-warrior_about_author-3" class="widget about_author">
      <h4 class="widget-title">Hey Ya'll</h4>
      <div class="blocks site-info">
        <div class="info">
          <p><img src="http://www.topazandsapphire.com/wp-content/uploads/2016/03/MG_7393.jpg" alt="" /></p>
          <p>Topaz &amp; Sapphire is a space for millennial women created by two sisters who believe that women can have great careers while also building inspiring home lives. T&amp;S celebrates career, culture, and living well. You are a gem, life is what refines you! </p>
        </div>

        <div class="social">
          <a href="https://www.facebook.com/topazandsapphire" target="_blank" rel="noopener noreferrer"><i class="icon icon-social-facebook"></i></a>
          <a href="http://twitter.com/topaznsapphire" target="_blank" rel="noopener noreferrer"><i class="icon icon-social-twitter"></i></a>
          <a href="http://instagram.com/topazandsapphire" target="_blank" rel="noopener noreferrer"><i class="icon icon-social-instagram"></i></a>
          <a href="https://www.pinterest.com/topaznsapphire/" target="_blank" rel="noopener noreferrer"><i class="icon icon-social-pinterest"></i></a>
          <a href="https://www.youtube.com/channel/UCs-9lAUt57xgGGHswy2Yn9A/feed" target="_blank" rel="noopener noreferrer"><i class="icon icon-social-youtube"></i></a>
          <a href="https://vimeo.com/latishacatch" target="_blank" rel="noopener noreferrer"><i class="icon icon-social-vimeo"></i></a>
        </div>
      </div>
    </div><div id="widget-search-4" class="widget widget_search">
      <SearchFormWidget />
    </div>
    <div id="widget-text-2" class="widget widget_text">
      <div class="textwidget">
        <iframe title="blog follow widget" src="https://www.bloglovin.com/v2/widget/follow?id=14377629" scrolling="no" class="bloglovin-widget-follow" style={{ border: "0px none", width: "100%", height: "254px" }}></iframe>
      </div>
    </div>
    <div id="widget-mc4wp_widget-3" class="widget widget_mc4wp_widget">
      <h4 class="widget-title">Receive Our Monthly Newsletter!</h4>
      <div id="mc4wp-form-1" class="form mc4wp-form">
        <form method="post">
          <p>
            <label>First Name:</label>
            <input type="text" name="FNAME" placeholder="Your first name" required="required" style={{ backgroundImage: "url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;)", backgroundRepeat: "no-repeat", backgroundAttachment: "scroll", backgroundSize: "16px 18px", backgroundPosition: "98% 50%" }} />
          </p>
          <p></p>
          <p>
            <label>Email address: </label>
            <input type="email" id="mc4wp_email" name="EMAIL" placeholder="Your email address" required="" />
          </p>
          <p>
            <input type="submit" value="Subscribe" />
          </p>
          <p></p>
          <div style={{ position: "absolute", left: "-5000px" }}><input type="text" name="_mc4wp_ho_1d0b8af00ede190f632e8ac13da9852f" value="" tabindex="-1" autocomplete="off" /></div>
          <input type="hidden" name="_mc4wp_timestamp" value="1566261525" />
          <input type="hidden" name="_mc4wp_form_id" value="0" />
          <input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1" />
          <input type="hidden" name="_mc4wp_form_submit" value="1" />
          <input type="hidden" name="_mc4wp_form_nonce" value="c37a294c88" />
        </form>
      </div>
    </div>
  </section>
)

Sidebar.propTypes = {
  siteTitle: PropTypes.string,
}

Sidebar.defaultProps = {
  siteTitle: ``,
}

export default Sidebar
