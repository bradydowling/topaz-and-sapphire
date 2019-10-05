import PropTypes from "prop-types"
import React from "react"

const Footer = ({ siteTitle }) => (
  <footer id="colophone">
    <div className="container">
      <div id="backtotop">
        <i className="icon icon-arrow-up" />
      </div>
      <div className="social">
        <ul>
          {siteTitle}
          <li><a href="https://www.facebook.com/topazandsapphire" target="_blank"><i className="icon icon-social-facebook" /></a></li>
          <li><a href="http://twitter.com/topaznsapphire" target="_blank"><i className="icon icon-social-twitter" /></a></li>
          <li><a href="instagram.com/topazandsapphire" target="_blank"><i className="icon icon-social-instagram" /></a></li>
          <li><a href="https://www.pinterest.com/topaznsapphire/" target="_blank"><i className="icon icon-social-pinterest" /></a></li>
          <li><a href="https://www.youtube.com/channel/UCs-9lAUt57xgGGHswy2Yn9A/feed" target="_blank"><i className="icon icon-social-youtube" /></a></li>
        </ul>
      </div><br />
      <span className="author">Powered by <a href="http://wordpress.org">WordPress</a>. Designed by <a href="http://www.themewarrior.com">Themewarrior</a></span>
    </div>
  </footer>
)

Footer.propTypes = {
  siteTitle: PropTypes.string,
}

Footer.defaultProps = {
  siteTitle: ``,
}

export default Footer
