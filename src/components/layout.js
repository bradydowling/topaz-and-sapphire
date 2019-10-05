/**
 * Layout component that queries for data
 * with Gatsby's useStaticQuery component
 *
 * See: https://www.gatsbyjs.org/docs/use-static-query/
 */

import React from "react"
import PropTypes from "prop-types"
import { Link, useStaticQuery, graphql } from "gatsby"

import TopazHeader from "./header-topaz"
import Sidebar from "./sidebar"
import InstaFeed from "./instagram-feed"
import Footer from "./footer"
import "../styles/reset.css"
import "../styles/style.css"
import "../styles/responsive.css"
import "../styles/icomoon/style.css"
import "../styles/tns-custom-styles.css"
import "../styles/tns-inline-styles.css"

const Logo = () => (
  <div id="logo">
    <Link to="/"><img src="http://topazandsapphire.com/wp-content/uploads/2015/11/Topaz-and-Sapphire-Header.png" alt="" scale="0" /></Link>
  </div>
);

const Layout = ({ children }) => {
  const data = useStaticQuery(graphql`
    query SiteTitleQuery {
      allWordpressSiteMetadata {
        edges {
          node {
            name
          }
        }
      }
    }
  `)

  return (
    <>
      <TopazHeader siteTitle={data.allWordpressSiteMetadata.edges[0].node.name} />
      <Logo />
      <div id="main-content">
        <div className="container">
          <section id="primary" class="content-area site-main" role="main">
            {children}
          </section>
          <Sidebar />
        </div>
        <InstaFeed username={"topazandsapphire"} />
        <Footer />
      </div>
    </>
  )
}

Layout.propTypes = {
  children: PropTypes.node.isRequired,
}

export default Layout
