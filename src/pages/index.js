import React from "react"
import { Link, graphql } from "gatsby"
import Layout from "../components/layout"
import SEO from "../components/seo"
import PostMeta from "../components/post/meta"

const Post = ({ node }) => (
  <article id="post-1510" className="gallery post-detail blog-post hentry post-1510 post type-post status-publish format-gallery has-post-thumbnail category-abode category-career tag-career tag-home-office tag-office-spaces tag-study tag-women-who-work tag-work post_format-post-format-gallery">
    <header className="entry-header">
      <div className="post-icon"><i className="icon icon-image"></i></div>
      <h3 className="post-title"><Link to={node.slug}>{node.title}</Link></h3>
    </header>

    <PostMeta node={node} />

    <div className="thumbnail"><img src={node.featured_media.source_url} className="attachment-blog-image size-blog-image wp-post-image" alt="" scale="0" height={node.featured_media.media_details.height} /></div>

    <div className="inner">
      <div className="entry-content">
        <p dangerouslySetInnerHTML={{ __html: node.excerpt }} />
      </div>

      <div className="read-more"><Link to={node.slug} className="button small">Continue Reading</Link></div>
    </div>
  </article>
)

const IndexPage = ({ data }) => (
  <Layout>
    <SEO title="Home" />
    <div id="post-list">
      {data.allWordpressPost.edges.map(({ node }) => (
        <Post node={node} />
      ))}
    </div>
  </Layout>
)

export default IndexPage

export const pageQuery = graphql`
  query {
    allWordpressPost(limit: 10, sort: {fields: [date], order: DESC}) {
      edges {
        node {
          title
          excerpt
          slug
          date
          featured_media {
            link
            slug
            type
            media_details {
              file
              height
            }
            source_url
          }
          author {
            slug
            name
          }
          categories {
            name
            slug
          }
        }
      }
    }
  }
`