import { Link } from "gatsby"
import PropTypes from "prop-types"
import React from "react"

// const NavLink = () => {

// }

const NavList = () => (
  <ul id="menu-menu-1" class="main-menu">
    <li id="menu-item-36" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-36"><Link to="/" aria-current="page">Home</Link></li>
    <li id="menu-item-58" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-58"><Link to="category/travel/">Travel</Link></li>
    <li id="menu-item-54" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-54"><Link to="category/career/">Career</Link></li>
    <li id="menu-item-678" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-678"><Link to="category/abode/">Abode</Link></li>
    <li id="menu-item-680" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-680"><Link to="category/sweat/">Sweat</Link></li>
    <li id="menu-item-681" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-681"><Link to="category/eats/">Eats</Link></li>
    <li id="menu-item-55" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-55"><Link to="category/current-events/">Chatter</Link></li>
    <li id="menu-item-37" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-37"><Link to="about/">About</Link></li>
    <li id="menu-item-40" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-40"><Link to="contact/">Contact</Link></li>
  </ul>
)

const Header = ({ siteTitle }) => (
  <header id="masthead" class="site-header">
    <div class="header-main">
      <div class="container">
        <nav id="main-menu" class="site-navigation primary-navigation" role="navigation">
          <NavList />
          <Link class="menu-trigger"></Link>
        </nav>
        <div class="clearfix"></div>
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
