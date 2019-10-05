/**
 * Layout component that queries for data
 * with Gatsby's useStaticQuery component
 *
 * See: https://www.gatsbyjs.org/docs/use-static-query/
 */

import React from "react"
import PropTypes from "prop-types"
import { useStaticQuery, graphql } from "gatsby"

import TopazHeader from "./header-topaz"
import Sidebar from "./sidebar"
import InstaFeed from "./instagram-feed"
import Footer from "./footer"
import "../styles/reset.css"
import "../styles/style.css"
import "../styles/icomoon/style.css"
import "../styles/tns-custom-styles.css"
import "../styles/tns-inline-styles.css"

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
      <div
        style={{
          margin: `0 auto`,
          maxWidth: 960,
          padding: `0px 1.0875rem 1.45rem`,
          paddingTop: 0,
        }}
      >
        <main>{children}</main>
        <Sidebar />
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
