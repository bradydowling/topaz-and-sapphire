import React from "react"
import { Link, graphql } from "gatsby"
import Layout from "../components/layout"
import SEO from "../components/seo"

const Categories = ({ categories }) => (
  <span>{categories.map((category) => (
    <Link to={`category/${category.slug}`} rel="category tag">{category.name}</Link>
  ))}</span>
)
const Post = ({ node }) => (
  <article id="post-1510" class="gallery post-detail blog-post hentry post-1510 post type-post status-publish format-gallery has-post-thumbnail category-abode category-career tag-career tag-home-office tag-office-spaces tag-study tag-women-who-work tag-work post_format-post-format-gallery">
    <header class="entry-header">
      <div class="post-icon"><i class="icon icon-image"></i></div>
      <h3 class="post-title"><Link to={node.slug}>{node.title}</Link></h3>
    </header>

    <div class="entry-meta">
      <span>Written by <Link to={`author/${node.author.slug}/`}>{node.author.name}</Link></span>
      <span> / </span>
      <Categories categories={node.categories} />
      <span> / </span>
      <span>{node.date}</span>
    </div>

    <div class="thumbnail"><img src={node.featured_media.source_url} class="attachment-blog-image size-blog-image wp-post-image" alt="" scale="0" height={node.featured_media.media_details.height} /></div>

    <div class="inner">
      <div class="entry-content">
        <p dangerouslySetInnerHTML={{ __html: node.excerpt }} />
      </div>

      <div class="read-more"><Link to={node.slug} class="button small">Continue Reading</Link></div>
    </div>
  </article>
)

const IndexPage = ({ data }) => (
  <Layout>
    <SEO title="Home" />
    <section id="primary" class="content-area site-main" role="main">
      <div id="post-list">
        {data.allWordpressPost.edges.map(({ node }) => (
          <Post node={node} />
        ))}
      </div>
    </section>
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