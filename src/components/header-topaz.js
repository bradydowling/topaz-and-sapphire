import { Link } from "gatsby"
import PropTypes from "prop-types"
import React from "react"

// const NavLink = () => {

// }

const NavList = () => (
  <ul id="menu-menu-1" className="main-menu">
    <li id="menu-item-36" className="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-36"><Link to="/" aria-current="page">Home</Link></li>
    <li id="menu-item-58" className="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-58"><Link to="category/travel/">Travel</Link></li>
    <li id="menu-item-54" className="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-54"><Link to="category/career/">Career</Link></li>
    <li id="menu-item-678" className="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-678"><Link to="category/abode/">Abode</Link></li>
    <li id="menu-item-680" className="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-680"><Link to="category/sweat/">Sweat</Link></li>
    <li id="menu-item-681" className="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-681"><Link to="category/eats/">Eats</Link></li>
    <li id="menu-item-55" className="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-55"><Link to="category/current-events/">Chatter</Link></li>
    <li id="menu-item-37" className="menu-item menu-item-type-post_type menu-item-object-page menu-item-37"><Link to="about/">About</Link></li>
    <li id="menu-item-40" className="menu-item menu-item-type-post_type menu-item-object-page menu-item-40"><Link to="contact/">Contact</Link></li>
  </ul>
)

const Header = ({ siteTitle }) => (
  <header id="masthead" className="site-header">
    <div className="header-main">
      <div className="container">
        <nav id="main-menu" className="site-navigation primary-navigation" role="navigation">
          <NavList />
        </nav>
        <div className="clearfix"></div>
      </div>
    </div>
  </header>
)

Header.propTypes = {
  siteTitle: PropTypes.string,
}

Header.defaultProps = {
  siteTitle: ``,
}

export default Header
