import React from "react"
import Layout from "../components/layout"
import PostHeader from "../components/post-header"
import { graphql, Link } from "gatsby"

const PostTags = ({ tags }) => (
  <div className="post-tags">{tags.map((tag, i) => {
    return (
      <PostTag tag={tag} key={i} />
    )
  })}</div>
)

const PostTag = ({ tag }) => (
  // This currently throws a warning because this page isn't created yet
  <Link to={`tag/${tag.name}`}>#{tag.name}</Link>
)

export default ({ data }) => {
  // const post = data.allWordpressPost.edges[0].node;
  return (
    <Layout>
      <div id="post-list">
        <h2 className="archive-title">Abode <span>Category Archives</span></h2>
        <article id="post-1510" className="gallery post-detail blog-post hentry post-1510 post type-post status-publish format-gallery has-post-thumbnail category-abode category-career tag-career tag-home-office tag-office-spaces tag-study tag-women-who-work tag-work post_format-post-format-gallery">
          <header className="entry-header">
            <div className="post-icon"><i className="icon icon-image" /></div>
            <h3 className="post-title"><a href="http://topazandsapphire.com/home-office-space-inspo/">Home Office Space Inspo</a></h3>
          </header>
          <div className="entry-meta">
            <span>Written by <a href="http://topazandsapphire.com/author/cassie/">Cassie</a></span>
            <span> / </span>
            <span><a href="http://topazandsapphire.com/category/abode/" rel="category tag">Abode</a>, <a href="http://topazandsapphire.com/category/career/" rel="category tag">Career</a></span>
            <span> / </span>
            <span>February 06, 2019</span>
          </div>
          <div className="thumbnail">
            <img src="http://topazandsapphire.com/wp-content/uploads/2019/02/780x1350xCute-Office-Spaces-780x1350.jpg.pagespeed.ic.uPWu2B-KXQ.jpg" className="attachment-blog-image size-blog-image wp-post-image" alt="" pagespeed_url_hash={688114786} onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width={780} height={1350} />		</div>
          <div className="inner">
            <div className="entry-content">
              <p>Today we’re rounding up some of our favorite home office spaces in hopes to inspire you to spice up your at-work or at-home office space. If you work from home, it is so important that you have an area carved out that sparks creativity, productivity, and efficiency. While I love to lounge and get things done from the comfort of my couch, I can oftentimes …</p>
            </div>
            <div className="read-more"><a href="http://topazandsapphire.com/home-office-space-inspo/" className="button small">Continue Reading</a></div>	</div>
        </article>
      </div>
    </Layout >
  )
}
export const query = graphql`
  query($slug: String!) {
    allWordpressPost(filter: { slug: { eq: $slug } }) {
      edges {
        node {
          date
          title
          author {
            slug
            name
          }
          categories {
            slug
            name
          }
          featured_media {
            source_url
            media_details {
              height
            }
          }
          tags {
            name
            link
          }
          content
          slug
        }
      }
    }
  }
`