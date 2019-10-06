import { Link } from "gatsby"
import PropTypes from "prop-types"
import React from "react"
import PostMeta from "./post/meta"

const PostHeader = ({ node }) => (
  <article id="post-1510" className="gallery post-detail blog-post hentry post-1510 post type-post status-publish format-gallery has-post-thumbnail category-abode category-career tag-career tag-home-office tag-office-spaces tag-study tag-women-who-work tag-work post_format-post-format-gallery">
    <header className="entry-header">
      <div className="post-icon"><i className="icon icon-image"></i></div>
      <h3 className="post-title"><Link to={node.slug}>{node.title}</Link></h3>
    </header>

    <PostMeta node={node} />

    <div className="thumbnail">
      <img src={node.featured_media.source_url} className="attachment-blog-image size-blog-image wp-post-image" alt="" scale="0" height={node.featured_media.media_details.height} />
    </div>
  </article>
)

PostHeader.propTypes = {
  node: PropTypes.object,
}

PostHeader.defaultProps = {
  node: {},
}

export default PostHeader
