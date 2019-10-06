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
  const post = data.allWordpressPost.edges[0].node;
  return (
    <Layout>
      <article id="post-1510" className="gallery post-detail blog-post hentry post-1510 post type-post status-publish format-gallery has-post-thumbnail category-abode category-career tag-career tag-home-office tag-office-spaces tag-study tag-women-who-work tag-work post_format-post-format-gallery">
        <PostHeader node={post} />
        <div className="inner">
          <div className="entry-content" dangerouslySetInnerHTML={{ __html: post.content }} />
          <PostTags tags={post.tags} />
          {/* Start: Share Buttons */}
          <div className="social social-sharing">
            <ul>
              <li className="facebook">
                <a title="Facebook Share" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/sharer.php?u=http%3A%2F%2Ftopazandsapphire.com%2Fhome-office-space-inspo%2F&t=Home%20Office%20Space%20Inspo"><i className="icon icon-social-facebook" /> Facebook</a>
              </li>
              <li className="twitter">
                <a title="Twitter Share" target="_blank" rel="noopener noreferrer" href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ftopazandsapphire.com%2Fhome-office-space-inspo%2F&shortened_url=http://topazandsapphire.com/?p=1510&text=Home%20Office%20Space%20Inspo"><i className="icon icon-social-twitter" /> Twitter</a>
              </li>
              <li className="googleplus">
                <a title="Google+ Share" target="_blank" rel="noopener noreferrer" href="https://plus.google.com/share?url=http%3A%2F%2Ftopazandsapphire.com%2Fhome-office-space-inspo%2F"><i className="icon icon-social-googleplus" /> Google+</a>
              </li>
              <li className="pinterest">
                <a title="Pinterest Share" target="_blank" rel="noopener noreferrer" href="http://pinterest.com/pin/create/button/?source_url=http%3A%2F%2Ftopazandsapphire.com%2Fhome-office-space-inspo%2F"><i className="icon icon-social-pinterest" /> Pinterest</a>
              </li>
            </ul>
          </div>
          {/* End: Share Buttons */}	</div>
      </article>
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