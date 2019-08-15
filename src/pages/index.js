import React from "react"
import { Link, graphql } from "gatsby"
import Layout from "../components/layout"
import SEO from "../components/seo"

const IndexPage = ({ data }) => (
  <Layout>
    <SEO title="Home" />
    <h1>My WordPress Blog</h1>
    <h4>Posts</h4>
    {data.allWordpressPost.edges.map(({ node }) => (
      <div>
        <p>{node.title}</p>
        <Link to={node.slug}>
          <p>{node.title}</p>
        </Link>
        <div dangerouslySetInnerHTML={{ __html: node.excerpt }} />
      </div>
    ))}
  </Layout>
)

export default IndexPage

export const pageQuery = graphql`
  query {
    allWordpressPost(sort: { fields: [date], order: DESC }) {
      edges {
        node {
          title
          excerpt
          slug
        }
      }
    }
  }
`